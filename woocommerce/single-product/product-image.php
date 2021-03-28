<?php
global $product;
$attachment_ids = $product->get_gallery_attachment_ids();
$image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID), 'single-post-thumbnail');
$inc_numb = 0;
?>



<div class="glide glide-image">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides glide__slides-image">
            <li class="glide__slide glide__slide-image">
                <div><img src="<?php echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>"></div>
            </li>
            <?php
            foreach ($attachment_ids as $attachment_id) : ?>
                <li class="glide__slide glide__slide-image">
                    <div> <?php echo wp_get_attachment_image($attachment_id, 'full'); ?> </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="glide__bullets glide__bullets-image" data-glide-el="controls[nav]">
        <button class="glide__bullet glide__bullet-image" data-glide-dir="=<?php echo $inc_numb++; ?>">
            <img src="<?php echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
        </button>
        <?php foreach ($attachment_ids as $attachment_id) : ?>
            <button class="glide__bullet glide__bullet-image" data-glide-dir="=<?php echo $inc_numb++; ?>">
                <?php echo wp_get_attachment_image($attachment_id, 'shop_thumbnail'); ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left glide__arrow-image" data-glide-dir="<">
            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                <path d="M20 .755l-14.374 11.245 14.374 11.219-.619.781-15.381-12 15.391-12 .609.755z" />
            </svg>
        </button>
        <button class="glide__arrow glide__arrow--right glide__arrow-image" data-glide-dir=">">
            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                <path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z" />
            </svg>
        </button>
    </div>
</div>






<!--     //echo Image instead of URL
  echo wp_get_attachment_image($attachment_id, 'full');
  echo wp_get_attachment_image($attachment_id, 'medium');
  echo wp_get_attachment_image($attachment_id, 'thumbnail');
  echo wp_get_attachment_image($attachment_id, 'shop_thumbnail');
  echo wp_get_attachment_image($attachment_id, 'shop_catalog');
  echo wp_get_attachment_image($attachment_id, 'shop_single'); -->