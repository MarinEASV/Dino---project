<?php get_header() ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>
    
    <!--hero-->
    <?php get_template_part("template-parts/hero"); ?>
    <!--hero-->

    <!--about me-->
    <?php get_template_part("template-parts/about"); ?>
    <!--about me-->

    <!-- Video Section -->
    <?php get_template_part("template-parts/video"); ?>
    <!-- Video Section -->

     <!--manufacturing-->
     <?php get_template_part ("template-parts/manufacturing");?>
    <!--manufacturing-->

    <!--facts-section -->
    <?php get_template_part("template-parts/facts-section"); ?>  
    <!--facts-section-->

    <!--team-->
    <?php get_template_part("template-parts/team"); ?>
    <!--team-->

    <!--testimonials-->
    <?php get_template_part("template-parts/testimonial"); ?>
    <!--testimonials-->

     
        <?php endwhile ?>
    <?php endif ?>
<?php get_footer() ?>      