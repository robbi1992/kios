<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'phpqrcode/qrlib.php';

class Generate_code {

    public function generate($id) {
        $tempdir = "./temp/";
        /*
        if (!file_exists($tempdir)) {
            mkdir($tempdir);
        } */
        // save qr code on folder temp
        $fileName = $id . '.png';
        $path = $tempdir . $fileName;
        $save = QRcode::png($id, $path, "H", 6, 4, 0); 

        return $fileName;   
    }
}