<?php

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 9,
    'orderby' => 'date',
    'order' => 'DESC'
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        ?>
        <div class="post">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
            <p><?php the_date(); ?></p>
            <a href="<?php the_permalink(); ?>">Ler agora</a>
        </div>
        <?php
    }
    wp_reset_postdata();
} else {
    echo 'Nenhuma postagem encontrada.';
}

// Pra carregar mais postagens
?>
<script>
    document.getElementById('carregar').addEventListener('click', function() {
         });
</script>