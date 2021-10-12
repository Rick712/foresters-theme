<?php include 'template-parts/header.php' ?>

<main class="page">

    <?php 

    $hero = get_field('header');
    if($hero): ?>

        <section class="hero" style="background-image: url('<?php echo $hero['image'] ?>');">
            <div class="background">
                <div class="content grid container">
                    
                    <?php 
                    $hero_text = $hero['text']; 
                    if($hero_text): ?>

                        <div class="g-4 g-l-8">
                            <h1 class="title"><?php echo $hero_text['title'] ?></h1>
                            <p class="text"><?php echo $hero_text['sub_title'] ?></p>
                            <?php 
                                if($hero_text['call_to_action']) { ?>
                                    <a class="button" href="<?php echo $hero_text['call_to_action_url']; ?>"> <?php echo $hero_text['call_to_action_tekst']; ?></a>
                                <?php }
                            ?>
                        </div>

                    <?php endif ?>
                </div>
            </div>
            <div class="arrow"><?php include 'template-parts/icons/arrow.svg' ?></div>
        </section>

    <?php 
    endif;

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
            endif;
        endwhile;
    endif; ?>
</main>

<?php include 'template-parts/footer.php' ?>