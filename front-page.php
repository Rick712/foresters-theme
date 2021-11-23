<?php 

    include 'template-parts/header.php';

    $teamCodeFirstTeam = 331374;

    $url='https://data.sportlink.com/programma?client_id=SPlYy7jL2t&teamcode=' . $teamCodeFirstTeam;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,$url);
    $result=curl_exec($ch);
    curl_close($ch);
    $output = json_decode($result, true);
    $aantalrecords = count($output);

    for ($i = 0; $i < $aantalrecords; $i++) {
        if($output[$i]['thuisteamid'] === $teamCodeFirstTeam) {
          $firstmatch = explode('00:00:00.00', $output[$i]["kaledatum"])[0];
          $time = $output[$i]["aanvangstijd"];
          break;
        }
      }

?>

<main class="frontpage page">
    
    <section class="header">
        <article></article>
        <article>
            <h2>Volgende thuiswedstrijd van het eerste</h2>
            <p><?php echo $firstmatch ?></p>
            <p><?php echo $time ?></p>
        </article>
        <article></article>
        <article></article>
    </section>

    <section class="poll container">
        <h1 class="title">Wat moet de snack van de week worden?</h1>
        <div class="answers">
            <div class="answer">Bocado</div>
            <div class="answer">Bonita</div>
            <div class="answer">Delletje jam</div>
            <div class="answer">Kaaskroket</div>
        </div>
        <a class="vote disabled">Stem</a>
    </section>

    <section class="poll container">
        <h1 class="title">Wat moet de snack van de week worden?</h1>
        <div class="answers">
            <div class="answer selected">Bocado</div>
            <div class="answer">Bonita</div>
            <div class="answer">Delletje jam</div>
            <div class="answer">Kaaskroket</div>
        </div>
        <a class="vote" >Stem</a>
    </section>

    <section class="poll variant container">
        <h1 class="title">Wat moet de snack van de week worden?</h1>
        <div class="answers">
            <div class="answer selected">Bocado</div>
            <div class="answer">Bonita</div>
            <div class="answer">Delletje jam</div>
            <div class="answer">Kaaskroket</div>
        </div>
        <a class="vote" >Stem</a>
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
                        <h2><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('text'); ?></p>
                    </div>
                </div>

            <?php
            elseif( get_row_layout() == 'content-with-image' ): ?>

                <div class="container grid content-with-image  <?php echo get_sub_field('image-position') ? 'image-first' : '' ?>">
                    <div class="g-2 g-l-4 text">
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