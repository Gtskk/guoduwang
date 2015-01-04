<?php 

/**
 * Check email real
 * 
 * @author Joe Chu <aidai524@gmail.com>
 * @version 0.1
 * @package Helper
 * @param $email
 * 
 * @return boolean
 */
function checkEmail($email) {
    if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)){
        return true;
    } else {
        return false;      
    }
}

/**
 * Get one day start time
 * 
 * @author Joe Chu <aidai524@gmail.com>
 * @version 0.1
 * @package Helper
 * @param $day
 * 
 * @return integer
 */
function _getStartTime($day)
{
    $time = date('Y-m-d',$day);
    $start = $time." 00:00:00";
    return $start;
}

/**
 * Get one day end time
 * 
 * @author Joe Chu <aidai524@gmail.com>
 * @version 0.1
 * @package Helper
 * @param $day
 * 
 * @return integer
 */
function _getEndTime($day)
{
    $time = date('Y-m-d',$day);
    $end = $time." 23:59:59";
    return $end;
}

/**
 * Returns rough (in largest single unit) time elapsed between two times.
 * @param int $iTime0  Initial time, as time_t.
 * @param int $iTime1  Final time, as time_t. 0=use current time.
 * @return string Time elapsed, like "5 minutes" or "3 days" or "1 month".
 *              You might print "ago" after this return if $iTime1 is now.
 * @author Dan Kamins - dos at axonchisel dot net
 */
function convertTimeElapsedAsText($iTime0, $iTime1 = 0)
{
    if ($iTime1 == 0) { $iTime1 = time(); }
    $iTimeElapsed = $iTime1 - $iTime0;

    if ($iTimeElapsed < (60)) {
        $iNum = intval($iTimeElapsed); $sUnit = "second";
    } else if ($iTimeElapsed < (60*60)) {
        $iNum = intval($iTimeElapsed / 60); $sUnit = "minute";
    } else if ($iTimeElapsed < (24*60*60)) {
        $iNum = intval($iTimeElapsed / (60*60)); $sUnit = "hour";
    } else if ($iTimeElapsed < (30*24*60*60)) {
        $iNum = intval($iTimeElapsed / (24*60*60)); $sUnit = "day";
    } else if ($iTimeElapsed < (365*24*60*60)) {
        $iNum = intval($iTimeElapsed / (30*24*60*60)); $sUnit = "month";
    } else {
        $iNum = intval($iTimeElapsed / (365*24*60*60)); $sUnit = "year";
    }

    return $iNum . " " . $sUnit . (($iNum != 1) ? "s" : "");
}

function cutStr($string,$start,$length,$encoding='utf-8') {
    $str_length = mb_strlen($string,$encoding);
    if ($str_length<=$length) {
        return $string;
    } else {
        return mb_substr($string,$start,$length,$encoding).'...';    
    }
}


function get_css_js_file($part)
{
    $filename = "../asset_manifest.json";
    $json_string = file_get_contents($filename);
    $obj=json_decode($json_string,true);

    if (!is_array($obj))
    {
        die('解析json文件错误');
    }

    return isset($obj[$part]) ? $obj[$part][0] : null;
}