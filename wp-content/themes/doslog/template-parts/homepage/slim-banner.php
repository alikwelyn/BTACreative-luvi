    <section id="slim-banner" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-12" data-aos="fade-up" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000"> 
            <?php $theme_options_code = 435; ?>
            <?php if( have_rows('slimbanner_section', $theme_options_code) ): the_row();?>
            <h3><?php the_sub_field('slimbanner_text', $theme_options_code); ?></h3>
            <a href="<?php the_sub_field('slimbanner_btn_link', $theme_options_code); ?>" class="btn btn_red"><?php the_sub_field('slimbanner_btn_text', $theme_options_code); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>