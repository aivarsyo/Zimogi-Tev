<?php

/*
 Template Name: About
*/

get_header();

?>

<main class="about-content">

    <div class="about-pic">
        <img src="<?php the_field("colop_bilde") ?>">
    </div>

    <div class="about-text">
        <?php the_content(); ?>
    </div>

</main>

<?php

get_footer();
