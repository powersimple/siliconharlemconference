<?php
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
					"content"=>$value->post_content,
					"section_foot"=>get_post_meta($value->ID,"section_foot",true)
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
            } else if(!is_front_page()) {
                $href = get_home_url()."/#".$value->post_name;
                $target="";
            } else {
				$href = "#".$value->post_name;
				$target="";
			}

          
			print '<li><a class="section-scroll" href="'.$href.'"'.$target.'>'.$value->post_title.'</a>';// if printed, shows this.
            
		}
	}

    function linkThis($url,$label,$blank_target=true){
        $target = '';  
        $absolute = '';
        if($blank_target == true){
          $target = 'target="_blank"';
        }
        
        if($url != ''){
          return '<a href="'. $absolute.$url.'" '.$target.'>'.$label.'</a>';
        } 
	  }
	  function isSelected($id,$match){
		$selected = '';
		if($id == $match){
			$selected = ' selected';
		}
		return $selected;
	  }
?>