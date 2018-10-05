<?php
    
	global $home_id;

	function get_home_children(){
		$home_id = get_option( 'page_on_front' );
		$children = get_children( array("post_parent"=>$home_id,'orderby' => 'menu_order ASC','order' => 'ASC') );
		$child_list = array();
		foreach ($children as $key => $value) {
			
			array_push($child_list,
				array(
					"ID"=>$value->ID,
					"slug"=>$value->post_name,
					"title"=>$value->post_title,
					"content"=>$value->post_content
					)
				);
		}
		return $child_list;
	}

	function home_children_menu(){
		$home_id = get_option( 'page_on_front' );
		$children = get_children( array("post_parent"=>$home_id,'orderby' => 'menu_order ASC','order' => 'ASC') );
		$child_list = array();
		foreach ($children as $key => $value) {
		
			if(get_post_meta($value->ID,"redirect",true)){
				$href=get_post_meta($value->ID,"redirect",true);
				$target=' target="_blank"';
			} else {
				$href = "#".$value->post_name;
				$target="";
			}


			print '<li><a class="section-scroll" href="'.$href.'"'.$target.'>'.$value->post_title.'</a>';// if printed, shows this.
			
		}
	}


add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support('post-thumbnails', array(
'post',
'page',
'session',
'speaker',
'sponsor'
));
	require_once("functions/sidebars.php");

	require_once("functions/widgets.php");

	require_once("functions/metaboxes.php");

		/* OLD RELIABLE!
        HASN'T CHANGED IN YEARS
            RETURNS URL BY ID, AND OPTIONAL SIZE */
		function getThumbnail($id,$use="full"){
			global $post;
			
			
			$img = wp_get_attachment_image_src(  $id, $use);
			if($img[0] !=""){
			} 
			return $img[0];
			
		}
	
	
		
	
	
		/* 	PASS ID AND IT RETURNS OBJECT OF SIZES BY URL */
		function getThumbnailVersions($id){
				global $post;
				$thumbnail_versions = array(); //creates the array of size by url
				foreach(get_intermediate_image_sizes() as $key => $size){//loop through sizes
					$img = wp_get_attachment_image_src($id,$size);//get the url 
					
					if($img[0] !=""){
						$thumbnail_versions[$size]=$img[0];//sets size by url
					} 
				}
				return $thumbnail_versions;
			
		}
	
	
	
	
		//Embed Video  Shortcode
	
		function video_shortcode( $atts, $content = null ) {
			//set default attributes and values
			$values = shortcode_atts( array(
				'url'   	=> '#',
				'className'	=> 'video-embed',
				'aspect' => '56.25%'
			), $atts );
			
			ob_start();
			?>
			<div class="video-wrapper">
				<iframe src="<?=$values['url']?>" class="<?=$values['className']?>"></iframe>
			</div> 
			<?php
			return ob_get_clean();
			//return '<a href="'. esc_attr($values['url']) .'"  target="'. esc_attr($values['target']) .'" class="btn btn-green">'. $content .'</a>';
		
		}
		add_shortcode( 'embed_video', 'video_shortcode' );

		function add_category_to_page() {  
			// Add tag metabox to page
			register_taxonomy_for_object_type('post_tag', 'page'); 
			// Add category metabox to page
			register_taxonomy_for_object_type('category', 'page');  
		}
		 // Add to the admin_init hook of your theme functions.php file 
		add_action( 'init', 'add_category_to_page' );


    function linkThis($url,$label,$blank_target=true){
        $target = '';  
        if($blank_target == true){
          $target = 'target="_blank"';
        }
        if($url != ''){
          return '<a href="'.$url.'" '.$target.'>'.$label.'</a>';
        }
	  }
	  function isSelected($id,$match){
		$selected = '';
		if($id == $match){
			$selected = ' selected';
		}
		return $selected;
	  }
	  function get_slides( $id ) {
		return get_post_meta($id,"top_slider") ;//from functions.php,
		}

		function get_media_data( $id ) { //this function builds the data for a lean json packet of media
			$data = array();   
			$url = wp_upload_dir();
			$upload_path = $url['baseurl']."/";
			$file_path = str_replace($upload_path,'',wp_get_attachment_url($id));
			$file = basename($file_path);
			$path = str_replace($file,"",$file_path);
			$mime = get_post_mime_type( $id );
			$meta  = (array) wp_get_attachment_metadata( $id,true);
			$meta_data = array();
			/*
			
				The meta data properties are only accessible inside a loop for some dumb reason.
			*/
			if(strpos($mime,'mage/') && !strpos($mime,'svg')){ // the i is left of so the strpos returns a postive value
				$meta_data = array();
				foreach($meta as $key => $value){
					if($key == 'width'){
						$meta_data['w'] = $value;
					} else if($key == 'height'){
						$meta_data['h'] = $value;
					} else if($key == 'sizes'){
						$meta_data['sizes'] = array();
						foreach($meta[$key] as $size_name => $props){
							$meta_data['sizes'][$size_name] = $meta[$key][$size_name]['file'];
						}
					}
					//
				}
			} else {
				//let non image mimetypes pass their full metadata
				$meta_data = $meta;
			}
			$data = array(
			
				'alt' => get_post_meta($id,"_wp_attachment_image_alt",true),
				'caption' => wp_get_attachment_caption($id),
				'title'=> get_the_title($id),
				'desc' => wpautop(get_the_content($id)),
				'path'=> $path,
				'file' => $file,
				'mime' => $mime,
				'meta' => $meta_data
				
			);
		return $data;//from functions.php,
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
		function getSpeaker($speaker_id){
			global $wpdb;
			$q = $wpdb->get_results("
			select ID, post_name, post_date, post_excerpt, post_title, post_content
			from wp_posts
			where ID= $speaker_id
			
			order by menu_order
				");
			$speaker = array();
			foreach($q as $key => $value){
				extract((array) $value);
				array_push($speaker,
				array(
					"id" => $speaker_id,
					"speaker_name" =>$post_title,
					"content" => $post_content,
					"excerpt" => $post_excerpt,
					
					"slug" => $post_name,
					"speaker_title" => get_post_meta($speaker_id,"speaker_title",true),
					"speaker_company" => get_post_meta($speaker_id,"speaker_company",true),
					
					"speaker_twitter" => get_post_meta($speaker_id,"speaker_twitter",true),
					"speaker_facebook" => get_post_meta($speaker_id,"speaker_facebook",true),
					"speaker_linkedin" => get_post_meta($speaker_id,"speaker_linkedin",true),
					"speaker_flickr" => get_post_meta($speaker_id,"speaker_flickr",true),
					"speaker_instagram" => get_post_meta($speaker_id,"speaker_instagram",true),
					
					"thumbnail" => get_post_thumbnail_id($ID)
				));

			}
			return $speaker;

		}
		function displaySpeaker($speaker_data){
			extract($speaker_data);
			$src= getThumbnail($thumbnail,"thumbnail");
			print '<div class="speaker-image"><img src="'.$src.'" alt="'.$speaker_name.'"></div>';
			print '<div class="speaker-info">
				<strong>'.@$speaker_name."</strong><br>";
			if(@$speaker_title){
				print @$speaker_title.",<br>";
			}
			if(@$speaker_company){
				print @$speaker_company."<br>";
			}
			if(@$speaker_twitter){
				print '<a href="'.$speaker_twitter.'" target="_blank"><i class="fa fa-twitter"></i></a>';
			}
			if(@$speaker_facebook){
				print '<a href="'.$speaker_facebook.'" target="_blank"><i class="fa fa-facebook"></i></a>';
			}
			if(@$speaker_linkedin){
				print '<a href="'.$speaker_linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a>';
			}
			if(@$speaker_instagram){
				print '<a href="'.$speaker_instagram.'" target="_blank"><i class="fa fa-instagram"></i></a>';
			}
			if(@$speaker_flickr){
				print '<a href="'.$speaker_flickr.'" target="_blank"><i class="fa fa-flickr"></i></a>';
			}
			
			
				
			
				
			print "</div>";
			
			print '<div class="speaker-short-bio">'.wpautop($excerpt).'</div>';
		}
	
?>