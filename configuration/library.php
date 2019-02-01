<?php
  date_default_timezone_set("Asia/Jakarta");
  # date and time convertion to Indonesian
  $week = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
  $day = date("w");
  $today = $week[$day];
  $date_now = date("Ymd");
  $year_now = date("Y");
  $hour_now = date("H:i:s");
  # date format inside MySQL
  $date=date("Y-m-d");
  # function to apply local time and date
  function dateformat_ina($dateformat) {
    $date = substr($dateformat,8,2);
    $month   = pickmonth(substr($dateformat,5,2));
    $year   = substr($dateformat,0,4);
    return $date.' '.$month.' '.$year;		 
  }
  # function to apply int data type for month to string data type
  function pickmonth($month) {
    if ($month=="01") return "Januari";
    else if ($month=="02") return "Februari";
    else if ($month=="03") return "Maret";
    else if ($month=="04") return "April";
    else if ($month=="05") return "Mei";
    else if ($month=="06") return "Juni";
    else if ($month=="07") return "Juli";
    else if ($month=="08") return "Agustus";
    else if ($month=="09") return "September";
    else if ($month=="10") return "Oktober";
    else if ($month=="11") return "November";
    else if ($month=="12") return "Desember";
  }
  # function to change date format order
  function change_dateformat($date) { 
    $separate   = explode('/',$date);
    $array  = array($separate[2],$separate[1],$separate[0]);
    $unite = implode('-',$array);
    return $unite;
  }
?>