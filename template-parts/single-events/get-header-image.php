
<?php


//get the ids of artists who are taking place in this concert
$artists_IDs = ig_gav_get_this_event_artists_IDs();
//get the ids of photos from artists post_artists_artists_photo field
$artists_photos_IDs =  ig_gav_get_artist_main_photo_by_ID($artists_IDs);



if (!empty($artists_photos_IDs) && count($artists_photos_IDs) !== 1) : ?>






    <div class="single-artist__photo">





        <div class="swiper-container swiper-container--full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">


                <?php
                $this_post_featured_image_ID = get_field('post_events_concert_image');


                if (!empty($this_post_featured_image_ID) && !in_array($this_post_featured_image_ID, $artists_photos_IDs)) : ?>
                    <div class="swiper-slide">

                        <?php ig_gav_get_image_depending_on_aspect_ratio($this_post_featured_image_ID) ?>

                    </div>
                <?php endif; ?>

                <?php foreach ($artists_photos_IDs as $photoID) : ?>

                    <!-- Slides -->
                    <div class="swiper-slide">

                        <?php ig_gav_get_image_depending_on_aspect_ratio($photoID) ?>

                    </div>

                <?php endforeach; ?>



            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
        </div>





    </div>

<?php elseif(!empty(get_field('post_events_concert_image'))) : ?>
<div class="single-artist__photo">

<?php
                $this_post_featured_image_ID = get_field('post_events_concert_image');

ig_gav_get_image_depending_on_aspect_ratio($this_post_featured_image_ID) ?>

</div>

<?php else : ?>
    <div class="single-artist__photo">

<?php
                $random_image_ID = ig_gav_random_image_ID();

ig_gav_get_image_depending_on_aspect_ratio($random_image_ID) ?>

</div>
<?php endif; ?>



