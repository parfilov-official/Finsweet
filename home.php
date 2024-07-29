
<?php get_header();?>

<section class="featured-post-section">
  <div class="container featured-post-section__container">
    <div class="featured-post-section__wrapper">
      <h2 class="title featured-post-section__main-title">
        Featured Post
      </h2>
      <?php
      $args = array(
        'post__in' => get_option('sticky_posts'),
        'orderby' => 'post__in',
        'posts_per_page' => 1,
      );
      
      $query = new WP_Query($args);
      while ($query->have_posts()) {
        $query->the_post();
        ?>
        <h3 class="featured-post-section__title"><?php the_title(); ?></h3>
        <div class="author">
          By
          <a class="author__highlight highlight" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
          <time class="author__date" datetime="<?php echo get_the_date('c'); ?>"><?php the_time('F j, Y');?></time>
        </div>
        <p class="featured-post-section__text"><?php echo get_the_excerpt(); ?></p>
        <a class="btn" href="<?php the_permalink(); ?>">Read More ></a>
        <!-- закрывающий тег featured-post-section__wrapper-->
        </div> 
        <!-- закрывающий тег featured-post-section__wrapper-->
        <div class="featured-post-section__img">
          <?php the_post_thumbnail();?>
          <img src="assets/images/thumbnail-feature-blog.jpg" alt="">
        </div>
        <?php }  wp_reset_postdata(); ?>
  </div>
</section>
<section class="all-posts-section">
  <div class="container all-posts-section__container">
    <h1 class="all-posts-section__title line">
      All posts
    </h1>
    <ul class="all-posts-section__list">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li class="all-posts-section__item">
        <?php the_post_thumbnail();?>
        <div class="all-posts-section__wrapper">
          <h3 class="title all-posts-section__category">
            <?php
              $category = get_the_category($post->ID);
              foreach ($category as $cat) {
                ?>
                  <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name;?></a>  
                <?php
              }
            ?>
          </h3>
          <h2 class="all-posts-section__post-title">
            <a href="<?php echo get_the_permalink();?>">
            <?php the_title();?>
          </a>
          </h2>
          <p class="all-posts-section__text"><?php the_excerpt();?></p>
        </div>
      </li>
      <?php endwhile; else: ?>
      <li class="all-posts-section__item">
        <img src="assets/images/thumbnail-1.jpg" alt="">
        <h2 class="all-posts-section__post-title">
            Постов нет
        </h2>
      </li>
      <?php endif; ?>
    </ul>
    <?php
      global $wp_query;
      $current_page = max(1, get_query_var('paged'));
      $max_page = $wp_query->max_num_pages;

      $prev_page_link = ($current_page > 1) ? get_previous_posts_page_link() : '#';
      $next_page_link = ($current_page < $max_page) ? get_next_posts_page_link() : '#';
      ?>

      <nav class="all-posts-section__nav">
        <a class="<?php echo ($current_page === 1) ? 'all-posts-section__button' : 'all-posts-section__button all-posts-section__button_active'; ?>" href="<?php echo esc_url($prev_page_link); ?>" >&lt; Prev </a>
        <a class="<?php echo ($current_page === $max_page) ? 'all-posts-section__button' : 'all-posts-section__button all-posts-section__button_active'; ?>" href="<?php echo esc_url($next_page_link); ?>">Next &gt;</a>
      </nav>
  </div>
</section>
<section class="category">
  <div class="container category__container">
    <h2 class="category__main-title category__main-title_blog">
      All Categories
    </h2>
    <ul class="category__list">
      <style>
        .category__title::first-letter {
            text-transform: uppercase;
        }
      </style>
      <?php foreach (get_categories() as $cat) : ?>
        <li class="category__item">
          <a class="category__link category-index-link" href="<?php echo get_category_link($cat->term_id); ?>">
            <img class="category__img" src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" alt="">
            <h3 class="category__title"><?php echo $cat->cat_name; ?></h3>
            <p class="category__text">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
            </p>
          </a>
        </li>
      <?php endforeach; ?>
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