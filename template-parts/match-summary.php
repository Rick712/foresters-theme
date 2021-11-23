<?php 

    $args = array(
        'post_type' => 'match_summary',
        'orderby' => 'date',
        'posts_per_page' => 5,
    );

    $query = new WP_Query($args);

    if($query->have_posts()) { ?>

        <section class="matches container">

            <h1 class="title">Wedstrijdverslagen</h1>

            <?php while($query->have_posts()) {
                $query->the_post(); ?>

                <?php if(get_field('highlighted')) { ?>

                    <article class="highlighted">
                        <a href="<?php echo get_permalink() ?>"></a>
                            <img src=<?php echo get_the_post_thumbnail_url(); ?> >
                            <div class="content">
                                <div class="labels">
                                    <div class="label">Uitgelicht</div>
                                    <?php if(get_field('team')) echo '<div class="label team">' . get_field('team') .'</div>'?>
                                </div>
                                <h1><?php the_title(); ?></h1>
                            </div> 
                    </article>

                <?php } else {?>

                    <article>
                        <a href="<?php echo get_permalink() ?>"></a>
                        <div class="image">
                            <span><img src=<?php echo get_the_post_thumbnail_url(); ?> ></span>
                            <div>
                                <?php if(get_field('team')) echo '<div class="label team">' . get_field('team') .'</div>'?>
                            </div>
                        </div>
                        <div class="content">
                            <h1><?php the_title(); ?></h1>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </article>

                <?php } ?>

                
            <?php } ?>

        </section>
    <?php }
    wp_reset_postdata();