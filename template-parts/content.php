<?php
/**
 * Template part for displaying posts. 
 * Can be customised for each post format by duplicating the file renaming it according to the format,
 * e.g. content-gallery, content-quote. 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FlexeeWP
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
	
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		
			<div class="entry-meta">
				<?php flexee_posted_on(); ?>
			</div><!-- .entry-meta -->
		
		<?php
		endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'flexee' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flexee' ),
				'after'  => '</div>',
			) );
		?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	
		<?php flexee_entry_footer(); ?>
		
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->
