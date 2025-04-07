<section id="about">
    <?php
        $video_top = get_field("video_top");
        $image_left = get_field("image_left");
        $image_right = get_field("image_right");
        $headline_about = get_field("headline_about");
        $paragraph_one = get_field("paragraph_one");
        $paragraph_two = get_field("paragraph_two");
        $list_paragraph = get_field("list_paragraph");
        $heading_manufacturing = get_field("heading_manufacturing");
    ?>

    <div class="position-relative overflow-hidden text-center px-4 px-md-5" style="height: 400px;">
        <video id="hero-video" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" autoplay loop muted playsinline>
            <source src="<?php echo $video_top; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="position-relative z-2 text-white py-5 d-flex flex-column flex-md-row align-items-center justify-content-between w-100">
            <!-- Left Side (Logo and Text) -->
            <div class="text-start mx-auto" style="text-align: center;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/Dino-logo.svg" alt="Logo" class="logo-video mb-3" style="max-width: 270px;">
                <p class="logo-text lead mb-0">Kvaliteta koja traje.</p>
            </div>

            <!-- Right Side (Heading, Hidden on Mobile) -->
            <div class="text-video d-none d-md-block mx-auto" style="padding-left: 5rem;">
                <h2 class="heading_manufacturing mt-3">
                    <span class="sentence1" data-aos="fade-down" data-aos-duration="1500">
                        <?php echo $heading_manufacturing; ?>
                    </span>
                    <br>
                    <span class="sentence2" data-aos="fade-in" data-aos-delay="1500" data-aos-duration="1500">
                        Srećom, došli ste na pravo mjesto.
                    </span>
                </h2>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2><?php echo $headline_about; ?></h2>
                <p class="py-2"> <?php echo $paragraph_one; ?> </p>
                <p> <?php echo $paragraph_two; ?> </p>
                
                <?php if ($list_paragraph): ?>
                <ul class="list-unstyled mt-3">
                    <?php echo $list_paragraph; ?>
                </ul>
                <?php endif; ?>
            </div>

            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="ratio ratio-1x1 bg-cover shadow" data-aos="fade-up" style="background-image: url(<?php echo $image_left["sizes"]["large"]; ?>);"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="ratio ratio-1x1 bg-cover shadow" data-aos="fade-left" style="background-image: url(<?php echo $image_right["sizes"]["large"]; ?>);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media (max-width: 767px) {
    .heading_manufacturing {
        display: none !important;
    }
}

@media (max-width: 887px) {
    .sentence1 {
        font-size: 3rem;
        line-height:  2.6rem;
    },
    .sentence2 {
        font-size: 0.5rem;
        line-height:  0.5rem;
    }
}

.text-video {
    text-align: center !important;
    color: var(--c-light);
}

.logo-text {
    text-align: center !important;  
    font-weight: bold;
    color: var(--c-light);
}

.heading_manufacturing {
    font-size: 5rem;
    color: var(--c-light);
}

.sentence2 {
    font-size: 2rem;
    color: var(--c-light);
}

</style>