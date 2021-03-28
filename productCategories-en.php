<?php

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


<div class="rightSide">

    <div class="categorySection" id="apalie-zimogi-en">

        <div class="categoryDescription">
            <p><?php the_field("nosaukums_1", $page_number) ?></p>
            <p><?php the_field("apraksts_1", $page_number) ?></p>
        </div>

        <?php
        get_template_part(
            'showSpecificCategory',
            null,
            $args = array(
                'post_type' => 'product',
                'product_cat' => 'apalie-zimogi-en',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>

    <div class="categorySection" id="taisnstura-zimogi-en">

        <div class="categoryDescription">
            <p><?php the_field("nosaukums_2", $page_number) ?></p>
            <p><?php the_field("apraksts_2", $page_number) ?></p>
        </div>

        <?php
        get_template_part(
            'showSpecificCategory',
            null,
            $args = array(
                'post_type' => 'product',
                'product_cat' => 'taisnstura-zimogi-en',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>

    <div class="categorySection" id="ovalie-zimogi-en">

        <div class="categoryDescription">
            <p><?php the_field("nosaukums_3", $page_number) ?></p>
            <p><?php the_field("apraksts_3", $page_number) ?></p>
        </div>

        <?php
        get_template_part(
            'showSpecificCategory',
            null,
            $args = array(
                'post_type' => 'product',
                'product_cat' => 'ovalie-zimogi-en',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>

    <div class="categorySection" id="rekvizitu-zimogi-en">

        <div class="categoryDescription">
            <p><?php the_field("nosaukums_4", $page_number) ?></p>
            <p><?php the_field("apraksts_4", $page_number) ?></p>
        </div>

        <?php
        get_template_part(
            'showSpecificCategory',
            null,
            $args = array(
                'post_type' => 'product',
                'product_cat' => 'rekvizitu-zimogi-en',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>

    <div class="categorySection" id="datumu-un-numuru-zimogi-en">

        <div class="categoryDescription">
            <p><?php the_field("nosaukums_5", $page_number) ?></p>
            <p><?php the_field("apraksts_5", $page_number) ?></p>
        </div>

        <?php
        get_template_part(
            'showSpecificCategory',
            null,
            $args = array(
                'post_type' => 'product',
                'product_cat' => 'datumu-un-numuru-zimogi-en',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>



</div>