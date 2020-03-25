<?php
require_once(APPPATH.'utils/lib/jdf.php');

function convert_jalai_to_gregorian($date, $separator = '/'){
	$jdate = strtotime($date);
	$timestamp = date('Y/m/d', $jdate);
	$arr_parts = explode('/', $timestamp);

	$jYear = $arr_parts[0];
	$jMonth = $arr_parts[1];
	$jDay = $arr_parts[2];

	return jalali_to_gregorian($jYear, $jMonth, $jDay, '/');
}
