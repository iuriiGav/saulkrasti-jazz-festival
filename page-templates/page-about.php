<?php 

/*
* Template Name: About Festival
*/
get_header(); 
?>

<div class="row">
    <div class="col-6">


        <?php the_field('test_gallery') ?>
    </div>
</div>
<h5 style='color: red; font-style: italic;'> <?php echo 'this is from ' . basename(__FILE__); ?></h5>
<?php get_footer(); ?>