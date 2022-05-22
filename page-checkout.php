<?php

/*
 Template Name: Checkout
*/

?>

<?php if (is_checkout() && !empty(is_wc_endpoint_url('order-received'))) : ?>
    <?php get_header(); ?>
 <?php else : ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <?php wp_head(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:image" content="screenshot.png">
        <meta charset="UTF-8">
    </head>
    
    <body>
        <section class="checkoutTop">
            <a class="logo" href="<?php echo home_url(); ?>"><img src="<?php the_field("logo", "option") ?>"></a>
            <h1><?php the_field("checkout_text", "option") ?></h1>
            <a class="secure-checkout" href="https://stripe.com/" target="_blank"><img src="<?php the_field("secure_checkout", "option") ?>"></a>
        </section>
        <?php endif; ?>

<?php echo do_shortcode("[woocommerce_checkout]"); ?>

<?php wp_footer(); ?>
</body>

</html>