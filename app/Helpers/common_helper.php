<?php
  //$modelHome = new \App\Models\HomeModel;

function __construct()
{
	$this->ci =& get_instance();
  $this->ci->load->database();
	
}

if (! function_exists('setAdminLoginSessionData')) {
    function setAdminLoginSessionData($data){
		$session = session(); 
		$sessionData = $data;
		$sessionData['is_admin_logged_in'] = true;
		
		$session->set($sessionData);
	} 
}

if (! function_exists('setLoginSessionData')) {
	function setLoginSessionData($data){
	$session = session(); 
	$sessionData['user_data'] = $data;
	$sessionData['is_logged_in'] = true;
	
	$session->set($sessionData);
	} 
}

if (! function_exists('pre')) {
    function pre($data){
			echo '<pre>';
			print_r($data);
			die;
	} 
}

if (! function_exists('generate_userid')) {
    function generate_userid(){
			return mt_rand(11111111, 99999999);
	} 
}

if (! function_exists('random_strings')) {
  function random_strings($length_of_string) 
  { 
    // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result), 0, $length_of_string); 
  } 
}

if (! function_exists('student_account_number')) {
  function student_account_number($length_of_string = 12) 
  { 
    // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return strtoupper(substr(str_shuffle($str_result), 0, $length_of_string)); 
  } 
}

if (! function_exists('password_encryption')) {
    function password_encryption($password){
			if($password !='') {
				return md5(trim($password));
			}
	} 
}

if (! function_exists('get_formatted_date')) {
    function get_formatted_date($date, $is_time_show = false){
			if($date) {
				$result = date('M d, Y', strtotime($date));
				if($is_time_show) {
					$result = date('M d, Y / h:i A', strtotime($date)); 
				}
			}
		return $result;
	} 
}


if (! function_exists('get_seo_url')) {
  function get_seo_url($string, $separator = '-') 
  { 
		if($string) {
			$accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
			$special_cases = array( '&' => 'and', "'" => '');
			$string = mb_strtolower( trim( $string ), 'UTF-8' );
			$string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
			$string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
			$string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
			$string = preg_replace("/[$separator]+/u", "$separator", $string);
			return $string;
		}
  } 
}

if (! function_exists('get_shorten_text')) {
  function get_shorten_text($text, $length = 120) 
  { 
		$return = $text;
		if($text) {
			if(strlen($text) > $length) {
				$return = substr($text, 0, $length). '...';
			}
		} 
		return strip_tags($return);	
  } 
}

if (! function_exists('time_elapsed_string')) {
	function time_elapsed_string($datetime, $full = false)
	{
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
}


if (! function_exists('hoursandmins')) {
	function hoursandmins($time, $format = '%02d:%02d')
	{
			if ($time < 1) {
					return;
			}
			$hours = floor($time / 60);
			$minutes = ($time % 60);
			
			return sprintf($format, $hours, $minutes);
	}
}



