<?php
$args = array(
    'post_type'      => 'team',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);
$team_query = new WP_Query($args);
if ($team_query->have_posts()): ?>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto" data-aos="fade-up" data-aos-delay="0" style="max-width: 600px;">
                <p class="fw-medium text-uppercase mb-2" style="color: var(--c-green); font-size: 20px;">Naš tim</p>
                <h1 class="display-5 mb-5 fw-medium" style="color: var(--c-dark);">Posvećeni članovi tima</h1>
            </div>

            <!-- Team Carousel -->
            <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" style="display: flex; justify-content: center;">
                <div class="carousel-inner">
                    <?php 
                    $team_members = array();
                    while ($team_query->have_posts()): $team_query->the_post(); 
                        $team_member_image = get_field('team_member_image'); 
                        $image_url = $team_member_image ? esc_url($team_member_image['url']) : 'default-image.jpg';
                        $team_members[] = [
                            'image' => $image_url,
                            'name' => get_the_title(),
                            'position' => get_field('team_member_position'),
                            'phone' => get_field('team_member_phone'),  
                            'email' => get_field('team_member_email'), 

                        ];
                    endwhile;
                    wp_reset_postdata();

                    // Chunk members into groups of 3
                    $chunks = array_chunk($team_members, 3);
                    $active = 'active';
                    $delay = 300;
                    foreach ($chunks as $chunk): ?>
                        <div class="carousel-item <?php echo $active; ?>">
                            <div class="row g-4 justify-content-center"> <!-- Center team members inside each chunk -->
                                <?php foreach ($chunk as $member): ?>
                                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>"> <!-- Adjusted column size -->
                                        <div class="team-item">
                                            <img class="img-fluid" src="<?php echo $member['image']; ?>" alt="<?php echo esc_attr($member['name']); ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 btn-square" style="width: 90px; height: 90px; background-color: var(--c-green); display: flex; justify-content: center; align-items: center;">
                                                    <i class="fa fa-2x fa-comments" style="color: var(--c-light);"></i> <!-- Changed icon to phone -->
                                                </div>
                                                <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4" style="height: 90px; color: var(--c-dark);">
                                                    <h5><?php echo esc_html($member['name']); ?></h5>
                                                    <span class="text" style="color: var(--c-green);"><?php echo esc_html($member['position']); ?></span>
                                                    <div class="team-social">
                                                        <?php if ($member['phone']): ?>
                                                            <a class="btn btn-square rounded-circle mx-1" href="tel:<?php echo esc_html($member['phone']); ?>" style="background-color: var(--c-dark);">
                                                                <i class="fa fa-phone" style="color: var(--c-light);"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if ($member['email']): ?>
                                                            <a class="btn btn-square rounded-circle mx-1" href="mailto:<?php echo esc_html($member['email']); ?>" style="background-color: var(--c-dark);">
                                                                <i class="fa fa-envelope" style="color: var(--c-light);"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $delay += 400; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php $active = ''; ?>
                    <?php endforeach; ?>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
<?php endif; ?>
