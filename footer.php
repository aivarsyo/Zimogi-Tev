<footer>

    <div style="background-image: url(<?php the_field("omniva", "option") ?>)" class="advertisement2"></div>
    <div class="reviews">
        <p class="reviews__title"><?php the_field("customers_title", "option") ?></p>
        <div class="reviews__box glide glide-footer">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides glide__slides-footer">
                    <li class="glide__slide glide__slide-footer"><?php the_field("atsauksme_1", "option") ?></li>
                    <li class="glide__slide glide__slide-footer"><?php the_field("atsauksme_2", "option") ?></li>
                    <li class="glide__slide glide__slide-footer"><?php the_field("atsauksme_3", "option") ?></li>
                </ul>
            </div>
            <div class="glide__bullets glide__bullets-footer" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1"></button>
                <button class="glide__bullet" data-glide-dir="=2"></button>
            </div>
        </div>
    </div>

    <div class="map">
        <div class="map__left">
            <?php the_field("kompanijas_info", "option") ?>
            <?php do_action('wpml_add_language_selector');?>
        </div>
        <div class="map__right">
            <p><?php the_field("maps_title", "option") ?></p>
            <iframe style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJC5wFCfHP7kYREch0GL8MkW8&key=AIzaSyAUG2eQIFU6YI6llozOKND3VPi6oEwdUGg">
            </iframe>
        </div>
        <p class="map__top">&#8593;Uz augšu</p>
    </div>

</footer>

<?php wp_footer(); ?>
</body>

</html>