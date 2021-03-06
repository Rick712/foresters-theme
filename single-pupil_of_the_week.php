<?php include 'template-parts/header.php' ?>

<main class="page pvdw">
    <div class="container">
        <h1>Pupil van de week: <?php the_title(); ?></h1>
    </div>
    <div class="container grid">
        <div class="g-l-4 g-2 padding--right">
            <img src=<?php echo get_the_post_thumbnail_url(); ?> />
        </div>
        <div class="g-l-4 g-2 padding">
            <p><?php the_content(); ?></p>
        </div>
        
    </div>
</main>

<?php include 'template-parts/footer.php' ?>