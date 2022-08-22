<?php get_header(); ?>

    <section id="nossos-profissionais"> 
      <div class="container">
        <div class="row">
          <div class="col-md-12" data-aos="fade-down" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <h2><?php the_title(); ?></h2>
          </div>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <?php
              $args_cat = [
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => 0,
              ];

              $categories = get_categories($args_cat);
              if (!empty($categories)):
                foreach ($categories as $category):
                    $args = [
                        'post_type' => 'nossos_profissionais',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'cat' => $category->term_id
                    ];

                    $query = new WP_Query($args);
                    while ($query->have_posts()) : $query->the_post(); ?>
                    
                    <div class="col-md-12" data-aos="fade-down" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
                      <h3><?php echo $category->name; ?></h3>
                    </div>

                    <div class="col-md-4" data-aos="fade-right" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
                      <div class="card">
                        <img class="rounded mx-auto" src="<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?>" width="250" alt="<?php the_title(); ?>"/>
                        <div class="card-body">
                          <h3 class="card-title"><?php the_title(); ?></h3>
                          <p><?php the_field('id_prof'); ?></p>
                          <p><a href="<?php the_field('link_resume');  ?>" class="btn btn__rose btn-block" target="_new">ACESSAR CURRÍCULO</a></p>
                        </div>
                      </div>
                    </div>
                        

                    <?php 
                    endwhile;
                    wp_reset_postdata(); 
                endforeach;
              endif;

            ?>

        </div>
      </div>
    </section>

<?php get_footer(); ?>