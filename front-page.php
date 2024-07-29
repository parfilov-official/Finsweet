
<?php get_header();?>
    <section class="hero" style="background: radial-gradient(38% 100% at 74.58% 0%, rgba(255, 255, 255, 0.36) 0%, rgba(0, 0, 0, 0.6) 100%), url(<?php the_field('front-page-top-bg'); ?>) no-repeat center / cover;">
      <div class="container hero__container">
        <div class="hero__wrapper">
          <p class="hero__posted-on  title">
            Posted on <span class="hero__upper">startup</span>
          </p>
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
            <h1 class="hero__title"><?php the_title(); ?></h1>
            <div class="author hero__author">
              By
              <a class="author__highlight hero__highlight" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
              <time class="author__date" datetime="<?php echo get_the_date('c'); ?>"><?php the_time('F j, Y');?></time>
            </div>
            <p class="hero__text"><?php echo get_the_excerpt(); ?></p>
            <a class="btn" href="<?php the_permalink(); ?>">Read More ></a>
            <?php }  wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
    <section class="posts">
      <div class="container posts__container">
        <div class="featured-post posts__featured">
          <h2 class="posts__title">Featured Post</h2>
          <div class="featured-post__wrapper">
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
              <div class="featured-post__img">
                <?php the_post_thumbnail();?>
              </div>
              <div class="featured-post__content">
                <div class="author featured-post__author">
                  By
                  <a class="highlight author__highlight" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?> </a>
                  <time class="author__date" datetime="<?php echo get_the_date('c'); ?>"><?php the_time('F j, Y');?></time>
                </div>
                <h3 class="featured-post__title"><?php the_title(); ?></h3>
                <p class="featured-post__text"><?php echo get_the_excerpt(); ?></p>
                <a class="btn" href="<?php the_permalink(); ?>">Read More ></a>
              </div>
            <?php }  wp_reset_postdata(); ?>
          </div>
        </div>
        <div class="all-posts posts__all">
          <div class="all-posts__top-wrap">
            <h2 class="posts__title">All Posts</h2>
            <a class="highlight all-posts__view-all-link" href="blog/">View All</a>
          </div>
          <ul class="all-posts__list">
          <?php
            $custom_query = new WP_Query( array(
                'post_type' => 'post',
                'posts_per_page' => 4, 
            ) );
            if ( $custom_query->have_posts() ) :
              while ( $custom_query->have_posts() ) : $custom_query->the_post();?>
                <li class="all-posts__item">
                  <div class="author all-posts__author">
                    By
                    <a class="author__highlight highlight" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                      <?php the_author();?> 
                    </a>
                    <time class="author__date" datetime="<?php echo get_the_date('c'); ?>"><?php the_time('F j, Y');?></time>
                  </div>
                  <h3 class="all-posts__title">
                    <a class="all-posts__link" href="<?php echo get_the_permalink();?>">
                      <?php the_title();?>
                    </a>
                  </h3>
                </li>
                <?php
              endwhile;
            endif;
            wp_reset_postdata();?>
          </ul>
        </div>
      </div>
    </section>
    <section class="about-us-index">
      <div class="container about-us-index__container">
        <div class="about-us-index__wrapper">
          <div  class="about-us-index__about-us">
            <h2 class="about-us-index__main-title title">ABOUT US</h2>
            <h3 class="about-us-index__title about-us-index__title_about-us">
              We are a community of content writers who share their learnings
            </h3>
            <p class="about-us-index__text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <a class="highlight about-us-index__link" href="/about-us">Read More ></a>
          </div>
          <div class="about-us-index__our-mission">
            <h2 class="about-us-index__main-title title">Our mision</h2>
            <h3 class="about-us-index__title about-us-index__title_our-mission">
              Creating valuable content for creatives all around the world
            </h3>
            <p class="about-us-index__text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="category">
      <div class="container category__container">
        <h2 class="category__main-title">
          Choose A Catagory
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
                  <?php echo $cat->description; ?>
                </p>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
    <section class="why-we-started">
      <div class="container why-we-started__container">
        <div class="why-we-started__img">
          <img src="assets/images/why-we-started.jpg" alt="">
        </div>
        <div class="why-we-started__wrapper">
          <h2 class="why-we-started__main-title  title">Why we started </h2>
          <h3 class="why-we-started__title">
            It started out as a simple idea and evolved into our passion
          </h3>
          <p class="why-we-started__text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
          </p>
          <a class="btn why-we-started__link" href="/about-us">Discover our story ></a>
        </div>
      </div>
    </section>
    <section class="authors">
      <div class="container authors__container">
        <h2 class="authors__main-title">List of Authors</h2>
        <ul class="authors__list">
          <?php
            $authors = get_users(array(
              'capabilities' => 'all',
              'has_published_posts' => array('post')
            ));

            if (!empty($authors)) {
              foreach ($authors as $author) {
                  $author_id = $author->ID;
                  $author_name = $author->display_name;
                  $author_avatar = get_avatar($author_id);
                  $author_posts_url = get_author_posts_url($author_id); ?>
                  <li class="authors__item">
                    <a href="<?php echo esc_url($author_posts_url); ?>">
                      <?php echo $author_avatar ?>
                      <h3 class="authors__title"><?php echo esc_html($author_name)?></h3>
                    </a>
                    <p class="authors__company">
                      Content Writer 
                      <a href="#">@Company</a>
                    </p>
                    <ul class="social authors__social">
                      <li class="social__item">
                        <a href="#" target="_blank" class="social__link">
                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 11.993 2.92547 15.3027 6.75 15.9028V10.3125H4.71875V8H6.75V6.2375C6.75 4.2325 7.94438 3.125 9.77172 3.125C10.6467 3.125 11.5625 3.28125 11.5625 3.28125V5.25H10.5538C9.56 5.25 9.25 5.86672 9.25 6.5V8H11.4688L11.1141 10.3125H9.25V15.9028C13.0745 15.3027 16 11.993 16 8Z" fill="#232536"/>
                          </svg>
                        </a>
                      </li>
                      <li class="social__item">
                        <a href="#" target="_blank" class="social__link">
                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.03344 14.5005C11.0697 14.5005 14.3722 9.49829 14.3722 5.16173C14.3722 5.0211 14.3691 4.87735 14.3628 4.73673C15.0053 4.27213 15.5597 3.69666 16 3.03735C15.4017 3.30355 14.7664 3.47741 14.1159 3.55298C14.8009 3.14243 15.3137 2.49747 15.5594 1.73767C14.915 2.11953 14.2104 2.3889 13.4756 2.53423C12.9806 2.0082 12.326 1.6599 11.6131 1.54319C10.9003 1.42648 10.1688 1.54786 9.53183 1.88855C8.89486 2.22925 8.38787 2.77029 8.08923 3.42803C7.7906 4.08577 7.71695 4.82356 7.87969 5.52735C6.575 5.46188 5.29862 5.12296 4.13332 4.53255C2.96802 3.94215 1.9398 3.11345 1.11531 2.10017C0.696266 2.82265 0.568038 3.67758 0.756687 4.49122C0.945337 5.30485 1.43671 6.01612 2.13094 6.48048C1.60975 6.46393 1.09998 6.32361 0.64375 6.0711V6.11173C0.643283 6.86992 0.905399 7.60488 1.38554 8.19167C1.86568 8.77846 2.53422 9.18086 3.2775 9.33048C2.7947 9.46257 2.28799 9.48182 1.79656 9.38673C2.0063 10.0388 2.41438 10.6091 2.96385 11.018C3.51331 11.427 4.17675 11.6542 4.86156 11.668C3.69895 12.5812 2.26278 13.0766 0.784375 13.0742C0.522191 13.0738 0.260266 13.0578 0 13.0261C1.5019 13.9897 3.24902 14.5014 5.03344 14.5005Z" fill="#232536"/>
                            </svg>
                        </a>
                      </li>
                      <li class="social__item">
                        <a href="#" target="_blank" class="social__link">
                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_433_400)">
                            <path d="M8 1.44062C10.1375 1.44062 10.3906 1.45 11.2313 1.4875C12.0125 1.52187 12.4344 1.65313 12.7156 1.7625C13.0875 1.90625 13.3563 2.08125 13.6344 2.35937C13.9156 2.64062 14.0875 2.90625 14.2313 3.27813C14.3406 3.55937 14.4719 3.98437 14.5063 4.7625C14.5438 5.60625 14.5531 5.85938 14.5531 7.99375C14.5531 10.1312 14.5438 10.3844 14.5063 11.225C14.4719 12.0063 14.3406 12.4281 14.2313 12.7094C14.0875 13.0813 13.9125 13.35 13.6344 13.6281C13.3531 13.9094 13.0875 14.0813 12.7156 14.225C12.4344 14.3344 12.0094 14.4656 11.2313 14.5C10.3875 14.5375 10.1344 14.5469 8 14.5469C5.8625 14.5469 5.60938 14.5375 4.76875 14.5C3.9875 14.4656 3.56563 14.3344 3.28438 14.225C2.9125 14.0813 2.64375 13.9062 2.36563 13.6281C2.08438 13.3469 1.9125 13.0813 1.76875 12.7094C1.65938 12.4281 1.52813 12.0031 1.49375 11.225C1.45625 10.3813 1.44688 10.1281 1.44688 7.99375C1.44688 5.85625 1.45625 5.60312 1.49375 4.7625C1.52813 3.98125 1.65938 3.55937 1.76875 3.27813C1.9125 2.90625 2.0875 2.6375 2.36563 2.35937C2.64688 2.07812 2.9125 1.90625 3.28438 1.7625C3.56563 1.65313 3.99063 1.52187 4.76875 1.4875C5.60938 1.45 5.8625 1.44062 8 1.44062ZM8 0C5.82813 0 5.55625 0.009375 4.70313 0.046875C3.85313 0.084375 3.26875 0.221875 2.7625 0.41875C2.23438 0.625 1.7875 0.896875 1.34375 1.34375C0.896875 1.7875 0.625 2.23438 0.41875 2.75938C0.221875 3.26875 0.084375 3.85 0.046875 4.7C0.009375 5.55625 0 5.82812 0 8C0 10.1719 0.009375 10.4437 0.046875 11.2969C0.084375 12.1469 0.221875 12.7312 0.41875 13.2375C0.625 13.7656 0.896875 14.2125 1.34375 14.6562C1.7875 15.1 2.23438 15.375 2.75938 15.5781C3.26875 15.775 3.85 15.9125 4.7 15.95C5.55313 15.9875 5.825 15.9969 7.99688 15.9969C10.1688 15.9969 10.4406 15.9875 11.2938 15.95C12.1438 15.9125 12.7281 15.775 13.2344 15.5781C13.7594 15.375 14.2063 15.1 14.65 14.6562C15.0938 14.2125 15.3688 13.7656 15.5719 13.2406C15.7688 12.7312 15.9063 12.15 15.9438 11.3C15.9813 10.4469 15.9906 10.175 15.9906 8.00313C15.9906 5.83125 15.9813 5.55937 15.9438 4.70625C15.9063 3.85625 15.7688 3.27187 15.5719 2.76562C15.375 2.23437 15.1031 1.7875 14.6563 1.34375C14.2125 0.9 13.7656 0.625 13.2406 0.421875C12.7313 0.225 12.15 0.0875 11.3 0.05C10.4438 0.009375 10.1719 0 8 0Z" fill="#232536"/>
                            <path d="M8 3.89062C5.73125 3.89062 3.89062 5.73125 3.89062 8C3.89062 10.2688 5.73125 12.1094 8 12.1094C10.2687 12.1094 12.1094 10.2688 12.1094 8C12.1094 5.73125 10.2687 3.89062 8 3.89062ZM8 10.6656C6.52812 10.6656 5.33437 9.47188 5.33437 8C5.33437 6.52813 6.52812 5.33437 8 5.33437C9.47187 5.33437 10.6656 6.52813 10.6656 8C10.6656 9.47188 9.47187 10.6656 8 10.6656Z" fill="#232536"/>
                            <path d="M13.2313 3.72842C13.2313 4.25967 12.8 4.68779 12.2719 4.68779C11.7406 4.68779 11.3125 4.25654 11.3125 3.72842C11.3125 3.19717 11.7438 2.76904 12.2719 2.76904C12.8 2.76904 13.2313 3.20029 13.2313 3.72842Z" fill="#232536"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_433_400">
                            <rect width="16" height="16" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>
                        </a>
                      </li>
                      <li class="social__item">
                        <a href="#" target="_blank" class="social__link">
                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"   xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_433_405)">
                            <path d="M14.8156 0H1.18125C0.528125 0 0 0.515625 0 1.15313V14.8438C0 15.4813 0.528125 16 1.18125 16H14.8156C15.4688 16 16 15.4813 16 14.8469V1.15313C16 0.515625 15.4688 0 14.8156 0ZM4.74687 13.6344H2.37188V5.99687H4.74687V13.6344ZM3.55938 4.95625C2.79688 4.95625 2.18125 4.34062 2.18125 3.58125C2.18125 2.82188 2.79688 2.20625 3.55938 2.20625C4.31875 2.20625 4.93437 2.82188 4.93437 3.58125C4.93437 4.3375 4.31875 4.95625 3.55938 4.95625ZM13.6344 13.6344H11.2625V9.92188C11.2625 9.0375 11.2469 7.89687 10.0281 7.89687C8.79375 7.89687 8.60625 8.8625 8.60625 9.85938V13.6344H6.2375V5.99687H8.5125V7.04063H8.54375C8.85938 6.44063 9.63438 5.80625 10.7875 5.80625C13.1906 5.80625 13.6344 7.3875 13.6344 9.44375V13.6344Z" fill="#232536"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_433_405">
                            <rect width="16" height="16" fill="white"/>
                            </clipPath>
                            </defs>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <?php }}?>
        </ul>
      </div>
    </section>
    <section class="companies">
      <div class="container companies__container">
        <p class="companies__text">
          We are <br><span class="companies__upper">Featured&nbsp;in</span>
        </p>
        <ul class="companies__list">
          <li class="companies__item">
            <img src="assets/images/companies-logo-1.svg" alt="">
          </li>
          <li class="companies__item">
            <img src="assets/images/companies-logo-2.svg" alt="">
          </li>
          <li class="companies__item">
            <img src="assets/images/companies-logo-3.svg" alt="">
          </li>
          <li class="companies__item">
            <img src="assets/images/companies-logo-4.svg" alt="">
          </li>
          <li class="companies__item">
            <img src="assets/images/companies-logo-5.svg" alt="">
          </li>
        </ul>
      </div>
    </section>
    <section class="testimonials">
      <div class="container testimonials__container">
        <div class="testimonials__wrap">
          <div class="testimonials__other">
            <h2 class="testimonials__main-title title">TESTIMONIALs</h2>
            <h3 class="testimonials__title">
              What people say about our blog
            </h3>
            <p class="testimonials__other-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
            </p>
          </div>
          <div class="testimonials__content">
            <p class="testimonials__text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <div class="testimonials__wrapper">
              <div class="testimonials__author">
                <img class="testimonials__avatar" src="assets/images/avatar-5.png" alt="">
                <div>
                  <p class="testimonials__name">Jonathan Vallem</p>
                  <p class="testimonials__adress">New york, USA</p>
                </div>
              </div>
              <div class="testimonials__arrows">
                <button class="testimonials__button testimonials__button_left" type="button">
                  <img src="assets/images/left-arrow.svg" alt="">
                </button>
                <button class="testimonials__button testimonials__button_right" type="button">
                  <img src="assets/images/right-arrow.svg" alt="">
                </button>
              </div>
            </div>
          </div>
        </div>
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