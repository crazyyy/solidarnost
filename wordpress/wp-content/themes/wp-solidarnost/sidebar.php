<aside class="sidebar" role="complementary">

  <?php if ( is_active_sidebar('widgetarea1') ) : ?>
    <?php dynamic_sidebar( 'widgetarea1' ); ?>
  <?php else : ?>

    <!-- If you want display static widget content - write code here
		RU: Здесь код вывода того, что необходимо для статического контента виджетов -->

  <?php endif; ?>


  <?php

  // args
  $args = array(
    'numberposts' => 5,
    'post_type'   => 'post',
    'meta_key'    => 'video'
  );

  // query
  $the_query = new WP_Query( $args );

  ?>
  <?php if( $the_query->have_posts() ): ?>
  <div class="widget widget_last_video">
    <h6>последние видео</h6>
    <ul>
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li>
        <?php if(get_field('video')) { echo  get_field('video'); } ?>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </li>
    <?php endwhile; ?>
    </ul>
  </div><!-- /.widget widget_last_video -->
  <?php endif; ?>

  <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>








</aside><!-- /sidebar -->
