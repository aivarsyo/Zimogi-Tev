<?php

/*
 Template Name: Delivery
*/

get_header();

?>

<main class="delivery-content">

    <div class="delivery-image"><img src="<?php the_field("illustration") ?>"></div>

    <section class="delivery-text">
        <div class="delivery-text-one"><?php the_content(); ?></div>
        <div class="delivery-text-two"><?php the_field("content") ?></div>
    </section>

    <div class="delivery-text-two-mobile"><?php the_field("content") ?></div>

</main>

<?php

get_footer();
