<?php

require_once(APPPATH.'utils/lib/jdf.php');

function convert_gregorian_to_jalali($date, $separator = '/')
{
	$gdate = strtotime($date);
	$timestamp = date('Y/m/d', $gdate);
	$arr_parts = explode('/', $timestamp);

	$gYear = $arr_parts[0];
	$gMonth = $arr_parts[1];
	$gDay = $arr_parts[2];

	return gregorian_to_jalali($gYear, $gMonth, $gDay, $separator);
}
