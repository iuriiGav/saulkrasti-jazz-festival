<?php 
function ig_saulkrasti_jazz_image_from_field($img_field, $img_size, $page_ID) {
    echo  esc_url(wp_get_attachment_image_src(get_field($img_field, $page_ID), $img_size)[0]);

}
?>