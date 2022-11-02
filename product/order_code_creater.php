<?	
	function string_to_ascii($string){
		$ascii = NULL;
		$i = 0;
		for ($i; $i < strlen($string); $i++)
		{
			$ascii .= ord($string[$i]);
		}		 
		return $ascii;
    }
	
	function get_order_code($user_id){
		$length = strlen($user_id);
		$frst = substr($user_id, 0, 2);
		$scnd = substr($user_id, $length-2, $length);
		$tmp_id = $frst.$scnd;
		$ascii_code = string_to_ascii($tmp_id);
		$date = date(y.m.d.H.i.s);
		$order_code = ($ascii_code + $date);

		$time =microtime(true);
		$micro_time=sprintf("%06d",($time - floor($time)) * 1000000);
		$result = $order_code.$micro_time;
		return $result;
	}
?>