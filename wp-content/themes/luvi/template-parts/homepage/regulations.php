    <section id="normas"> 
      <div class="container">
        <div class="row">
          <div class="col-md-12" data-aos="fade-up" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <h2>Normas e Regulamentos</h2>
            
          </div>
          
          <?php 
        
          
          $theme_options_code = 435;
          $regulations_areas_section = get_field('regulations_areas_section', $theme_options_code);
          $button_regulations_areas_section = get_field('button_regulations_areas_section', $theme_options_code);



          foreach($regulations_areas_section as $value) {

          ?>

          <div class="col-md-6" data-aos="fade-right" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <div class="card">
              <div class="card-body">
                <p><?php echo $value; ?></p>
              </div>
            </div>
          </div>

          <?php } ?>

          <div class="col-md-12 text-center">
            <a href="<?php echo $button_regulations_areas_section['link_button_regulations_areas_section']; ?>" class="btn btn_blue"><?php echo $button_regulations_areas_section['text_button_regulations_areas_section']; ?></a>
          </div>
        </div>
      </div>

    </section>