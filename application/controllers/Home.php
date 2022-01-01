<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    private function get_language($en = false) {
        $data = array (
            'text' => '<p>Penumpang/Awak Sarana Pengangkut wajib menyerahkan Customs Declaration pada saat setiap kedatangan (satu keluarga dapat mengajukan satu Customs Declaration)</p>',
            'button' => 'Mulai',
            'header' => 'Selamat Datang',
            'active' => 0
        );

        if ($en) {
            $data = array (
                'text' => '<p>Each arriving Passenger/Crew must submit Customs Declaration (one customs declaration can be used for one family)</p>',
                'button' => 'Start',
                'header' => 'Welcome',
                'active' => 1
            );
        }
        return $data;
    }
	public function index()
	{   
        $en = false;
        if (isset($_GET['lang']))  $en = true;
        $data['home'] = $this->get_language($en);
        
		$this->load->view('home', $data);
	}
}
