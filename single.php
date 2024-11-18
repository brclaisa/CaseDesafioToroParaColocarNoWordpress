<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="blog-container">
        <h1 class="category"><?php the_category(); ?></h1>
        <h1><?php the_title(); ?></h1>
        <div class="meta">
            <span>Por <?php the_author(); ?></span>
            <span>Postado em <?php the_modified_date(); ?></span>
        </div>
        <div class="content">
            <?php the_content(); ?>
        </div>
        <aside class="sidebar">
            <h2>Leia Também</h2>
            <?php

            $category = get_the_category(); // Busca postagem da mesma categoria
            $category_id = $category[0]->term_id;
            $args = array(
                'category' => $category_id,
                'posts_per_page' => 5,
                'post__not_in' => array(get_the_ID())
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <span class="arrow">➜</span>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </aside>
        <?php
        
        
        // CPT
        $investimentos = get_posts( array(
            'post_type' => 'investimento'
        ) );
        if ( $investimentos ) {
            foreach ( $investimentos as $investimento ) {
                echo $investimento->post_title;
                // ... outros campos do CPT ...
            }
        }
        ?>
    </div>
    <?php wp_footer(); ?>
</body>
</html>