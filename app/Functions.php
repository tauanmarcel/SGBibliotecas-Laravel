<?php

namespace App;

class Functions{

	static function getAge($date, $pattern = 102){

		date_default_timezone_set ('America/Bahia');

		switch($pattern){
			case '102': {
				$delimiter = '-';
				$decompose = explode(' ', $date);
				$decompose = explode($delimiter, $decompose[0]);
				$year      = $decompose[0];
				$month     = $decompose[1];
				$day       = $decompose[2];
				break;
			}
			case '103': {
				$delimiter = '/';
				$decompose = explode(' ', $date);
				$decompose = explode($delimiter, $decompose[0]);
				$day       = $decompose[0];
				$month     = $decompose[1];
				$year      = $decompose[2];
				break;
			}
		};

		$age = date('Y') - $year;

		if(date('m') < $month){
			$age -= 1;
		}elseif(date('m') == $month && date('d') < $day){
			$age -= 1;
		}

		return $age;
	}

	static function formateDate($date){
		$date = explode('/', $date);
		$date = $date[2] . '-' . $date[1] . '-' . $date[0];
		return date($date);
	}
}
