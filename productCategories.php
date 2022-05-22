

<div class="rightSide">

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

    $counter = 0;

    if (!empty($product_categories)) {

        foreach ($product_categories as $key => $category) {

            $counter++;

            echo '
 
                <div class="categorySection" data-category="' . $category->slug . '" id="' . $category->slug . '">

                <div class="categoryDescription">
                    <p> ' . $category->name . '</p>
                    <p> ' . $category->description . '</p>
                </div>
                ';
            get_template_part(
                'showSpecificCategory',
                null,
                $args = array(
                    'post_type' => 'product',
                    'product_cat' => $category->slug,
                    'orderby' => 'popularity'
                )
            );
            echo '</div>';
        }
    }

    ?>





</div>