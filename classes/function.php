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

	error_reporting(0);
	date_default_timezone_set($time_zone);

	function saveFail($file, $isi){
		$input = fopen($file, "a+");
		fwrite($input, $isi." \n");
		fclose($input);
	}

	function getInput($word){
		echo "$word";
		$input = trim(fgets(STDIN));

		if ((stripos($word, 'how many') !== false && !is_numeric($input)) || (stripos($word, 'in seconds') !== false && !is_numeric($input))){
			return 0;
		}elseif(is_numeric($input)) {
			return (int)$input;
		}else{
			return $input;
		}
	}

	function postTool($token, $mode, $hide_others, $year = 0, $month = 0, $day = 0, $hour = 0, $minute = 0, $second = 0, $sleep, $failed_file){

		$failed_file = getcwd()."/$failed_file";

		echo "[I] Mode SET => $mode \n";
		echo "[I] Hide Others => ";
		switch ($hide_others) {
			case true:
				echo "Enabled \n";
				break;
			
			default:
				echo "Disabled \n";
				break;
		}

		echo "[I] Get User Info...";

		$dataUser = json_decode(file_get_contents(BASE_URL."me?fields=id,name&access_token=$token"));
		$idUser = $dataUser->id;

		echo " => ".$dataUser->name." \n";

		echo "[I] Retrieve ID POST...";

		$infoPost = json_decode(file_get_contents(BASE_URL."me/feed?fields=id,privacy,created_time,from,permalink_url&limit=500&access_token=$token"));

		echo " => Done \n";

		if ($mode === "DELETE")
			echo "[I] Start Deleting Some Post... \n";
		else
			echo "[I] Start Changing Some Post Privacy... \n";

		echo "============================== \n";

		$timeLimit = strtotime("-$year year -$month month -$day days -$hour hours -$minute minutes -$second seconds");
		repeat:
		foreach ($infoPost->data as $keyPost => $zain) {
			$zainCreated = strtotime($zain->created_time);
			echo date('[Y-m-d H:i:s] ', $zainCreated).substr($zain->id, -15)."...";
			$sleepMode = true;
			if ($zain->from->id == $idUser && $mode === "DISABLE") {
				echo " => Disable Change/Delete Post \n";
				$sleepMode = false;
			}elseif ($zainCreated <= $timeLimit && $zain->from->id == $idUser) {
				if ($mode === "DELETE") {
					$deletePost = file_get_contents(BASE_URL.$zain->id.'?method=delete&access_token='.$token);
					if (stripos($deletePost, '"success":true')) 
						echo " => Success Delete \n";
					else{
						echo " => Failed Delete \n";
						saveFail($failed_file, $zain->permalink_url);
					}
				}else{
					if ($zain->privacy->value !== $mode) {
						$editPost = file_get_contents(BASE_URL.$zain->id.'?privacy='.urlencode('{"value":"'.$mode.'"}').'&method=post&access_token='.$token);
						if (stripos($editPost, '"success":true'))
							echo " => Success Change \n";
						else{
							echo " => Failed Change \n";
							saveFail($failed_file, $zain->permalink_url);
						}
					}else{
						echo " => Already Change \n";
						$sleepMode = false;
					}
				}
			}elseif ($zainCreated <= $timeLimit && $zain->from->id !== $idUser && $hide_others == true) {
				$hidePost = file_get_contents(BASE_URL.$zain->id.'?method=post&timeline_visibility=hidden&access_token='.$token);
				if (stripos($hidePost, '"success":true'))
					echo " => Success Hidden Post \n";
				else{
					echo " => Failed Hidden Post \n";
					saveFail($failed_file, $zain->permalink_url);
				}
			}else{
				if ($zainCreated <= $timeLimit && $zain->from->id !== $idUser && $hide_others !== true)
					echo " => Not Hidden Post \n";
				elseif($mode === "DELETE")
					echo " => Not Deleted \n";
				else
					echo " => Not Changed \n";
				$sleepMode = false;
			}
			if ($sleepMode !== false && $keyPost !== count((array)$infoPost->data)-1) 
				sleep($sleep);

			$lastTime = strtotime($zain->created_time)-1;
		}
		$infoPost = json_decode(file_get_contents(BASE_URL."me/feed?fields=id,privacy,created_time,from,permalink_url&limit=500&until=$lastTime&access_token=$token"));
		if (!empty((array)$infoPost->data)) 
			goto repeat;

		echo "============================== \n";

	}

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
?>