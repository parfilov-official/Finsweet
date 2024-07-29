
<?php get_header();?>

<style>
  .category-sidebar-categories__text::first-letter,
  .category-top-section__title::first-letter {
    text-transform: uppercase;
  }
</style>

<section class="category-top-section">
  <div class="container category-top-section__container">
    <h1 class="category-top-section__title"><?php echo get_the_category()[0]->name; ?></h1>
    <p class="category-top-section__text">
    <?php echo get_the_category()[0]->description; ?>
    </p>
    <nav class="category-top-section-breadcrumbs">
      <ul class="category-top-section-breadcrumbs__list">
        <li class="category-top-section-breadcrumbs__item">Blog</li>
        <li class="category-top-section-breadcrumbs__item"><?php echo get_the_category()[0]->name; ?></li>
      </ul>
    </nav>
  </div>
</section>
<div class="category-wrap">
  <div class="container category-wrap__container">
    <section class="sorted-posts">
      <ul class="sorted-posts__list">
        <?php $args = array(
          'cat' => get_the_category()[0]->term_id,
          'posts_per_page' => 4, 
          'paged' => $paged
        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()) :
          while ($custom_query->have_posts()) : $custom_query->the_post();?>
            <li class="sorted-posts__item">
              <div class="sorted-posts__img">
                <?php the_post_thumbnail();?>
              </div>
              <div class="sorted-posts__wrapper">
                <span class="sorted-posts__category title highlight"><?php echo get_the_category()[0]->name ; ?></span>
                <h2 class="sorted-posts__title">
                  <a class="sorted-posts__link" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h2>
                <?php the_excerpt(); ?>
              </div>
            </li>
            <?php endwhile;
          ?>
            <?php
            wp_reset_postdata();
        else :
          ?>
          <p>No posts found.</p>
          <?php
        endif; ?>
      </ul>
    </section>
    <aside class="category-sidebar">
      <div class="category-sidebar-categories">
        <h3 class="category-sidebar-categories__title">Categories</h3>
        <ul class="category-sidebar-categories__list">
          <?php foreach (get_categories() as $cat) : ?>
            <li class="category-sidebar-categories__item">
              <a class="<?php echo ($cat->cat_name === get_the_category()[0]->name) ? 'category-sidebar-categories__button category-sidebar-categories__button_active' : 'category-sidebar-categories__button'; ?>" href="<?php echo get_category_link($cat->term_id); ?>">
              <img class="category__img" src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" alt="">
                <span class="category-sidebar-categories__text"><?php echo $cat->cat_name; ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="category-sidebar-all-tags">
        <h3 class="category-sidebar-all-tags__title">All Tags</h3>
        <ul class="category-sidebar-all-tags__list">
          <li class="category-sidebar-all-tags__item">
            <button class="category-sidebar-all-tags__button" type="button">Business</button>
          </li>
          <li class="category-sidebar-all-tags__item">
            <button class="category-sidebar-all-tags__button" type="button">Experience</button>
          </li>
          <li class="category-sidebar-all-tags__item">
            <button class="category-sidebar-all-tags__button" type="button">Screen</button>
          </li>
          <li class="category-sidebar-all-tags__item">
            <button class="category-sidebar-all-tags__button" type="button">Technology</button>
          </li>
          <li class="category-sidebar-all-tags__item">
            <button class="category-sidebar-all-tags__button" type="button">Marketing</button>
          </li>
          <li class="category-sidebar-all-tags__item">
            <button class="category-sidebar-all-tags__button" type="button">Life</button>
          </li>
        </ul>
      </div>
    </aside>
  </div>
</div>

<?php get_footer();?>