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

	$mode = 'SELF'; // PRIVACY : EVERYONE, FRIENDS_OF_FRIENDS, ALL_FRIENDS, or SELF // DELETE : Delete Post // DISABLE : Disable This Feature
	/**
		EVERYONE : PUBLIC
		FRIENDS_OF_FRIENDS : Friends of Friends
		ALL_FRIENDS : Friends
		SELF : Only Me
		DELETE : Delete Post
		DISABLE : Disable This Feature

	**/
	$year = 0; // How Many Years Before; Default : 0
	$month = 0; // How Many Months Before; Default : 0
	$day = 0; // How Many Days Before; Default : 0
	$hour = 0; // How Many Hours Before; Default : 0
	$minute = 0; // How Many Minutes Before; Default : 0
	$second = 0; // How Many Seconds Before; Default : 0
	$sleep = 0; // Sleep In Seconds, Set 0 to disable
	$hide_others = false; // Hide All Posts That Are Not from You; Example : Tagged POST, Other People's Posts on Your Wall, etc // Set true to Enable, false to disable
	$time_zone = 'Asia/Jakarta'; // Reference : https://www.php.net/manual/en/timezones.php
	$base_url = 'https://graph.facebook.com/v6.0/'; // Facebook Graph API URL
	$failed_file = 'failed.txt'; // Text File to Store All Post Links That Failed to Execute

	$token = 'Your FACEBOOK ACCESS TOKEN'; // ACCESS TOKEN : EAAA...

	define('BASE_URL', $base_url);


/**
 * Author  : Zainul Muhaimin
 * Name    : Facebook Post Tools
 * Version : 1.0
 * Update  : 05 May 2020
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */
?>