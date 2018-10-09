<?php
  	require_once("functions/sidebars.php");

	  require_once("functions/widgets.php");
  
	  require_once("functions/metaboxes.php");

	  require_once("functions/navigation.php");

	  require_once("functions/media.php");

	  require_once("functions/speakers.php");

	  require_once("functions/sponsors.php");

	global $home_id;

	


add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support('post-thumbnails', array(
'post',
'page',
'session',
'speaker',
'sponsor'
));


		/* OLD RELIABLE!
        HASN'T CHANGED IN YEARS
            RETURNS URL BY ID, AND OPTIONAL SIZE */
			
	  function get_slides( $id ) {
		return get_post_meta($id,"top_slider") ;//from functions.php,
		}

	
		function getSessions(){
			global $wpdb;
			$q = $wpdb->get_results("
			select ID, post_name, post_date, post_title, post_content
			from wp_posts
			where post_type = 'session' 
			and post_status='publish'
			
			order by menu_order
				");
			$sessions = array();
			foreach($q as $key => $value){
				extract((array) $value);
				array_push($sessions,
				array(
					"id" => $ID,
					"title" =>$post_title,
					"content" => $post_content,
					"slug" => $post_name,
					"start"=>get_post_meta($ID,"session_start",true),
					"end"=>get_post_meta($ID,"session_end",true),
					
					"sponsors" => get_post_meta($ID,"sponsors"),
					"speakers" => get_post_meta($ID,"speakers")
				));

			}
			return $sessions;
		}
		function sessionTime($start,$end){

			$start_time = date("g:i a",$start);
			if(@$end){
				$end_time = date("g:i a",strtotime(@$end));
			}
			return $start_time." - ".@$end_time;
		}
	
	
?>