<div class="container-fluid facts my-5 p-5">
    <div class="row g-5">
        <?php
        $facts = [
            ['icon' => 'fa-handshake', 'number' => get_theme_mod('facts_experience', 6), 'text' => __('Partnerstva', 'your-theme-textdomain'), 'delay' => '200'],
            ['icon' => 'fa-users-cog', 'number' => get_theme_mod('facts_team_members', 10), 'text' => __('Članovi tima', 'your-theme-textdomain'), 'delay' => '500'],
            ['icon' => 'fa-globe', 'number' => get_theme_mod('facts_happy_clients', 3), 'text' => __('Zemlje u kojima poslujemo', 'your-theme-textdomain'), 'delay' => '700'],
            ['icon' => 'fa-check-double', 'number' => get_theme_mod('facts_projects_done', 59), 'text' => __('Završeni projekti', 'your-theme-textdomain'), 'delay' => '900']
        ];
        
        foreach ($facts as $fact) : ?>
            <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($fact['delay']); ?>">
                <div class="text-center fact-box p-5">
                    <i class="fa <?php echo esc_attr($fact['icon']); ?> fa-3x mb-3"></i>
                    <br><br>
                    <h1 class="display-2 fw-bold mb-0" data-toggle="counter-up">
                        <?php echo esc_html($fact['number']); ?>
                    </h1>
                    <br>
                    <span class="fs-5 fw-semi-bold">
                        <?php echo esc_html($fact['text']); ?>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
