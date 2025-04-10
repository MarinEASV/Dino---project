<?php get_header() ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>
    
    <!--hero-->
    <?php get_template_part("template-parts/hero"); ?>
    <!--hero-->

    <!--manufacturing-->
     <?php get_template_part ("template-parts/menu");?>
    <!--manufacturing-->

    <!-- Video Section -->
     <?php get_template_part("template-parts/video"); ?>
    <!-- Video Section -->

    
     
        <?php endwhile ?>
    <?php endif ?>
<?php get_footer() ?>      