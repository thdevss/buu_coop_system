<?php
function strToLevel($str)
{
    if($str == 'student')
        return 'นิสิต';
    if($str == 'coop_student')
        return 'นิสิตสหกิจ';
    if($str == 'adviser')
        return 'อาจารย์';
    if($str == 'officer')
        return 'เจ้าหน้าที่';  
    if($str == 'company')
        return 'สถานประกอบการ';         
        
        
    return 'Unknown';
}

function thaiDate($strDate = '2018-01-01 00:00:00')
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ษ.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strHour:$strMinute";

}