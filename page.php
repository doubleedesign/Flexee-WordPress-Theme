<?php
/**
 * The default template for displaying pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FlexeeWP
 */

get_header(); ?>

<section id="primary">

	<div class="row">

		<main id="post-<?php the_ID(); ?>" <?php post_class('content-area start-12 tablet-8 columns'); ?>>

			<?php
			while ( have_posts() ) : the_post(); ?>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flexee' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<?php 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main>

		<?php get_sidebar(); ?>

	</div>

</section>

<?php get_footer(); ?>