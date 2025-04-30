<?php get_header() ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>
    
    <!--hero-->
    <?php get_template_part("template-parts/hero"); ?>
    <!--hero-->

    <!--menu-->
     <?php get_template_part ("template-parts/menu");?>
    <!--menu-->

    <!--about-->
    <?php get_template_part ("template-parts/about");?>
    <!--about-->

    <!-- Bottles Section -->
    <?php get_template_part("template-parts/bottles"); ?>
    <!-- Bottles Section -->

    <!-- Video Section -->
     <?php get_template_part("template-parts/video"); ?>
    <!-- Video Section -->

    <!-- Reviews Section -->
    <?php get_template_part("template-parts/reviews"); ?>
    <!-- Reviews Section -->

     

    
     
        <?php endwhile ?>
    <?php endif ?>
<?php get_footer() ?>      