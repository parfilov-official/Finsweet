
<?php get_header();?>

<?php
  while ( have_posts() ) :
    the_post();
    get_template_part( 'template-parts/content', 'post' );  
  endwhile; 
?>

<section class="other-posts">
  <div class="container other-posts__container">
    <h2 class="other-posts__title">What to read next</h2>
    <ul class="other-posts__list line">
      <?php
        $custom_query = new WP_Query( array(
            'post_type' => 'post',
            'posts_per_page' => 3, 
        ) );
        if ( $custom_query->have_posts() ) :
          while ( $custom_query->have_posts() ) : $custom_query->the_post();?>
            <li class="other-posts__item">
              <div class="other-posts__img">
                <?php the_post_thumbnail();?>
              </div>
              <div class="author">
                By
                <a class="author__highlight highlight" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                  <?php the_author();?> 
                </a>
                <time class="author__date" datetime="<?php echo get_the_date('c'); ?>"><?php the_time('F j, Y');?></time>
              </div>
              <a class="other-posts__link" href="<?php echo get_the_permalink();?>">
                <h3 class="other-posts__post-title"><?php the_title();?></h3>
              </a>
              <p class="other-posts__text">
                <?php the_excerpt();?>
              </p>
            </li>
            <?php
          endwhile;
        endif;
      wp_reset_postdata();?>
    </ul>
  </div>
</section>
<section class="join-us">
  <div class="join-us__wrap">
    <h2 class="join-us__title">
      Join our team to be a part of our story
    </h2>
    <p class="join-us__text">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
    </p>
    <a class="btn join-us__link" href="#">Join Now</a>
  </div>
</section>

<?php get_footer();?>