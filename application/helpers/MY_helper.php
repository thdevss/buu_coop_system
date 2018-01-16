<?php
function strToLevel($str)
{
    if($str == 'student')
        return 'นิสิต';
    if($str == 'coop_student')
        return 'นิสิตสหกิจ';
    if($str == 'teacher')
        return 'อาจารย์';
    if($str == 'officer')
        return 'เจ้าหน้าที่';  
    if($str == 'company')
        return 'สถานประกอบการ';                      
}