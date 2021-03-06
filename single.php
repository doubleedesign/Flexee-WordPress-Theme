<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FlexeeWP
 */

get_header(); ?>

<section id="primary">

	<div class="row">

		<article id="post-<?php the_ID(); ?>" class="content-area start-12 tablet-8 columns" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</article>

		<?php get_sidebar(); ?>

	</div>

</section>

<?php get_footer(); ?>