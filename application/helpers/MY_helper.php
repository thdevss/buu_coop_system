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

function thaiDate($strDate = '2018-01-01 00:00:00', $full_date = false)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));

    if(!$full_date) {
        
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ษ.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear $strHour:$strMinute น.";
    } else {
        $strDayCut['Sun'] = 'อาทิตย์';
        $strDayCut['Mon'] = 'จันทร์';
        $strDayCut['Tue'] = 'อังคาร';
        $strDayCut['Wed'] = 'พุธ';
        $strDayCut['Thu'] = 'พฤหัส';
        $strDayCut['Fri'] = 'ศุกร์';
        $strDayCut['Sat'] = 'เสาร์';

        $strMonthCut = array('', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤษจิกายน', 'ธันวาคม');
    
        $strMonthThai=$strMonthCut[$strMonth];
        $strDayThai=$strDayCut[date("D",strtotime($strDate))];
        return "วัน $strDayThai ที่ $strDay $strMonthThai พ.ศ. $strYear เวลา $strHour:$strMinute น.";
        
    }
}




function generateStrongPassword($length = 15, $add_dashes = false, $available_sets = 'luds')
{
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '23456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '!@#$%&*?';
	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[tweak_array_rand(str_split($set))];
		$all .= $set;
	}
	$all = str_split($all);
	for($i = 0; $i < $length - count($sets); $i++)
		$password .= $all[tweak_array_rand($all)];
	$password = str_shuffle($password);
	if(!$add_dashes)
		return $password;
	$dash_len = floor(sqrt($length));
	$dash_str = '';
	while(strlen($password) > $dash_len)
	{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}
	$dash_str .= $password;
	return $dash_str;
}

function tweak_array_rand($array){
	if (function_exists('random_int')) {
		return random_int(0, count($array) - 1);
	} elseif(function_exists('mt_rand')) {
		return mt_rand(0, count($array) - 1);
	} else {
		return array_rand($array);
	}
}