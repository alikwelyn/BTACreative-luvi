<?php get_header(); global $wp_query;?>

  <section id="search">
      <div class="container">
        <div class="row">
          <div class="col-md-12" data-aos="fade-down" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <h2>últimas postagens 🔎</h2>
          </div>

          <div class="col-md-10" data-aos="fade-up" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <?php if ( have_posts() ) { ?>
              <?php while ( have_posts() ) { the_post(); ?>
                <div class="list-group">
                    <a href="<?php echo get_permalink(); ?>" class="list-group-item active">
                        <h4 class="list-group-item-heading"><?php the_title();  ?></h4>
                        <p class="list-group-item-text"><?php echo substr(get_the_excerpt(), 0,200); ?>...</p>
                    </a>
                </div>
                <?php } ?>
                <?php pagination(); ?>
              <?php } ?>
          </div>
        </div>
      </div>
    </section> 

<?php get_footer(); ?>
