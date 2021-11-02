<?php include 'template-parts/header.php' ?>

<main class="frontpage page">

    <section class="header">
        <article></article>
        <article></article>
        <article></article>
        <article></article>
    </section>

    <?php

    include 'template-parts/match-summary.php';

    if( have_rows('content') ): ?>
        <?php 
        while( have_rows('content') ): the_row();
            if( get_row_layout() == 'text' ): ?>

                <div class="container grid">
                    <div class="content wysiwyg g-4 g-l-8">
                        <?php the_sub_field('text'); ?>
                    </div>
                </div>

            <?php 
            elseif( get_row_layout() == 'button' ): ?>

                <div class="container">
                    <a class="button" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
                </div>

            <?php 
            elseif( get_row_layout() == 'image' ):
                if($group = get_sub_field('image_information')): ?>

                    <?php if($group['link']): ?>
                        <a target="_blank" href="<?php echo $group['url']; ?>">
                    <?php endif; ?>

                    <img class="image <?php if($group['full_width']) { echo 'fullwidth'; };?>" alt="<?php echo $group['alt'];?>" src="<?php the_sub_field('image'); ?>" />

                    <?php if($group['link']): ?>
                        </a>
                    <?php endif;

                endif;
            elseif( get_row_layout() == 'banner' ): ?>

                <div class="container container__full-width banner" style="background-color: <?php the_sub_field('background_color') ?>">
                    <div class="container" style="color: <?php the_sub_field('text_color'); ?>">
                        <p><?php the_sub_field('title'); ?></p>
                    </div>
                </div>

            <?php
            elseif( get_row_layout() == 'content-with-image' ): ?>

                <div class="container grid content-with-image  <?php echo get_sub_field('image-position') ? 'image-first' : '' ?>">
                    <div class="g-2 g-l-4">
                        <h2 class="title"><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('text'); ?></p>
                    </div>
                    <div class="g-2 g-l-4 image">
                        <img src="<?php the_sub_field('image'); ?> "/>
                    </div>
                </div>

            <?php 
            endif;
        endwhile;
    endif; ?>
</main>

<?php include 'template-parts/footer.php' ?>