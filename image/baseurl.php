<?php
    //local (just change base url, base url is edumy, you can change edumy with your base url)
    if(isset($_SERVER['HTTPS'] ) ) {  

		$file_path = 'https://'.$_SERVER['SERVER_NAME'] . '/edumanga/';
		$image_path = 'https://'.$_SERVER['SERVER_NAME'] . '/edumanga/image/user/';
		$image_author = 'https://'.$_SERVER['SERVER_NAME'] . '/edumanga/image/image_author/';
		$image_content = 'https://'.$_SERVER['SERVER_NAME'] . '/edumanga/image/image_course/';
		$image_chapter = 'https://'.$_SERVER['SERVER_NAME'] . '/edumanga/image/image_lecture/';
	}
	else
	{
		$file_path = 'http://'.$_SERVER['SERVER_NAME'] . '/edumanga/';
		$image_path = 'http://'.$_SERVER['SERVER_NAME'] . '/edumanga/image/user/';
		$image_author = 'http://'.$_SERVER['SERVER_NAME'] . '/edumanga/image/image_author/';
		$image_content = 'http://'.$_SERVER['SERVER_NAME'] . '/edumanga/image/image_course/';
		$image_chapter = 'http://'.$_SERVER['SERVER_NAME'] . '/edumanga/image/image_lecture/';
	}

	// live (dont change anything in here)
	// if(isset($_SERVER['HTTPS'] ) ) {  

	//  $file_path = 'https://'.$_SERVER['SERVER_NAME'] . '/';
	// 	$image_path = 'https://'.$_SERVER['SERVER_NAME'] . '/image/user/';
	// 	$image_author = 'https://'.$_SERVER['SERVER_NAME'] . '/image/image_author/';
	// 	$image_content = 'https://'.$_SERVER['SERVER_NAME'] . '/image/image_course/';
	//	$image_chapter = 'https://'.$_SERVER['SERVER_NAME'] . '/image/image_lecture/';
	// }
	// else
	// {
	// 	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . '/';
	// 	$image_path = 'http://'.$_SERVER['SERVER_NAME'] . '/image/user/';
	// 	$image_author = 'http://'.$_SERVER['SERVER_NAME'] . '/image/image_author/';
	// 	$image_content = 'http://'.$_SERVER['SERVER_NAME'] . '/image/image_course/';
	//	$image_chapter = 'http://'.$_SERVER['SERVER_NAME'] . '/image/image_lecture/';
	// }

?>