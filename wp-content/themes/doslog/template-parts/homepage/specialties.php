    <section id="especialidades"> 
      <div class="container">
        <div class="row">
          <div class="col-md-12" data-aos="fade-up" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <h2>Especialidades</h2>
          </div>

          <?php 
          $posts = get_posts(array('posts_per_page'	=> -1,'post_type'			=> 'especialidades','order' => 'ASC'));
          if( $posts ): ?>

	        <?php foreach( $posts as $post ): setup_postdata( $post ); ?>

          <div class="col-md-4" data-aos="fade-right" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <div class="card">
              <img class="mx-auto" src="<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?>" width="84" alt="<?php the_title(); ?>"/>
              <div class="card-body">
                <h3 class="card-title"><?php the_title(); ?></h3>
                <?php the_content(); ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

          <?php wp_reset_postdata(); ?>
          <?php endif; ?>

          <div class="col-md-12 text-center">
            <a href="#contato" class="btn btn__rose">AGENDE AGORA</a>
          </div>
        </div>
      </div>
    </section>