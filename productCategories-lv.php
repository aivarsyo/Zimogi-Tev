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

    <div class="categorySection" id="apalie-zimogi">

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
                'product_cat' => 'apalie-zimogi',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>

    <div class="categorySection" id="taisnstura-zimogi">

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
                'product_cat' => 'taisnstura-zimogi',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>

    <div class="categorySection" id="ovalie-zimogi">

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
                'product_cat' => 'ovalie-zimogi',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>

    <div class="categorySection" id="rekvizitu-zimogi">

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
                'product_cat' => 'rekvizitu-zimogi',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>

    <div class="categorySection" id="datumu-un-numuru-zimogi">

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
                'product_cat' => 'datumu-un-numuru-zimogi',
                'orderby' => 'popularity'
            )
        );
        ?>
    </div>



</div>