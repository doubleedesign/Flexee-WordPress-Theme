<?php

/**
 * Developer functions
 *
 * Useful functions for developers to use as desired when developing themes.
 */


/* ===========================================
	FEATURED IMAGE CAPTIONS
============================================*/

/* Enable captions on featured images (when called in template)*/
function flexee_post_thumbnail_caption() {
	global $post;

	$thumbnail_id    = get_post_thumbnail_id($post->ID);
	$thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

	if ($thumbnail_image && isset($thumbnail_image[0])) {
	echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>'; //Change markup as needed here
	}
}


/* ===========================================
	SPLIT CONTENT AT "MORE" TAGS
	Thank you: https://digwp.com/2010/03/wordpress-post-content-multiple-columns/
	(Altered to return an array so we can put them anywhere in the template markup)
	
	Template usage:
	
	In place of the_content(), call the function 
	Echo each section of content wherever you like in your template
	<?php
	// split content into array
	$content = get_the_content('',FALSE,''); // arguments remove 'more' text
	$splitcontent = flexeeee_split_content($content);
	echo $splitcontent[0];
	echo $splitcontent[1];
	echo $splitcontent[2];
	//and so on for more sections!
	?>
============================================*/

// split content at the more tag and return an array
function flexee_split_content($content){
	// run through a couple of essential tasks to prepare the content
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
 
	// the first "more" is converted to a span with ID
	$columns = preg_split('/(<span id="more-d+"></span>)|(<!--more-->)</p>/', $content);
	$col_count = count($columns);
 
	if($col_count > 1) {
		for($i=0; $i<$col_count; $i++) {
			// check to see if there is a final </p>, if not add it
			if(!preg_match('/</p>s?$/', $columns[$i]) )  {
				$columns[$i] .= '</p>';
			}
			// check to see if there is an appending </p>, if there is, remove
			$columns[$i] = preg_replace('/^s?</p>/', '', $columns[$i]);
			// now add the div wrapper
			//$columns[$i] = '<div class="dynamic-col-'.($i+1).'">'.$columns[$i].'</div>'; //only need this if returning $content, not $columns
			$columns[$i] = $columns[$i];
		}
		//$content = join($columns, "n").'<div class="clear"></div>'; //only need this if returning $content, not $columns
	}
	else {
		// this page does not have dynamic columns
		$content = wpautop($content);
	}
	// remove any left over empty <p> tags if returning $content
	//$content = str_replace('<p></p>', '', $content);
	//return $content; //returns everything in one variable, with divs around each "column" ready for styling
	// remove any left over empty <p> tags if returning $columns
	$columns = str_replace('<p></p>', '', $columns);
	return $columns; //returns an array so we can select where to echo each "column"
}


/* ===========================================
	SEPARATE PAGE OR POST GALLERY FROM THE MAIN CONTENT
	Thank you: http://wordpress.stackexchange.com/questions/121489/split-content-and-gallery
	This version does not support multiple galleries on a single page or post
	
	Template usage: 
	
	<?php
	// Get the content without the gallery
	$content = strip_shortcode_gallery( get_the_content() ); 
	$content = str_replace( ']]>', ']]>', apply_filters( 'the_content', $content ) ); 

	// Show it
	echo $content;
	
	// Show the gallery here
	$gallery = get_post_gallery();
	echo $gallery;
	?>
============================================*/

function flexee_strip_shortcode_gallery( $content ) {
    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if ($pos !== false)
                    return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
            }
        }
    }
    return $content;
}




?>