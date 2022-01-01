<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Passenger_model extends CI_Model {

    public function get_questions($en = false) {
        $prefix = 'in_';
        if ($en) $prefix = 'en_';
        $column = $prefix . 'content';

        $this->db->select('id, ' . $column . ' AS content');
        return $this->db->get('ecd_goods_declare')->result_array();
    }

    public function save_data($data) {
        // 'IS_' . time() . '_' . rand(1, 1000) . '.jpg';
        $return_status = NULL;
        $this->db->trans_start();

        // insert header first
        $value = $data['personal'];
        // set unique qr_code
        $qr_code = 'BCQR' . time() . '-' . rand(100, 999);
        $this->db->set('full_name', $value['name']);
        $this->db->set('date_of_birth', $value['birth']);
        $this->db->set('occupation', $value['occupation']);
        $this->db->set('nationality', $value['nationality']);
        $this->db->set('passport_number', $value['passport']);
        $this->db->set('address_in_indo', $value['address']);
        $this->db->set('flight_number', $value['flight']);
        $this->db->set('arrival_date', $value['arrival']);
        $this->db->set('baggage_in', $value['baggageIn']);
        $this->db->set('baggage_ex', $value['baggageEx']);
        $this->db->set('qr_code', $qr_code);
        // zone automaticly red if any goods  yes
        $zone = '0';
        if (count($data['answer']) > 0) {
            $zone = '1';
        }
        $this->db->set('zone', $zone);
        $this->db->insert('ecd_personal');
        $header_id = $this->db->insert_id();

        // insert family info if any
        $family = $data['family'];
        if (count($family) > 0) {
            $data_family = array();
            foreach($family as $val) {
                $data_family[] = array(
                    'personal_id' => $header_id,
                    'full_name' => $val['name'],
                    'passport_number' => $val['passport'],
                    'date_of_birth' => $val['birth']
                );
            }
            $this->db->insert_batch('ecd_personal_family', $data_family);
        }
        
        // risk engine
        if (count($data['answer']) === 0) {
            $this->risk_engine($header_id);
        }
        
        // set rate
        $rate = $data['rating'];
        $rateText = $data['ratingText'];
        $this->db->set('personal_id', $header_id);
        $this->db->set('rate', $rate);
        $this->db->set('rate_text', $rateText);
        $this->db->insert('ecd_rates');

        // set declare answer insert batch
        $answer = $data['answer'];
        if (count($answer) > 0) {
            $data_answer = array();
            // value is enum 1 
            // set string '1' cus always be 1
            foreach($answer as $val) {
                $data_answer[] = array(
                    'personal_id' => $header_id,
                    'goods_declare_id' => $val['id'],
                    'answer' => '1'
                );
            }
            $this->db->insert_batch('ecd_declare_answer', $data_answer);
        }

        // set declare answer insert batch
        $goods = $data['goodsDetail'];
        if (count($goods) > 0) {
            $data_goods = array();
            foreach($goods as $val) {
                $data_goods[] = array(
                    'personal_id' => $header_id,
                    'description' => $val['desc'],
                    'quantity' => $val['amount'],
                    'value' => $val['value'],
                    'currency' => $val['currency']
                );
            }
            $this->db->insert_batch('ecd_goods', $data_goods);
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
		{
			$return_status = FALSE;
		} else {
            $return_status = $qr_code;   
        }

        return $return_status;
    }
    
    private function get_reff_data($date, $passport) {
        $this->db->select('id, nama as full_name, no_paspor as passport_number, tgl_lahir as date_of_birth');
        $this->db->from('reff_atensi_merah_header'); 
        $this->db->group_start()
            ->where('tgl_lahir', $date)
            ->or_where('no_paspor', $passport)
        ->group_end();   
        // $this->db->where('tgl_lahir', $date);
        $reff_data = $this->db->get()->result_array();
        // print_r($reff_data); exit();
        return $reff_data;
    }
    private function risk_engine_process($reff_data, $name, $birth, $passport) {
        // list names as master data (set as lower case)
        // $result = array();
        $names = array();
        foreach ($reff_data as $val) {
            $names[] = strtolower($val['full_name']);
        }

        // load library then compare exact or closest name
        $this->load->library('search');
        $closest_name = $this->search->compare($name, $names);
        // var_dump($closest_name); exit();
        // rule set
        // zone 0 green 1 red
        $zone = '0';
        $reff_id = array();
        foreach ($reff_data as $val) {
            $lower_name = strtolower($val['full_name']);
            if ($closest_name == $lower_name &&  $birth == $val['date_of_birth'] && $passport == $val['passport_number']) {
                $zone = '1';
                $reff_id[] =  $val['id'];
            } elseif ($closest_name == $lower_name &&  $birth == $val['date_of_birth']) {
                $zone = '1';
                $reff_id[] =  $val['id'];
            } elseif ($closest_name == $lower_name &&  $passport == $val['passport_number']) {
                $zone = '1';
                $reff_id[] =  $val['id'];
            } elseif ($birth == $val['date_of_birth'] &&  $passport == $val['passport_number']) {
                $zone = '1';
                $reff_id[] =  $val['id'];
            }
        }
        $result = array(
            'zone' => $zone, 'reff' => $reff_id
        );
        return $result;
    }

    public function risk_engine($header_id) {
        $result = array();
        // get data completed
        $this->db->select('full_name, date_of_birth, passport_number');
        $this->db->from('ecd_personal');
        $this->db->where('id', $header_id);
        $ecd = $this->db->get()->row_array();
        $name = strtolower($ecd['full_name']);
        $birth = $ecd['date_of_birth'];
        $passport = $ecd['passport_number'];

        // get data from table reff heaer with birth & passport params
        $reff_data = $this->get_reff_data($birth, $passport); 
        // var_dump($reff_data); exit();
        // if no blacklist go to family data
        // $reff_data = array();
        if (count($reff_data) > 0 && $reff_data !== NULL) { 
            // echo 'HERE'; exit();
            $result = $this->risk_engine_process($reff_data, $name, $birth, $passport);
        } else {
            // echo 'OK'; exit();
            $this->db->select('full_name, date_of_birth, passport_number');
            $this->db->from('ecd_personal_family');
            $this->db->where('personal_id', $header_id);
            $ecd = $this->db->get()->result_array();
            // print_r($ecd); exit();
            if (count($ecd) > 0) {
                foreach ($ecd as $val) {
                    $name = strtolower($val['full_name']);
                    $birth = $val['date_of_birth'];
                    $passport = $val['passport_number'];

                    $reff_data = $this->get_reff_data($birth, $passport);   
                    if ($reff_data !== NULL) { 
                        $result = $this->risk_engine_process($reff_data, $name, $birth, $passport);
                    }                  
                }
            }      
        }
        // print_r($result); exit();
        // update data if any match found
        if (count($result) > 0) {
            if ($result['zone'] == '1') {
                // update personal
                $this->db->set('zone', '1');
                $this->db->set('zone_by', 'Risk Engine');
                $this->db->where('id', $header_id);
                $this->db->update('ecd_personal');

                // update relation history
                if (count($result['reff']) > 0) {
                    $data_reff = array();
                    foreach ($result['reff'] as $val) {
                        $data_reff[] = array(
                            'personal_id' => $header_id, 
                            'header_reff_id' => $val
                        );
                    }
                    $this->db->insert_batch('ecd_reff_personal', $data_reff);
                }                
            }
        }                
    }

    private function get_declare($id) {
        $this->db->select('B.en_content AS declare');
        $this->db->from('ecd_declare_answer A');
        $this->db->join('ecd_goods_declare B', 'A.goods_declare_id = B.id');
        $this->db->where('A.personal_id', $id);
        $this->db->where('A.answer', '1');
        $goods = $this->db->get()->result_array();

        $return = array();
        foreach($goods as $val) {
            $return[] = array(
                'content' => $val['declare']
            );
        }

        return $return;
    }

    private function get_goods($id) {
        $this->db->where('personal_id', $id);
        $goods = $this->db->get('ecd_goods')->result_array();

        $return = array();
        foreach($goods as $val) {
            $return[] = array(
                'id' => $val['id'],
                'description' => $val['description'],
                'quantity' => $val['quantity'],
                'value' => setIDR($val['value']),
                'currency' => $val['currency']
            );
        }

        return $return;
    }

    public function get_detail($qrcode) {
        $data = array();
        $personal = array();
        $family = array();

        $this->db->select('A.*, B.name AS nationality');
        $this->db->from('ecd_personal A');
        $this->db->join('en_countries B', 'B.id = A.nationality');
        $this->db->where('A.qr_code', $qrcode);
        $personal = $this->db->get()->row_array();

        if (count($personal) > 0) {
            $header =  $personal['id'];
            // get family 
            $this->db->select('id');
            $this->db->where('personal_id', $header);
            $family = $this->db->get('ecd_personal_family')->result_array();
            // $this->db->select('id');
        }
        
        $data['personal'] =  $personal;
        $data['family'] = $family;
        $data['declare'] = $this->get_declare($header);
        $data['goods'] = $this->get_goods($header);

        return $data;
    }
}