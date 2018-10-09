<?php
    	function getSpeaker($speaker_id){
			global $wpdb;
			$q = $wpdb->get_row("
			select ID, post_name, post_date, post_excerpt, post_title, post_content
			from wp_posts
			where ID= $speaker_id
			
			order by menu_order
				");
				extract((array) $q);
			$speaker = array(
				"id" => $speaker_id,
				"speaker_name" =>$post_title,
				"content" => $post_content,
				"excerpt" => $post_excerpt,
				
				"slug" => $post_name,
				"speaker_title" => get_post_meta($speaker_id,"speaker_title",true),
				"speaker_company" => get_post_meta($speaker_id,"speaker_company",true),
				"speaker_website" => get_post_meta($speaker_id,"speaker_website",true),
				"speaker_wikipedia" => get_post_meta($speaker_id,"speaker_wikipedia",true),
				"speaker_twitter" => get_post_meta($speaker_id,"speaker_twitter",true),
				"speaker_facebook" => get_post_meta($speaker_id,"speaker_facebook",true),
				"speaker_linkedin" => get_post_meta($speaker_id,"speaker_linkedin",true),
				"speaker_flickr" => get_post_meta($speaker_id,"speaker_flickr",true),
				"speaker_instagram" => get_post_meta($speaker_id,"speaker_instagram",true),
				
                "thumbnail" => get_post_thumbnail_id($ID),
                "permalink" => get_permalink($speaker_id)
			);
			
			return $speaker;

		}
		function displaySpeaker($speaker_data,$media_size,$context="none"){
			extract($speaker_data);
			$src= getThumbnail($thumbnail,$media_size);
			print '<div class="speaker-short-bio">';
            print '<div class="speaker-info">';
           
            
			if($src != ""){
                print '<div class="speaker-image">';
                print '<a href="'.$permalink.'">';
                print '<img src="'.$src.'" alt="'.$speaker_name.'"></a></div>';
            }
           
            print '<div class="speaker-vitals">';
            print '<a href="'.$permalink.'">';
			print '<strong>'.@$speaker_name."</strong></a><br>";
			if(@$speaker_title){
				print @$speaker_title.",<br>";
			}
			if(@$speaker_company){
				print @$speaker_company."<br>";
			}
			if(@$speaker_website){
				print '<a href="'.$speaker_website.'" target="_blank"><i class="fa fa-link"></i></a>';
			}
			if(@$speaker_wikipedia){
				print '<a href="'.$speaker_wikipedia.'" target="_blank"><i class="fa fa-wikipedia-w"></i></a>';
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
			
			
				
			
				
            print "</div>
            </div>";
			if(@$context == 'long'){
                print wpautop($content);
            } else if(@$context == 'short'){
               print wpautop($excerpt);
            } else{
                
            }
            print '</div>';
        }
        function speakerList($speakers){
            $speaker_list = array();
            foreach($speakers as $key=>$speaker_id){
                array_push($speaker_list,getSpeaker($speaker_id));
            }
            return $speaker_list;
        }

?>