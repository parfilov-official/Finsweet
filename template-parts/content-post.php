<section class="post">
  <div class="container post__container">
    <div class="post__desc">
      <div class="post-author">
        <?php echo get_avatar(get_the_author_meta('ID')); ?>
        <div class="post-author__info">
          <a class="post-author__highlight" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a>
          <time datetime="<?php echo get_the_date('c'); ?>">Posted on <?php the_time('F j, Y');?></time>
        </div>
      </div>
      <h1 class="post__title"><?php the_title();?></h1>
      <style>
        .post__category span::first-letter {
          text-transform: uppercase;
        }
      </style>
      <a class="post__category" href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>">
        <img src="<?php echo z_taxonomy_image_url(get_the_category()[0]->term_id); ?>" alt="">
        <span><?php echo get_the_category()[0]->name ; ?></span>
      </a>
    </div>
    <div class="post__thumbnail">
      <?php the_post_thumbnail();?>
    </div>
    <div class="post__content">
      <?php the_content(); ?>
    </div>
  </div>
</section>