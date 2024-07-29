
<?php get_header();?>

<section class="contact">
  <div class="container contact__container">
    <div class="contact__wrapper">
      <h1 class="contact__main-title title">Contact us</h1>
      <h2 class="contact__title">Let’s Start a Conversation</h2>
      <p class="contact__text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
      </p>
    </div>
    <div class="contact-info">
      <div class="contact-info__wrapper">
        <h3 class="contact-info__title line">Working hours</h3>
        <p class="contact-info__week">
          Monday To Friday
        </p>
        <p class="contact-info__time">
          9:00 AM to 8:00 PM 
        </p>
        <p class="contact-info__support">
          Our Support Team is available 24/7
        </p>
      </div>
      <div class="contact-info__wrapper">
        <h3 class="contact-info__title line">Contact Us</h3>
        <a class="contact-info__tel" href="tel:020 7993 2905">020 7993 2905</a>
        <a class="contact-info__mail" href="mailto:hello@finsweet.com">hello@finsweet.com</a>
      </div>
    </div>
    <div class="contact-form">
      <?php echo do_shortcode( '[contact-form-7 id="ae75fbe" title="Контактная форма"]'); ?>
    </div>
  </div>
</section>

<?php get_footer();?>