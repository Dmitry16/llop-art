<?php

$num_posts = ( is_front_page() ) ? -1 : 4;

  $args = array(
    'post_type' => 'pieza',
    'posts_per_page' => $num_posts,
    'orderby'=> 'name',
    'order'=> 'ASC'
    );
  $query = new WP_Query( $args );

?>

  <?php if( $query->have_posts()) : while( $query->have_posts()) : $query->the_post(); ?>

      <div class="pieza">

        <p class="pieza-name">
          <?php the_field("nombre_pieza"); ?>
        </p>

        <div class="rotate">

          <div class="front">
              <a href="#pieza-single" class="pieza-image">
                  <img src=<?php the_field("imagen_pieza"); ?>>
              </a>
          </div>

          <div class="pieza-col2">
            <p class="pieza-descr">
              <?php the_field("descripcion_pieza"); ?>
            </p>
            <button class="boton-pieza">Más Información</button>
          </div>

        </div>
      </div>
  <?php endwhile; endif; wp_reset_postdata(); ?>


