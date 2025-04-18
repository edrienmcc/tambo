<?php
	include 'include/connection.php';
	include 'image/baseurl.php';
	include 'action/time.php';
	define('img_content', $image_content);
	define('img_chapter', $image_chapter);
	define('img_author', $image_author);
 
	function responseApi($course, $queLec, $type = '', $collectionData = '', $favorite = ''){

		$lecture = [];

		foreach ($queLec as $key => $value) {

			$lecture[$key]['lec_id'] = $value['lec_id'];
			$lecture[$key]['cl_id'] = $value['cl_id'];
			$lecture[$key]['title_chapter'] = $value['title_chapter'];
			$lecture[$key]['file_chapter'] = img_chapter.$value['cl_id'].'/'.$value['file_chapter'];
			$lecture[$key]['image_chapter'] = img_chapter.$value['cl_id'].'/'.$value['image_chapter'];
		}

		$courses['id_course'] = $course['id_packs'];
		$courses['name'] = $course['name'];
		$courses['author'] = $course['name_author'];
		$courses['status'] = $course['status'];
		$courses['image_author'] = img_author.$course['image_author'];
		$courses['short_desc_author'] = $course['short_desc_author'];
		$courses['desc_author'] = $course['desc_author'];
		$courses['photo_manga'] = img_content.$course['photo_course'];
		if($type == 'detail') $courses['shortdes'] = $course['shortdes'];
		if($type == 'detail') $courses['description'] = $course['description'];
		if($type == 'detail') $courses['lecture'] = $lecture;
		if($type == 'detail') {
			$courses['collection'] = $collectionData['created_date'] != '' ? $collectionData : null;
			$courses['favorite'] = $favorite['id_favorite'] != '' ? $favorite : null;
		}

		return $courses;

	}
 
	if (isset($_GET['popular'])) {
		require 'api/popular.php';
	}else if (isset($_GET['all_popular'])) {
		require 'api/api_popular_all.php';
	}else if (isset($_GET['ebook_by_cat'])) {
		require 'api/ebook_by_cat.php';
	}else if (isset($_GET['coming'])) {
		require 'api/coming.php';
	}else if (isset($_GET['latest'])) {
		require 'api/latest.php';
	}else if (isset($_GET['all_latest'])){
		require 'api/latest_all.php';
	}else if (isset($_GET['category'])) {
		require 'api/category.php';
	}else if (isset($_GET['detail'])) {
		require 'api/detail.php';	
	}else if (isset($_GET['favorite'])) {
		require 'api/favorite.php';
	}else if (isset($_GET['slider'])) {
		require 'api/slider.php';
	}else if (isset($_GET['search'])) {
		require 'api/search.php';
	}else if (isset($_GET['setting'])) {
		require 'api/setting.php';
	}else if (isset($_GET['display_comment'])){
		require 'api/display_comment.php';
	}else if (isset($_GET['announcement'])){
		require 'api/announcement.php';
	}else if (isset($_GET['detail_announcement']) && isset($_GET['id_user'])){
		require 'api/announcement_detail.php';
	}else if (isset($_GET['get_collection_title'])){
		require 'api/get_collection_title.php';
	}else if (isset($_GET['get_collection_all'])) {
		require 'api/get_collection_all.php';
	}else if(isset($_GET['home'])){
		require 'api/home.php';
	}
?>