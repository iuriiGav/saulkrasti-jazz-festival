<?php
function ig_saulkrasti_jazz_image_from_field($img_field, $page_ID)
{
  echo esc_url(wp_get_attachment_image_src(get_field($img_field, $page_ID), 'full')[0]);
}
function ig_saulkrasti_jazz_image_from_field_custom_size($img_field, $size, $page_ID = null)
{
  echo esc_url(wp_get_attachment_image_src(get_field($img_field, $page_ID), $size)[0]);
}
function ig_saulkrasti_jazz_linear_gradient_dark()
{
  echo 'linear-gradient(180deg, rgba(19, 19, 19, 0.9) 0%, rgba(19, 19, 19, 0.9) 80%),';
}

function ig_saulkrasti_jazz_festival_start_date()
{
  return get_field('options_festival_start_date', 'options');
}

function ig_saulkrasti_jazz_festival_end_date()
{
  return get_field('options_festival_end_date', 'options');
}




function ig_saulkrasti_jazz_get_dates_of_festival($start, $end, $format = 'Y-m-d')
{

  $array = array();
  $interval = new DateInterval('P1D');

  $realEnd = new DateTime($end);
  $realEnd->add($interval);
  $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

  foreach ($period as $date) {
    $array[] = $date->format($format);
  }

  return $array;
}

function ig_saulkrasti_jazz_split_date_to_arr($field_name)
{

  return explode(' ', esc_html__(get_field($field_name), 'saulkrasti-jazz-festival'));
}

function ig_saulkrasti_jazz_get_radio_value($field, $page_ID = null)
{
  $field = get_field_object($field, $page_ID);
  return $field['value'];
}

function ig_saulkrasti_jazz_get_page_url($template_name)
{
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name . '.php',
        'compare' => '='
      ]
    ]
  ]);
  if (!empty($pages)) {
    foreach ($pages as $pages__value) {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}

function ig_saulkrasti_jazz_get_id_of_page_by_template($template_name)
{
  $args = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => $template_name . '.php',
  ];
  return get_posts($args);
}


function ig_gav_get_global_text($field)
{
  $btns_page_ID = ig_saulkrasti_jazz_get_id_of_page_by_template('page-buttons');
  return esc_html__(get_field($field, $btns_page_ID[0]), 'saulkrasti-jazz-festival');
}
function ig_gav_get_global_text_wp_kses_filter($field)
{
  $btns_page_ID = ig_saulkrasti_jazz_get_id_of_page_by_template('page-buttons');
  return wp_kses_post(wpautop(get_field($field, $btns_page_ID[0]), 'saulkrasti-jazz-festival'));
}

function ig_gav_get_medium_image($image)
{
  echo esc_url(wp_get_attachment_image_src($image, 'ig-medium')[0]);
}
function ig_gav_get_custom_size_image($image, $size)
{
  echo esc_url(wp_get_attachment_image_src($image, $size)[0]);
}


function ig_gav_get_this_event_artists_IDs()
{

  $this_events_artist_ID_arr = get_field('post_events_artists');
  $artists_IDs = array();
  if (is_array($this_events_artist_ID_arr)) :
    foreach ($this_events_artist_ID_arr as $artistID) :
      if ($artistID) :

        array_push($artists_IDs, $artistID);

      endif;
    endforeach;
  endif;

  return $artists_IDs;
}

function ig_gav_get_artist_main_photo_by_ID($artists_IDs)
{
  $artists_photos_IDs = array();

  foreach ($artists_IDs as $artist_ID) :
    $image_ID = get_field('post_artists_artists_photo', $artist_ID);
    if (!empty($image_ID)) :

      array_push($artists_photos_IDs, $image_ID);

    endif;
  endforeach;

  return $artists_photos_IDs;
}

function ig_gav_get_image_depending_on_aspect_ratio($photoID)
{
  $img_width_single = wp_get_attachment_metadata($photoID)['width'];
  $img_height_single = wp_get_attachment_metadata($photoID)['height'];


  if ($img_width_single >= $img_height_single) :
    echo      '<img class="" src="' . esc_url(wp_get_attachment_image_src($photoID, 'ig-medium')[0]) . '" alt="' . esc_html__(get_post_meta($photoID, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') . '">';
?>

  <?php
  else :
    echo      '<img class="ig_w-40" src="' . esc_url(wp_get_attachment_image_src($photoID, 'ig-featured-portrait')[0]) . '" alt="' . esc_html__(get_post_meta($photoID, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') . '">';
  ?>

  <?php endif;
}
function ig_gav_get_image_depending_on_aspect_ratio_for_floats($photoID, $class1, $class2)
{
  $img_width_single = wp_get_attachment_metadata($photoID)['width'];
  $img_height_single = wp_get_attachment_metadata($photoID)['height'];


  if ($img_width_single >= $img_height_single) :
    echo      '<img class=" ' . $class1 . ' ' . $class2 . '" src="' . esc_url(wp_get_attachment_image_src($photoID, 'ig-medium')[0]) . '" alt="' . esc_html__(get_post_meta($photoID, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') . '">';
  ?>

  <?php
  else :
    echo      '<img class=" ' . $class1 .  ' ' . $class2 . '" src="' . esc_url(wp_get_attachment_image_src($photoID, 'ig-featured-portrait')[0]) . '" alt="' . esc_html__(get_post_meta($photoID, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') . '">';
  ?>

  <?php endif;
}


function ig_gav_get_dates_festival_foundation_till_now()
{
  $festival_start_year = '1997';
  $current_year = date("Y");

  return array($festival_start_year, $current_year);
}

function ig_gav_random_image_ID()
{
  $random_image_num = rand(1, 10);
  $random_image_field = 'options_backup_image_' . $random_image_num;
  return get_field($random_image_field, 'options');
}


function ig_get_day_of_the_week_depending_on_language($day_to_check)
{
  if (get_bloginfo("language") === 'en-GB') :


    switch ($day_to_check) {
      case "Mon":
        return 'Monday';
        break;
      case "Tue":
        return 'Tuesday';
        break;
      case "Wed":
        return 'Wednesday';
        break;
      case "Thu":
        return 'Thursday';
        break;
      case "Fri":
        return 'Friday';
        break;
      case "Sat":
        return 'Saturday';
        break;
      case "Sun":
        return 'Sunday';
        break;
      default:
        return null;
    }

  elseif (get_bloginfo("language") === 'lv-LV') :

    switch ($day_to_check) {
      case "Mon":
        return 'Pirmdiena';
        break;
      case "Tue":
        return 'Otrdiena';
        break;
      case "Wed":
        return 'Trešdiena';
        break;
      case "Thu":
        return 'Ceturtdiena';
        break;
      case "Fri":
        return 'Piektdiena';
        break;
      case "Sat":
        return 'Sestdiena';
        break;
      case "Sun":
        return 'Svētdiena';
        break;
      default:
        return null;
    }

  endif;
}



function ig_gav_print_message_if_there_are_no_events_at_location()
{

  if (get_field('options_all_the_events_for_current_festival_uploaded', 'options') === 'false') : ?>

    <div class="upcoming-events__program-info-text">
      <h4><?php echo ig_gav_get_global_text_wp_kses_filter('global_backup_message_if_the_venue_events_havent_been_uploaded_yet') ?></h4>
    </div>

  <?php

  else : ?>

    <div class="upcoming-events__program-info-text">
      <h4><?php echo ig_gav_get_global_text_wp_kses_filter('global_message_to_let_people_know_that_events_at_the_current_location_have_finished') ?></h4>
    </div>

<?php

  endif;
}

?>