<?php

function getStyle()
{
    wp_enqueue_script('main-js', get_theme_file_uri('./dist/js/main.1.0.0.js'), NULL, '1.0', true);
    wp_enqueue_style('theme_main_styles', get_stylesheet_uri('./style.css'));
    wp_enqueue_style('avenir_book', get_stylesheet_directory_uri() . '/fonts/avenir_book.css');
    wp_enqueue_style('avenir_heavy', get_stylesheet_directory_uri() . '/fonts/avenir_heavy.css');
    wp_enqueue_style('nunito', '//fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap');
}

add_action('wp_enqueue_scripts', 'getStyle');

function features()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'features');

function comicpress_copyright()
{
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if ($copyright_dates) {
        $copyright = "&copy; " . $copyright_dates[0]->firstdate;
        if ($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
            $copyright .= '-' . $copyright_dates[0]->lastdate;
        }
        $output = $copyright;
    }
    return $output;
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Papildus iestatījumi',
        'menu_title'    => 'Papildus iestatījumi',
        'menu_slug'     => 'zimogi-tev-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Kājene',
        'menu_title'    => 'Kājene',
        'parent_slug'    => 'zimogi-tev-general-settings',
    ));
}

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

//add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function cw_woo_attribute()
{
    global $product;
    $attributes = $product->get_attributes();
    if (!$attributes) {
        return;
    }
    $display_result = '';
    foreach ($attributes as $attribute) {
        if ($attribute->get_variation()) {
            continue;
        }
        $name = $attribute->get_name();
        if ($attribute->is_taxonomy()) {
            $terms = wp_get_post_terms($product->get_id(), $name, 'all');
            $cwtax = $terms[0]->taxonomy;
            $cw_object_taxonomy = get_taxonomy($cwtax);
            if (isset($cw_object_taxonomy->labels->singular_name)) {
                $tax_label = $cw_object_taxonomy->labels->singular_name;
            } elseif (isset($cw_object_taxonomy->label)) {
                $tax_label = $cw_object_taxonomy->label;
                if (0 === strpos($tax_label, 'Product ')) {
                    $tax_label = substr($tax_label, 8);
                }
            }
            $display_result .= $tax_label . ': ';
            $tax_terms = array();
            foreach ($terms as $term) {
                $single_term = esc_html($term->name);
                array_push($tax_terms, $single_term);
            }
            $display_result .= implode(', ', $tax_terms) .  '<br />';
        } else {
            $display_result .= $name . ': ';
            $display_result .= esc_html(implode(', ', $attribute->get_options())) . '<br />';
        }
    }
    echo $display_result;
}
add_action('woocommerce_single_product_summary', 'cw_woo_attribute', 25);

function wpb_custom_new_menu()
{
    register_nav_menu('my-custom-menu', __('My Custom Menu'));
}
add_action('init', 'wpb_custom_new_menu');


/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

?>
    <p class="cartCount"><?php echo WC()->cart->get_cart_contents_count(); ?> </p>
<?php
    $fragments['.cartCount'] = ob_get_clean();
    return $fragments;
}

/* show nospieduma izmērs on single product page */

add_action('woocommerce_before_add_to_cart_form', 'show_nospieduma_izmers');

function show_nospieduma_izmers()
{
?>
    <?php if (get_field("nospieduma_izmers")) : ?>
        <span class="nospiedums">
            <?php if (ICL_LANGUAGE_CODE == 'lv') :
                echo 'Nospieduma izmērs:';
            ?>
            <?php elseif (ICL_LANGUAGE_CODE == 'ru') :
                echo 'Размер отпечатка:';
            ?>
            <?php elseif (ICL_LANGUAGE_CODE == 'en') :
                echo 'Imprint size:';
            ?>
            <?php endif; ?>
            <?php the_field("nospieduma_izmers") ?></span>
    <?php endif; ?>

    <?php if (get_field("maks_liniju_skaits")) : ?>
        <span class="liniju-skaits">
            <?php if (ICL_LANGUAGE_CODE == 'lv') :
                echo 'Maks. teksta līniju skaits:';
            ?>
            <?php elseif (ICL_LANGUAGE_CODE == 'ru') :
                echo 'Макс. количество строк текста:';
            ?>
            <?php elseif (ICL_LANGUAGE_CODE == 'en') :
                echo 'Max. lines of text:';
            ?>
            <?php endif; ?>
            <?php the_field("maks_liniju_skaits") ?></span>
    <?php endif; ?>
<?php
}

//add_filter( 'wp_lazy_loading_enabled', '__return_false' );
