<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package FlexeeWP
 */

get_header(); ?>

<section id="primary">

	<div class="row">

		<main class="content-area start-12 tablet-8 columns">

			<section class="error-404 not-found">
			
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'flexee' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
				
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Please try making another selection from the navigation.', 'flexee' ); ?></p>

				</div><!-- .page-content -->
				
			</section><!-- .error-404 -->

		</main>

	</div>
	
</section>

<?php
get_footer();
