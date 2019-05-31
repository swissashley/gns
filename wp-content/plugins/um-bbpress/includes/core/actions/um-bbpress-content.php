<?php
if ( ! defined( 'ABSPATH' ) ) exit;


	/***
	***	@Hook in replies
	***/
	add_action('bbp_theme_after_reply_author_details', 'um_bbpress_theme_after_reply_author_details');
	function um_bbpress_theme_after_reply_author_details() {
		do_action('um_bbpress_theme_after_reply_author_details');
	}
	
	/***
	***	@default tab
	***/
	add_action('um_profile_content_forums_default', 'um_bbpress_default_tab_content');
	function um_bbpress_default_tab_content( $args ) {

		$tabs = UM()->user()->tabs;
		
		$default_tab = $tabs['forums']['subnav_default'];

		$theme_file = get_stylesheet_directory() . '/ultimate-member/templates/bbpress/' . $default_tab . '.php';
		if ( file_exists( $theme_file ) ) {
			require $theme_file;
		} else {
			require um_bbpress_path . 'templates/' . $default_tab . '.php';
		}
		
	}
	
	/***
	***	@topics
	***/
	add_action('um_profile_content_forums_topics', 'um_bbpress_user_topics');
	function um_bbpress_user_topics( $args ) {
		if ( um_user('can_create_topics') ) {
	
		$theme_file = get_stylesheet_directory() . '/ultimate-member/templates/bbpress/topics.php';
		if ( file_exists( $theme_file ) ) {
			require $theme_file;
		} else {
			require um_bbpress_path . 'templates/topics.php';
		}
	
		}
		
	}
	
	/***
	***	@replies
	***/
	add_action('um_profile_content_forums_replies', 'um_bbpress_user_replies');
	function um_bbpress_user_replies( $args ) {
		if ( um_user('can_create_replies') ) {
			
		$theme_file = get_stylesheet_directory() . '/ultimate-member/templates/bbpress/replies.php';
		if ( file_exists( $theme_file ) ) {
			require $theme_file;
		} else {
			require um_bbpress_path . 'templates/replies.php';
		}

		}
		
	}
	
	/***
	***	@favorites
	***/
	add_action('um_profile_content_forums_favorites', 'um_bbpress_user_favorites');
	function um_bbpress_user_favorites( $args ) {
		$theme_file = get_stylesheet_directory() . '/ultimate-member/templates/bbpress/favorites.php';
		if ( file_exists( $theme_file ) ) {
			require $theme_file;
		} else {
			require um_bbpress_path . 'templates/favorites.php';
		}
		
	}
	
	/***
	***	@subscriptions
	***/
	add_action('um_profile_content_forums_subscriptions', 'um_bbpress_user_subscriptions');
	function um_bbpress_user_subscriptions( $args ) {
		if ( ! UM()->roles()->um_current_user_can('edit', um_user('ID') ) ) return;
		
		$theme_file = get_stylesheet_directory() . '/ultimate-member/templates/bbpress/subscriptions.php';
		if ( file_exists( $theme_file ) ) {
			require $theme_file;
		} else {
			require um_bbpress_path . 'templates/subscriptions.php';
		}
		
	}


    add_action( 'bbp_new_reply', 'um_bbp_new_reply', 1000, 5 );
    function um_bbp_new_reply( $reply_id, $topic_id, $forum_id, $anonymous_data, $reply_author_id ) {
        do_action( 'um_bbpress_new_reply', $reply_id, $topic_id, $forum_id, $anonymous_data, $reply_author_id );
    }