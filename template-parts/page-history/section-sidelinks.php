<?php
$festival_from_foundation_till_now_years = ig_gav_get_dates_festival_foundation_till_now();
$query_field = $args['field']

?>
    <div class="col-md-2 order-2 order-sm-2 order-md-1 order-lg-1 order-xl-1">

    <div class="side-links__wrapper side-links__wrapper--full">
        <ul class="side-links__list side-links__list--sticky-history side-links__list--full-height">
<?php if ($args['in_ajax'] === false) : ?>
       
            <?php
endif;

            if ($args['in_ajax'] === false) :
                if (have_rows($query_field)) :

                    while (have_rows($query_field)) : the_row();

                        $stats_name = get_sub_field('stats_name');
                        $stats_number = get_sub_field('stats_number');


            ?>

                        <li class="side-links__item side-links__item--center ">

                            <div class="side-links__item-group">
                                <h4 class="side-links__item-group-inner-item side-links__item-group-inner-item--smaller"><?php esc_html_e($stats_name, 'saulkrasti-jazz-festival') ?></h4>
                                <h2 class="side-links__item-group-inner-item--larger side-links__item-group-inner-item--larger--but-smaller"><?php esc_html_e($stats_number, 'saulkrasti-jazz-festival') ?></h2>
                            </div>



                        </li>











            <?php
                    endwhile;


                endif;

            else :

 


                if (have_rows($query_field, $args['page_ID'])) :
                 

                    while (have_rows($query_field, $args['page_ID'])) : the_row();

                        $query_year = get_sub_field('year');

                        if($query_year === $args['festival_query_year']) :
                         


                            if( have_rows('this_years_statistic', $args['page_ID']) ):

                                while( have_rows('this_years_statistic', $args['page_ID']) ) : the_row(); 
                            
                                    $stats_title = get_sub_field('stats_title');
                                    $stats_number = get_sub_field('stats_number');
                            
                                    ?>
                               <li class="side-links__item side-links__item--center ">

<div class="side-links__item-group">
    <h4 class="side-links__item-group-inner-item side-links__item-group-inner-item--smaller"><?php esc_html_e($stats_title, 'saulkrasti-jazz-festival') ?></h4>
    <h2 class="side-links__item-group-inner-item--larger side-links__item-group-inner-item--larger--but-smaller"><?php esc_html_e($stats_number, 'saulkrasti-jazz-festival') ?></h2>
</div>



</li>
                            <?php
                                endwhile;
                            
                            
                            endif;






                        endif;

                    endwhile;


                endif;







            endif; ?>

        </ul>
    </div>
</div>
