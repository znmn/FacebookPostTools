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
	
	postTool($token, $mode, $hide_others, $year, $month, $day, $hour, $minute, $second, $sleep, $failed_file);
?>