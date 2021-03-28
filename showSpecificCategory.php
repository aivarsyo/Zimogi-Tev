<div class="products">
    <?php
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();
        global $product; ?>

        <div class="oneProduct">

            <a class="product__info" href="<?php echo get_permalink($loop->post->ID) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                <p class="product_title"><?php the_title(); ?></p>

                <?php echo apply_filters('woocommerce_short_description', $product->post->post_excerpt) ?>

                <?php woocommerce_show_product_sale_flash($post, $product); ?>

                <div class="imageContainer">

                    <?php if (has_post_thumbnail($loop->post->ID)) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                    else echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder"/>'; ?>

                    <div class="view-product-sticker"><?php woocommerce_template_loop_add_to_cart($loop->post, $product); ?> </div>

                </div>

                <div class="price_border">

                    <p class="price"><?php echo $product->get_price_html(); ?></p>

                </div>

            </a>

        </div>

    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
</div>