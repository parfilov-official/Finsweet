
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head();?>
</head>
<body>
<header class="header">
  <div class="container header__container">
    <?php if(has_custom_logo()){
      echo get_custom_logo();
    }?>
    <?php 
      wp_nav_menu( [
        'theme_location'  => 'header',
        'menu'            => '',
        'container'       => 'nav',
        'container_class' => 'nav header__nav',
        'menu_class'      => 'nav__list',
        'echo'            => true,
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      ] );
    ?>
    <a class="header__btn btn" href="#footer">Subscribe</a>
  </div>
</header>
<main>