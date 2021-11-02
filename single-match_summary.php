<?php 
    include 'template-parts/header.php';
    $author = get_field('author');
    $highlighted = get_field('highlighted');
    $team = get_field('team');
?>

<main class="page match">

    <div class="header"  style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
        <div class="meta container">
            <?php if($highlighted) echo '<div class="label">Uitgelicht</div>'?>
            <?php if($team) echo '<div class="label team">' . $team .'</div>'?>
        </div>

    </div>

    <div class="container data">
        
        <h1><?php the_title(); ?></h1>
        <?php if($author) echo '<h2 class="author">' . $author .'</h2>' ?>
        <p class="date"><?php echo get_the_date() ?></p>
    </div>

    <div class="container grid">
        <div class="g-l-8 g-4 content">
            <p><?php the_content(); ?></p>
        </div>
        
    </div>
</main>

<?php include 'template-parts/footer.php' ?>