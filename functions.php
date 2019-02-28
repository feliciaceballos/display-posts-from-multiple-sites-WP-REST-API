<?php 

//* Display posts from other blogs with WordPress REST API
function display_posts_from_other_blogs() {
	// trying to get value from the cache
if( false == $allposts = get_transient( 'misha_remote_cache' ) ) {
 
	// it will be the array with all posts
	$allposts = array();
 
	// get the first website latest posts
	$blog1 = wp_remote_get( 'https://premium.wpmudev.org/blog/wp-json/wp/v2/posts?author=699634' );
 
	if( !is_wp_error( $blog1 ) && $blog1['response']['code'] == 200 ) {
 
		$remote_posts = json_decode( $blog1['body'] ); // our posts are here
		foreach( $remote_posts as $remote_post ) {
 
			// I decided to create array like $allposts[1504838841] = Object
 			$allposts[ strtotime( $remote_post->date_gmt ) ] = $remote_post;
 
		}
	}
 
	// get the second website latest posts
	$blog2 = wp_remote_get( 'https://feliciaceballos.com/wp-json/wp/v2/posts?per_page=10' );
 
	if( !is_wp_error( $blog2 ) && $blog2['response']['code'] == 200 ) {
 
		$remote_posts = json_decode( $blog2['body'] ); // our posts are here
		foreach( $remote_posts as $remote_post ) {
 
 			$allposts[ strtotime( $remote_post->date_gmt ) ] = $remote_post;
 
		}
	}
 
	// get the third website latest posts
	$blog3 = wp_remote_get( 'https://greencottagejoy.com/wp-json/wp/v2/posts?per_page=10' );
 
	if( !is_wp_error( $blog3 ) && $blog3['response']['code'] == 200 ) {
 
		$remote_posts = json_decode( $blog3['body'] ); // our posts are here
		foreach( $remote_posts as $remote_post ) {
 			
 			$allposts[ strtotime( $remote_post->date_gmt ) ] = $remote_post;
 	
		}
	}
	// sort array by keys in descending order
	krsort( $allposts );
 
	// store cache
	set_transient( 'misha_remote_cache', $allposts, 60 ); // for 1 minute in this example
 
}
 
// print posts
foreach( $allposts as $remote_post ) {
	$timestamp = strtotime( $remote_post->date_gmt );
	$date = gmdate("m/d/y",$timestamp);
	
	echo '<p><a href="' .$remote_post->link.'">'.$remote_post->title->rendered.'</a> ' . $date . '</p>';
}
}
