<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php  bloginfo( 'name' ); wp_title('|', true, 'left'); ?></title>

	<?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

  <div class="content-area">

    <header class="row header">
    <h1><a class='current' href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
  <!--  <a href="" class="nav-toggle"><span></span>Menu</a> -->
      <nav class="header-menu">

    <?php

    	$defaults = array(

    		'container' => false,
    		'theme_location' => 'primary-menu',
    		'menu_class' => 'menu'
    	);

    	wp_nav_menu( $defaults );

    ?>
<!--    
    <ul class="menu">
      <li class="current parent"><a class='current' href="index.html">Portfolio</a>
        <ul class="sub-menu">
          <li><a href="item.html">Portfolio Item</a></li>
          <li><a href="item.html">Portfolio Item</a></li>
          <li><a href="item.html">Portfolio Item</a></li>
          <li><a href="item.html">Portfolio Item</a></li>
        </ul>
      </li>
      <li class="parent"><a href="blog.html">Blog</a>
        <ul class="sub-menu">
          <li><a href="single-post.html">Single Post</a></li>
          <li><a href="author.html">Author Page</a></li>
        </ul>
      </li>
      <li><a href="about.html">Quien Soy</a></li>
      <li><a href="contact.html">Contacto</a></li>
    </ul>
-->
  </nav>
</header>