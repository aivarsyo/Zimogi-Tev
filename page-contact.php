<?php

/*
 Template Name: Contact
*/

get_header();

?>

<main class="contact-content">

    <div class="navigation">
        <iframe style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJC5wFCfHP7kYREch0GL8MkW8&key=AIzaSyAUG2eQIFU6YI6llozOKND3VPi6oEwdUGg">
        </iframe>
    </div>

    <div class="contact-text">
        <div><?php the_content(); ?></div>
        <div class="end-text"><?php the_field("end_text") ?></div>
    </div>

    <div class="end-text-mobile"><?php the_field("end_text") ?></div>

</main>

<?php

get_footer();
