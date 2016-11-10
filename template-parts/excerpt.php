<?php
/**
 * Template part for displaying excerpts in archives.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FlexeeWP
 */

?>
		
<article id="post-<?php the_ID(); ?>" <?php post_class('excerpt'); ?>>

	<?php if (has_post_thumbnail()) { ?>
         
          <div class="image">
			  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          </div>
          
    <?php }; ?>
    
    <div class="entry-content">
         
          <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          
          <?php if( get_post_type( $post->ID ) == 'post') { ?>
          
	          	<small class="meta">Posted on <?php the_time('F j, Y'); ?> in <?php echo get_the_category_list( ', '); ?> </small>
          	
          <?php } ?>
          
          <?php the_excerpt(); ?>
          
          <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
          
          <?php wp_reset_postdata(); ?>
          
    </div><!-- .entry-content -->
    
</article>