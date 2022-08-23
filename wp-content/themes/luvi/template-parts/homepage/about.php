    <section id="sobre">
        <div class="container-fluid">
            <div class="row">
                <?php $theme_options_code = 435; ?>
                <?php if( have_rows('about_section', $theme_options_code) ): ?>
                <?php while( have_rows('about_section', $theme_options_code) ): the_row();?>
                <div class="col-md-6 d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-once="false" data-aos-easing="ease-in-out"
                    data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
                    <div class="txt">
                        <h2>quem somos</h2>
                        <p><?php the_sub_field('text_about', $theme_options_code); ?></p>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="<?php the_sub_field('img_about', $theme_options_code); ?>" alt="">
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>