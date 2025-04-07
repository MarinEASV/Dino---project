<?php              
$hero_title = get_field("hero_title");
$hero_text = get_field("hero_text");
$hero_btn = get_field("hero_btn");
$title_contact_modal = get_field("title_contact_modal");             
?>

<!-- Hero Section -->
<section id="hero" class="hero-section">
  <div class="container d-flex align-items-center justify-content-center text-center vh-100">
    <div class="hero-content">
      <!-- Title Words with JavaScript Animation -->
      <h1 class="display-1">
        <?php 
          $words = explode(" ", $hero_title);
          foreach ($words as $word) {
            echo "<span class='hero-word' style='opacity:0; transform:translateY(10px);'>{$word}</span> ";
          }
          ?></h1>

    
              <br>
              <br>
              <br>
                <!-- Animated Text -->
              <p class="lead hero-text" style="opacity:0;"><?php echo $hero_text; ?></p>
              <br>
            <!-- Modal Button with Fade-in (no AOS attributes) -->
            <button type="button" class="btn btn-contact-me btn-lg hero-btn" data-toggle="modal" data-target="#bookAppointmentModal">
              <?php echo $hero_btn; ?>
            </button>

            </div>
          </div>
        </div>

      </div>


      <!-- Modal -->
      <div class="modal fade" id="bookAppointmentModal" tabindex="-1" role="dialog" 
        aria-labelledby="bookAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="bookAppointmentModalLabel"><?php echo $title_contact_modal ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Shortcode -->
              <?php echo do_shortcode('[contact-form-7 id="e0e33fa" title="Contact me form"]'); ?>
            </div>
          </div>
        </div>
      </div>
</section>