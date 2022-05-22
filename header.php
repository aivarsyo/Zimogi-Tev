<!-- Mājaslapu veidoja digitālā aģentūra "Rounda" - rounda.dk -->

<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:image" content="screenshot.png">
    <meta charset="UTF-8">
</head>

<body>

<div class="transparent-overlay"></div>

    <?php
    wp_nav_menu(array(
        'theme_location' => 'my-custom-menu',
        'container_class' => 'mobile-menu'
    ));
    ?>

    <div class="mobile-menu-icon">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22.4 12.7" width="100%" height="100%" style="enable-background:new 0 0 22.4 12.7;" xml:space="preserve">
            <style type="text/css">
                .st0 {
                    fill: none;
                    stroke: black;
                    stroke-width: 2;
                    stroke-miterlimit: 10;
                }
            </style>
            <line class="st0 topLine" x1="0" y1="0.4" x2="22.4" y2="0.4" />
            <line class="st0 middleLine" x1="0" y1="6.7" x2="22.4" y2="6.7" />
            <line class="st0 bottomLine" x1="0" y1="12.4" x2="22.4" y2="12.4" />
        </svg>
    </div>

    <header data-scroll-header>

    <a class="logo" href="<?php echo home_url(); ?>"><img src="<?php the_field("logo", "option") ?>"></a>

        <?php
        wp_nav_menu(array(
            'theme_location' => 'my-custom-menu',
            'container_class' => 'menu'
        ));
        ?>

        <a class="grozs" href="<?php echo wc_get_cart_url() ?>">

            <svg xmlns="http://www.w3.org/2000/svg" width="27.67" height="26.027" viewBox="0 0 27.67 26.027">
                <g id="Group_59" data-name="Group 59" transform="translate(-1849.226 -43.987)">
                    <path id="Path_5" data-name="Path 5" d="M587.91,785.023H591.9a1.144,1.144,0,0,1,1.144,1.144V799.5a.672.672,0,0,0,.672.672h15.493a.671.671,0,0,0,.63-.439l3.679-9.964a.672.672,0,0,0-.639-.9l-12,.161" transform="translate(1261.316 -739.036)" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="4" />
                    <circle id="Ellipse_9" data-name="Ellipse 9" cx="3" cy="3" r="3" transform="translate(1867 64.013)" />
                    <circle id="Ellipse_10" data-name="Ellipse 10" cx="3" cy="3" r="3" transform="translate(1852 64.013)" />
                </g>
            </svg>

            <?php if (ICL_LANGUAGE_CODE == 'lv') :
                echo '<p>UZ GROZU</p>';
            ?>
            <?php elseif (ICL_LANGUAGE_CODE == 'ru') :
                echo '<p>корзина</p>';
            ?>
            <?php elseif (ICL_LANGUAGE_CODE == 'en') :
                echo '<p>VIEW CART</p>';
            ?>
            <?php endif; ?>



            <?php
            global $cartCounter;
            $cartCounter = WC()->cart->get_cart_contents_count();
            if ($cartCounter > 0) {
                echo '<p class="cartCount"><?php echo $cartCounter; ?> </p>';
            } else {
                echo '';
            }

            ?>


        </a>

    </header>