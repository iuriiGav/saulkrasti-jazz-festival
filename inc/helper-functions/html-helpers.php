<?php 
function ig_saulkrasti_jazz_image_from_field($img_field, $page_ID) {
    echo esc_url(wp_get_attachment_image_src(get_field($img_field, $page_ID), 'full')[0]);

}
function ig_saulkrasti_jazz_image_from_field_custom_size($img_field, $size, $page_ID = null) {
    echo esc_url(wp_get_attachment_image_src(get_field($img_field, $page_ID), $size)[0]);

}
function ig_saulkrasti_jazz_linear_gradient_dark() {
    echo 'linear-gradient(180deg, rgba(19, 19, 19, 0.9) 0%, rgba(19, 19, 19, 0.9) 100%),';

}

function ig_saulkrasti_jazz_festival_start_date() { 
   return get_field('options_festival_start_date', 'options');

}

function ig_saulkrasti_jazz_festival_end_date() { 
   return get_field('options_festival_end_date', 'options');

}




function ig_saulkrasti_jazz_get_dates_of_festival($start, $end, $format = 'Y-m-d') { 
      
    $array = array(); 
    $interval = new DateInterval('P1D'); 
  
    $realEnd = new DateTime($end); 
    $realEnd->add($interval); 
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
  
    foreach($period as $date) {                  
        $array[] = $date->format($format);  
    } 
  
    return $array; 
} 

function ig_saulkrasti_jazz_split_date_to_arr($field_name) {
    
    return explode(' ', esc_html__(get_field($field_name), 'saulkrasti-jazz-festival') );
}

function ig_saulkrasti_jazz_get_radio_value($field, $page_ID = null) {
    $field = get_field_object($field, $page_ID);
    return $field['value'];
}


?>