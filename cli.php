<?php
/**
 * Author  : Zainul Muhaimin
 * Name    : Facebook Post Tools
 * Version : 1.0
 * Update  : 05 May 2020
 * 
 * Copyright (C) 2020 Zainul Muhaimin
 * MIT Liencesed
 * http://opensource.org/licenses/MIT
 *
 * (C) Zainul Muhaimin https://github.com/znmn
 */

	foreach (glob(__DIR__."/classes/*.php") as $filename){
		require_once $filename;
	}

	echo "	~ Facebook Post Tools ~ \n";

	echo "============================== \n";
	echo "[I] Change Privacy/Delete Post Features \n";
	echo "[0] DISABLE : Disable This Feature \n";
	echo "[1] EVERYONE : PUBLIC \n";
	echo "[2] FRIENDS_OF_FRIENDS : Friends of Friends \n";
	echo "[3] ALL_FRIENDS : Friends \n";
	echo "[4] SELF : Only Me \n";
	echo "[5] DELETE : Delete Post \n";
	echo "============================== \n";
	do{
		$choose = getInput("[?] Choose Mode (0-5) : ");
	}while(!is_numeric($choose) || $choose < 0 || $choose > 5);
	switch ($choose) {
		case 1:
			$mode = 'EVERYONE';
			break;
		
		case 2:
			$mode = 'FRIENDS_OF_FRIENDS';
			break;
		
		case 3:
			$mode = 'ALL_FRIENDS';
			break;
		
		case 4:
			$mode = 'SELF';
			break;
		
		case 5:
			$mode = 'DELETE';
			break;
		
		default:
			$mode = 'DISABLE';
			break;
	}

	echo "============================== \n";
	echo "[I] Hide Other Post Feature \n";
	echo "[0] Disable This Feature \n";
	echo "[1] Enable This Feature \n";
	echo "============================== \n";
	do{
		$choose = getInput("[?] Choose Mode (0-1) : ");
	}while(!is_numeric($choose) || $choose < 0 || $choose > 1);

	if ($choose == 1)
		$hide_others = true;
	else
		$hide_others = false;

	$sleep = getInput("[?] Sleep (In Seconds) : "); // Sleep In Seconds, Set 0 to disable
	$year = getInput("[?] How Many Years Before : "); // How Many Years Before; Default : 0
	$month = getInput("[?] How Many Months Before : "); // How Many Months Before; Default : 0
	$day = getInput("[?] How Many Days Before : "); // How Many Days Before; Default : 0
	$hour = getInput("[?] How Many Hours Before : "); // How Many Hours Before; Default : 0
	$minute = getInput("[?] How Many Minutes Before : "); // How Many Minutes Before; Default : 0
	$second = getInput("[?] How Many Seconds Before : "); // How Many Seconds Before; Default : 0
	$token = getInput("[?] Access Token : \n~>"); // ACCESS TOKEN : EAAA...

	echo "[I] Running Program... \n";
	
	postTool($token, $mode, $hide_others, $year, $month, $day, $hour, $minute, $second, $sleep, $failed_file);
?>