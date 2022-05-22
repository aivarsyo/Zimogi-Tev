<?php

/*
 Template Name: Front page
*/

get_header();

global $page_number;

?>

<?php if (ICL_LANGUAGE_CODE == 'lv') :
    $page_number = 12;
?>
<?php elseif (ICL_LANGUAGE_CODE == 'ru') :
    $page_number = 161;
?>
<?php elseif (ICL_LANGUAGE_CODE == 'en') :
    $page_number = 157;
?>
<?php endif; ?>

<div class="advertisement">
    <!-- <section style="background-image: url(<?php the_field("header_pic", $page_number) ?>)"></section> -->
    <video src="<?php the_field("header_video", $page_number) ?>" muted autoplay playsinline></video>
</div>

<div class="filter-icon">
    <svg version="1.1" id="filter-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 180 180" style="enable-background:new 0 0 180 180;" xml:space="preserve">
        <style type="text/css">
            .st0 {
                fill: #FFFFFF;
            }
        </style>
        <g>
            <path d="M8,34c-2.48,0-4.5-1.79-4.5-4s2.02-4,4.5-4h163c2.48,0,4.5,1.79,4.5,4s-2.02,4-4.5,4H8z" />
            <path d="M171,26.5c2.21,0,4,1.57,4,3.5s-1.79,3.5-4,3.5H8c-2.21,0-4-1.57-4-3.5s1.79-3.5,4-3.5H171 M171,25.5H8
		c-2.75,0-5,2.03-5,4.5s2.25,4.5,5,4.5h163c2.75,0,5-2.03,5-4.5S173.75,25.5,171,25.5L171,25.5z" />
        </g>
        <g>
            <path d="M9,154c-2.48,0-4.5-1.79-4.5-4s2.02-4,4.5-4h163c2.48,0,4.5,1.79,4.5,4s-2.02,4-4.5,4H9z" />
            <path d="M172,146.5c2.21,0,4,1.57,4,3.5s-1.79,3.5-4,3.5H9c-2.21,0-4-1.57-4-3.5s1.79-3.5,4-3.5H172 M172,145.5H9
		c-2.75,0-5,2.02-5,4.5s2.25,4.5,5,4.5h163c2.75,0,5-2.02,5-4.5S174.75,145.5,172,145.5L172,145.5z" />
        </g>
        <g>
            <path d="M8,94c-2.48,0-4.5-1.79-4.5-4s2.02-4,4.5-4h163c2.48,0,4.5,1.79,4.5,4s-2.02,4-4.5,4H8z" />
            <path d="M171,86.5c2.21,0,4,1.57,4,3.5s-1.79,3.5-4,3.5H8c-2.21,0-4-1.57-4-3.5s1.79-3.5,4-3.5H171 M171,85.5H8
		c-2.75,0-5,2.02-5,4.5s2.25,4.5,5,4.5h163c2.75,0,5-2.02,5-4.5S173.75,85.5,171,85.5L171,85.5z" />
        </g>
        <g class="circleUp">
            <circle class="st0" cx="40.5" cy="30" r="12" />
            <path d="M40.5,21.5c4.69,0,8.5,3.81,8.5,8.5s-3.81,8.5-8.5,8.5S32,34.69,32,30S35.81,21.5,40.5,21.5 M40.5,14.5
		C31.94,14.5,25,21.44,25,30s6.94,15.5,15.5,15.5S56,38.56,56,30S49.06,14.5,40.5,14.5L40.5,14.5z" />
        </g>
        <g class="circleMiddle">
            <path class="st0" d="M135.5,102c-6.62,0-12-5.38-12-12s5.38-12,12-12s12,5.38,12,12S142.12,102,135.5,102z" />
            <path d="M135.5,81.5c4.69,0,8.5,3.81,8.5,8.5s-3.81,8.5-8.5,8.5S127,94.69,127,90S130.81,81.5,135.5,81.5 M135.5,74.5
		c-8.56,0-15.5,6.94-15.5,15.5s6.94,15.5,15.5,15.5S151,98.56,151,90S144.06,74.5,135.5,74.5L135.5,74.5z" />
        </g>
        <g class="circleDown">
            <path class="st0" d="M83.5,162c-6.62,0-12-5.38-12-12s5.38-12,12-12s12,5.38,12,12S90.12,162,83.5,162z" />
            <path d="M83.5,141.5c4.69,0,8.5,3.81,8.5,8.5s-3.81,8.5-8.5,8.5S75,154.69,75,150S78.81,141.5,83.5,141.5 M83.5,134.5
		c-8.56,0-15.5,6.94-15.5,15.5s6.94,15.5,15.5,15.5S99,158.56,99,150S92.06,134.5,83.5,134.5L83.5,134.5z" />
        </g>
    </svg>

</div>

<main class="productPage">

    <div class="leftSide">

        <?php

        $orderby = 'name';
        $order = 'asc';
        $hide_empty = true;
        $cat_args = array(
            /* 'orderby'    => $orderby,
            'order'      => $order, */
            'hide_empty' => $hide_empty,
        );

        $product_categories = get_terms('product_cat', $cat_args);

        if (!empty($product_categories)) {
            echo '
 
<ul class="categories">';
            foreach ($product_categories as $key => $category) {
                echo '
 
<li>';
                echo '<a data-scroll data-category="' . $category->slug . '" href="#' . $category->slug . '" >';
                echo $category->name;
                echo '</a>';
                echo '</li>';
            }
            echo '</ul>
 
 
';
        }

        ?>


    </div>


    <?php get_template_part('productCategories'); ?>


</main>

<?php

get_footer();

?>