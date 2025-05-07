<section id="video" class="section-padding section-connector">
  <div class="py-vh-5 w-100 overflow-hidden">
    <div class="container">
      <br><br>

      <!-- Video Section Title -->
      <div class="container my-5 text-center" data-aos="fade-down">
        <h2>Take a look and find out more in our video</h2>
      </div>

      <!-- Centered Video Carousel Section -->
      <div class="mx-auto w-75" style="max-width: 800px;">
        <div id="carouselExampleCaptions" class="carousel slide" data-aos="fade-up" data-bs-ride="false">

          <!-- Carousel Indicators (hidden) -->
          <div class="carousel-indicators" style="display: none !important;">
            <?php
            $videoLoop = new WP_Query([
              'post_type'      => 'video',
              'posts_per_page' => -1
            ]);
            if ($videoLoop->have_posts()):
              $slide_index = 0;
              while ($videoLoop->have_posts()): 
                $videoLoop->the_post();
                ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide_index; ?>"
                  class="<?php echo ($slide_index === 0) ? 'active' : ''; ?>"
                  aria-current="<?php echo ($slide_index === 0) ? 'true' : 'false'; ?>"
                  aria-label="Slide <?php echo $slide_index + 1; ?>"></button>
                <?php
                $slide_index++;
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </div>

          <!-- Carousel Items -->
          <div class="carousel-inner">
            <?php
            $videoLoop = new WP_Query([
              'post_type'      => 'video',
              'posts_per_page' => -1
            ]);
            if ($videoLoop->have_posts()):
              $slide_index = 0;
              while ($videoLoop->have_posts()): 
                $videoLoop->the_post();
                $video_url = get_field('video');
                ?>
                <div class="carousel-item <?php echo ($slide_index === 0) ? 'active' : ''; ?>">
                  <video 
                    src="<?php echo esc_url($video_url); ?>" 
                    class="d-block w-100"
                    muted
                    autoplay
                    playsinline
                    loop
                    controls>
                  </video>
                </div>
                <?php
                $slide_index++;
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </div>

        </div>
      </div>

      <br><br><br><br>            
    </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const videos = document.querySelectorAll("#video .carousel-item video");

  if (videos.length > 0) {
    let observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        const video = entry.target;
        if (entry.isIntersecting) {
          video.play().catch(err => console.warn("Autoplay error:", err));
        } else {
          video.pause();
          video.currentTime = 0;
        }
      });
    }, { threshold: 0.5 });

    videos.forEach(video => observer.observe(video));
  }
});
</script>
