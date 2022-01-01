<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passengers extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('global_model');
        $this->load->model('passenger_model');
	}

    private function get_language($en = false) {
        $data = array (
            'text1' => 'Terima kasih atas kerjasama Anda dalam pemeriksaan pabean untuk mengidentifikasi adanya narkotika, obat-obatan terlarang, barang terkait terorisme, uang dan/atau instrument pembayaran lainnya yang terkait dengan pencucian uang, dan/atau penyelundupan barang yang melanggar peraturan perundang-undangan Negara Indonesia',
            'text2' => 'Membawa barang-barang tersebut yang tidak sesuai dengan ketentuan dan/ atau melakukan penyelundupan, merupakan pelanggaran dan dikenakan sanksi.',
            'button' => 'Selanjutnya',
            'passenger' => array(
                'header' => 'Data Penumpang'
            ),
            'goods' => array(
                't&m' => '<p>Barang pribadi Penumpang, per orang per kedatangan, mendapatkan pembebasan bea masuk, cukai, dan pajak paling banyak senilai USD 500.00 dari nilai pabean barang yang dibeli/diperoleh di luar negeri dan tidak dibawa kembali keluar negeri.</p>
                <p>Barang pribadi Awak Sarana Pengangkut, per orang per kedatangan, mendapatkan pembebasan bea masuk, cukai, dan pajak paling banyak senilai USD 50.00 dari nilai pabean barang yang dibeli/ diperoleh di luar negeri dan tidak dibawa kembali keluar negeri.</p>
                <p>Bagi Anda yang membawa barang impor yang akan digunakan untuk tujuan selain keperluan pribadi (jumlah tidak wajar untuk dipakai/konsumsi sendiri atau untuk keperluan perusahaan/ toko/ institusi/ industri), dipungut bea masuk dan pajak.</p>',
                't&m2' => 'Barang Kena Cukai untuk keperluan pribadi yang dibeli/ diperoleh di luar negeri dan tidak ditujukan untuk dibawa kembali keluar negeri, diberikan pembebasan bea masuk, cukai dan pajak per orang dewasa untuk setiap kedatangan sebanyak :
                    <table class="table">
                    <tr>
                        <td>1.</td><td colspan="2">Penumpang</td></tr>
                    <tr>
                        <td>&nbsp;</td><td style="vertical-align: top;">a.</td><td>Usia 18 tahun keatas : 200 batang sigaret, 25 batang cerutu, atau 100 gram tembakau iris/produk hasil tembakau dan/atau</td></tr>
                        <tr>
                    <tr>    
                        <td>&nbsp;</td><td style="vertical-align: top;">b.</td><td>Usia 21 tahun keatas : 1 liter minuman mengandung etil alkohol, atau</td></tr>
                    <tr>
                        <td>2.</td><td colspan="2">Awak Sarana Pengangkut</td></tr>
                    <tr>
                        <td>&nbsp;</td><td colspan="2">40 batang sigaret, 10 batang cerutu, 40 gram tembakau iris/hasil tembakau lainnya, dan atau 350 mililiter minuman mengandung etil alkohol</td></tr>
                    </table>
                    <p>Barang kena cukai yang melebihi jumlah tersebut, atas kelebihannya langsung dimusnahkan oleh Pejabat Bea dan Cukai</p>',
                't&m3' => 'Anda wajib memberitahukan kepada Petugas Bea dan Cukai jika membawa :
                    <table class="table">
                    <tr>
                        <td style="vertical-align: top;">1.</td><td>Uang dan/atau instrumen pembayaran lainnya dalam bentuk cek, cek perjalanan, surat sanggup bayar, atau bilyet giro, dalam rupiah atau dalam mata uang asing senilai Rp100.000.000,00 (seratus juta rupiah) atau lebih, atau</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">2.</td><td>Uang kertas asing paling sedikit setara dengan Rp1.000.000.000,00 (satu milyar rupiah).</td>
                    </tr>
                    </table>'
            )
        );

        if ($en) {
            $data = array (
                'text1' => 'Directorate General of Customs and Excise would like to thank you for your kind cooperation during the inspection to identify narcotics, illegal drugs, any articles which are related to terrorism activities, currency, and/or bearer negotiable instruments which are related to money laundering, and/or smuggling activities, that violate state laws and regulation of Indonesia.',
                'text2' => 'Illicitly bringing those goods into Indonesia and doing smuggling activities, are considered violations and will lead to legal action.',
                'button' => 'Next',
                'passenger' => array(
                    'header' => 'Passenger Information'
                ),
                'goods' => array(
                    't&m' => '<p>Every personal goods, per person on every arrival, is granted import duties, excise, and taxes exemption of USD 500.00 on his/her personal goods (personal effect) that were purchased or obtained abroad and will remain in Indonesia.</p>
                    <p>Every personal crew goods, per person on every arrival, is granted import duties, excise, and taxes exemption of USD 50.00 on his/her personal goods (personal effect) that were purchased or obtained abroad and will remain in Indonesia.</p>
                    <p>For those who import goods for other purposes than personal use (e.g. the total amount of the goods are unusual for personal use or the goods are used for commercial purposes such as companies/store/institution/industry), are subject to import duties, excise, and taxes.</p>',
                    't&m2' => 'The following amount of excisable goods for personal use that were purchased or obtained abroad and will remain in Indonesia are exempted from Import duties, excise, and taxes for every arrival:
                    <table class="table">
                    <tr>
                        <td>1.</td><td colspan="2">Passenger</td></tr>
                    <tr>
                        <td>&nbsp;</td><td style="vertical-align: top;">a.</td><td>18 years old or above: 200 cigarettes, 25 cigars, or 100 grams of sliced tobacco or other tobacco products, and/ or</td></tr>
                        <tr>
                    <tr>    
                        <td>&nbsp;</td><td style="vertical-align: top;">b.</td><td>21 years old or above:  1 liter of alcoholic beverages, or                        </td></tr>
                    <tr>
                        <td>2.</td><td colspan="2">Crew</td></tr>
                    <tr>
                        <td>&nbsp;</td><td colspan="2">40 cigarettes, 10 cigars, or 40 grams of sliced tobacco or other tobacco products, and/or 350 milliliter of alcoholic beverages</td></tr>
                    </table>
                    Upon the excess of the excisable goods will be destroyed',
                    't&m3' => 'You are required to notify the Customs Officer if you are bringing :
                    <table class="table">
                    <tr>
                        <td style="vertical-align: top;">1.</td><td>Currency and/or bearer negotiable instrument (cheque, traveller cheque, promissory notes, or bilyet giro) in Rupiah or other currencies which equal to the amount 100 million Rupiah or more, or</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">2.</td><td>Foreign banknotes which equal to the amount of 1 billion Rupiah or more.</td>
                    </tr>
                    </table>'
                )
            );
        }
        return $data;
    }

    public function index()
	{   
        $data = array();
        $en = false;
        if (isset($_GET['lang']))  $en = true;
        $data['desc'] = $this->get_language($en);
        $data['country'] = $this->global_model->get_countries($en);
        // print_r($data['country']); exit();
        $data['questions'] = $this->passenger_model->get_questions($en);
        $data['en'] = $en;
        $this->load->helper('my_helper');
        $data['months'] = month_list();
		$this->load->view('passengers', $data);
	}

    public function save_data() {
        $params = json_decode($this->input->raw_input_stream, TRUE);

        $save_data =  $this->passenger_model->save_data($params);

        $this->output
			->set_content_type('application/json')
			->set_output(json_encode($save_data));
    }

    public function generate_code() {
        $this->load->library('generate_code');
        $params = json_decode($this->input->raw_input_stream, TRUE);
        $code = $params['code'];
        $return['name'] = $this->generate_code->generate($code);

        $this->output
			->set_content_type('application/json')
			->set_output(json_encode($return));
    }
    
    public function risk_engine() {
        $save_data =  $this->passenger_model->risk_engine(25);
    }

    public function generate_pdf($params) {
        $this->load->helper('my_helper');
        $new =  explode('.', $params);
        $qr_code = $new[0];
        // echo $qr_code; exit();
        $data = $this->passenger_model->get_detail($qr_code);
        // print_r($data); exit();
        $this->load->view('passengers_pdf', $data);
    }

    public function print_qr($params) {
        $data['img'] =  $params;
        $new =  explode('.', $params);
        $qr_code = $new[0];
        $data['code'] =  $qr_code;
        $this->load->view('print_qr', $data);
    }
}