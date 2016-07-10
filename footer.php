<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FlexeeWP
 */

?>

	</section><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info row">
			<div class="start-12 columns">
				<span><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'flexee' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'flexee' ), 'WordPress' ); ?></a></span>
				<span><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'flexee' ), 'flexee', '<a href="http://www.leesaward.com.au" rel="designer">Leesa Ward</a>' ); ?></span>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
