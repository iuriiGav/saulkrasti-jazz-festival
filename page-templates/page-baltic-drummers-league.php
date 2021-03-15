<?php
/* 
* Template Name: Baltic Drummers League
*/

get_header(); ?>


<section class="drummers-league-container full-screen-cover " style="background-image:  url(<?php ig_saulkrasti_jazz_image_from_field('options_baltic_drummers_league_covert', 'options')
                                                                                                    ?>)">
    <?php get_template_part('template-parts/baltic-drummers-league/section', 'about-bdl'); ?>


</section>
<section class="drummers-league-details bgc-dark">
    <?php get_template_part('template-parts/baltic-drummers-league/section', 'bdl-details'); ?>


</section>
<section class="drummers-league-finalists full-screen-cover" style="background: linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_baltic_drummers_league_covert', 'options')
                                                                                                    ?>)">
    <?php get_template_part('template-parts/baltic-drummers-league/section', 'bdl-finalists'); ?>


</section>

<?php get_footer(); ?>