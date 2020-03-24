<?php
require_once 'jdf.php';

function convert_date($date, $separator = '/')
{
	$date = strtotime($date);
	$timestamp = date('Y/m/d', $date);
	$arr_parts = explode('/', $timestamp);
	$gYear = $arr_parts[0];
	$gMonth = $arr_parts[1];
	$gDay = $arr_parts[2];

	return gregorian_to_jalali($gYear, $gMonth, $gDay, $separator);
}
