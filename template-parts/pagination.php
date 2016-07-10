<?php /* 2.0 */ 
global $wp_query; if ( $wp_query->max_num_pages > 1 ) : if(is_home() || is_archive() || is_search()) { ?>
<div class="pagination start-16 columns">
  <?php global $wp_query; $big = 999999999; echo paginate_links( apply_filters( 'woocommerce_pagination_args', array( 'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link($big))), 'format' => '?paged=%#%', 'add_args' => '', 'current' => max( 1, get_query_var( 'paged' ) ), 'total' => $wp_query->max_num_pages, 'prev_text' => '<i class="fa fa-angle-left"></i>', 'next_text' => '<i class="fa fa-angle-right"></i>', 'type' => 'list', 'end_size' => 3, 'mid_size' => 3))); ?>
</div>
<?php }; endif; ?>
<?php $posts = wp_count_posts();$published = $posts->publish; if( $published > 1 ) { if(is_single()) { ?>
<div class="pagination single start-16 columns">
  <ul>
    <li class="older">
      <?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?>
    </li>
    <li class="newer">
      <?php next_post_link('%link', '<i class="fa fa-angle-right"></i>'); ?>
    </li>
  </ul>
</div>
<?php };}; ?>
