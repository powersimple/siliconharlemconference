<?php

function selectScreenImage( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'slides',
		'title' => esc_html__( 'Slider', 'metabox-online-generator' ),
		'post_types' => array( 'post', 'page','project' ),
		'context' => 'side',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => 'top_slider',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Slides', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Appears in header if home page', 'metabox-online-generator' ),
				'force_delete' => false,
				'max_file_uploads' => '10',
				'options' => array(),
				'attributes' => array(),
			),
			array(
				'id' => 'section_foot',
				'type' => 'image_advanced',
				'name' => esc_html__( 'section-foot-bg', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Appears at bottom of section', 'metabox-online-generator' ),
				'force_delete' => false,
				'max_file_uploads' => '1',
				'options' => array(),
				'attributes' => array(),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'selectScreenImage' );


function setSessionDetails( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'slides',
		'title' => esc_html__( 'Session Details', 'metabox-online-generator' ),
		'post_types' => array( 'session' ),
		'context' => 'side',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'session_start',
				'type' => 'datetime',
				'name' => esc_html__( 'Session Start', 'metabox-online-generator' ),
				'std' => '1540540800',
				'desc' => esc_html__( 'Set the date and time for the session start', 'metabox-online-generator' ),
				'timestamp' => 'true',
			),
			array(
				'id' => $prefix . 'session_end',
				'name' => esc_html__( 'Session Ends', 'metabox-online-generator' ),
				'type' => 'time',
			),
			array(
				'id' => 'video_embed_url',
				'type' => 'url',
				'name' => esc_html__( 'Video Embed URL', 'metabox-online-generator' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'setSessionDetails' );


function setSessionSpeakers( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'session-speakers',
		'title' => esc_html__( 'Speakers', 'metabox-online-generator' ),
		'post_types' => array('session' ),
		'context' => 'side',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'speakers',
				'type' => 'post',
				'name' => esc_html__( 'Speakers', 'metabox-online-generator' ),
				'post_type' => 'speaker',
				'field_type' => 'checkbox_list',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'setSessionSpeakers' );

function setSessionSponsors( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'session-sponsors',
		'title' => esc_html__( 'Sponsors', 'metabox-online-generator' ),
		'post_types' => array('session' ),
		'context' => 'side',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' =>  'sponsors',
				'type' => 'post',
				'name' => esc_html__( 'Sponsors', 'metabox-online-generator' ),
				'post_type' => 'sponsor',
				'field_type' => 'checkbox_list',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'setSessionSponsors' );



function speaker_info( $meta_boxes ) {
	$prefix = 'prefix-';

	$meta_boxes[] = array(
		'id' => 'untitled',
		'title' => esc_html__( 'Speaker Info', 'metabox-online-generator' ),
		'post_types' => array('speaker' ),
		'context' => 'side',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => 'speaker_title',
				'type' => 'text',
				'name' => esc_html__( 'Title', 'metabox-online-generator' ),
			),
			array(
				'id' => 'speaker_company',
				'type' => 'text',
				'name' => esc_html__( 'Organization', 'metabox-online-generator' ),
			),
			array(
				'id' => 'speaker_website',
				'type' => 'url',
				'name' => esc_html__( 'Website', 'metabox-online-generator' ),
			),
			array(
				'id' => 'speaker_wikipedia',
				'type' => 'url',
				'name' => esc_html__( 'Wikipedia URL', 'metabox-online-generator' ),
			),
			array(
				'id' => 'speaker_linkedin',
				'type' => 'url',
				'name' => esc_html__( 'LinkedIn URL', 'metabox-online-generator' ),
			),
			array(
				'id' => 'speaker_twitter',
				'type' => 'url',
				'name' => esc_html__( 'Twitter URL', 'metabox-online-generator' ),
			),
			array(
				'id' => 'speaker_facebook',
				'type' => 'url',
				'name' => esc_html__( 'Facebook URL', 'metabox-online-generator' ),
			),
			array(
				'id' => 'speaker_flickr',
				'type' => 'url',
				'name' => esc_html__( 'Flickr URL', 'metabox-online-generator' ),
			),
			array(
				'id' => 'speaker_instagram',
				'type' => 'url',
				'name' => esc_html__( 'Instagram URL', 'metabox-online-generator' ),
			),
			
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'speaker_info' );


function setSponsors( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'sponsors',
		'title' => esc_html__( 'Sponsor Info', 'metabox-online-generator' ),
		'post_types' => array('sponsor' ),
		'context' => 'side',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => 'sponsor-url',
				'type' => 'url',
				'name' => esc_html__( 'Sponsor URL', 'metabox-online-generator' ),
				'post_type' => 'sponsor'
			),
			array(
				'id' => $prefix . 'sponsor_level',
				'name' => esc_html__( 'Sponsorship Level', 'metabox-online-generator' ),
				'type' => 'select',
				'placeholder' => esc_html__( 'Select Level', 'metabox-online-generator' ),
				'options' => array(
					'Terrabit' => 'Terrabyte Sponsor',
					'Gigabit' => 'Gigabit',
					'Megabit' => 'Megabit',
					'Community' => 'Community Stakeholder',
					'After Party' => 'After Party',
				),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'setSponsors' );




?>