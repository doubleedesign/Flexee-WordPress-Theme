<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<?php if (has_post_thumbnail()) { ?>
          <div class="image start-16 medium-8 tablet-portrait-4 columns"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
    <?php }; ?>
    <?php if (has_post_thumbnail()) { ?>
    <div class="description start-16 medium-8 tablet-portrait-12 columns">
    <?php } else { ?>
    <div class="description start-16 columns">
    <?php } ?>
          <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php if( get_post_type( $post->ID ) == 'post') { ?>
          	<small class="meta">Posted on <?php the_time('F j, Y'); ?> in <?php echo get_the_category_list( ', '); ?> </small>
          <?php } ?>
          <?php $content = apply_filters('the_content', get_the_content());$content = str_replace(']]>', ']]&gt;', $content);$excerpt = wp_trim_words($content, 55, '... ' ); echo wpautop($excerpt); ?>
          <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more <i class="fa fa-angle-right"></i></a>
          <?php wp_reset_postdata(); ?>
    </div>
</article>