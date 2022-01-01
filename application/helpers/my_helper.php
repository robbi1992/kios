<?php

function month_list() {
    $month =  array(
        '1' => 'Jan',
        '2' => 'Feb',
        '3' => 'Mar',
        '4' => 'Apr',
        '5' => 'May',
        '6' => 'Jun',
        '7' => 'Jul',
        '8' => 'Aug',
        '9' => 'Sep',
        '10' => 'Oct',
        '11' => 'Nov',
        '12' => 'Dec'
    );

    return $month;
}

function setIDR($angka) {
    $hasil_rupiah = number_format($angka,0,'','.');
    return $hasil_rupiah;
}