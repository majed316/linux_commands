<?php
function _limit($str, $length, $suffix=''){
    mb_internal_encoding('UTF-8');
    if (mb_strlen($str) < $length){
        return $str;
    }
    if (mb_substr($str, $length, 1) != ' ') {
        while (mb_substr($str, $length, 1) != ' ') {
            $length = $length - 1;
            if($length < 1)
                break;
        }
        return mb_substr($str, 0, $length) . $suffix;
    } else {
        return mb_substr($str, 0, $length) . $suffix;
    }
}
?>