<?php 
/**
 * @package Prectice1
*/
defined('WP_UNINSTALL_PLUGIN') or die("");

// // delete plugin options
// delete_option('myplugin_options');

// // delete plugin transient
// delete_transient('myplugin_transient');

// // delete cron event
// $timestamp = wp_next_scheduled('myplugin_cron_event');
// wp_unschedule_event($timestamp, 'myplugin_cron_event');

// delete database table
// global $wpdb;
// $table_name = $wpdb->prefix .'myplugin_table';
// $wpdb->query("DROP TABLE IF EXISTS {$table_name}");

// delete pages
// $myplugin_pages = get_option('myplugin_pages');
// if (is_array($myplugin_pages) && !empty($myplugin_pages)) {
// 	foreach ($myplugin_pages as $myplugin_page) {
// 		wp_trash_post($myplugin_page);
// 	}
// }

// delete custom post type posts
$myplugin_cpt_args = array('post_type' => 'custome_slider', 'posts_per_page' => -1);
$myplugin_cpt_posts = get_posts($myplugin_cpt_args);
foreach ($myplugin_cpt_posts as $post) {
	wp_delete_post($post->ID, false);
}

// delete user meta
// $users = get_users();
// foreach ($users as $user) {
// 	delete_user_meta($user->ID, 'myplugin_user_meta');
// }

// delete post meta
// $myplugin_post_args = array('posts_per_page' => -1);
// $myplugin_posts = get_posts($myplugin_post_args);
// foreach ($myplugin_posts as $post) {
// 	delete_post_meta($post->ID, 'myplugin_post_meta');
// }