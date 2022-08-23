    <section id="blog">     
      <div class="container">
        <div class="row">
          <div class="col-md-12" data-aos="fade-down" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <h2>Blog</h2>
          </div>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">

          <?php 
          $query = new WP_Query(array('post_type' => 'post'));
          add_filter( 'the_title', 'max_title_length');?>
          <?php 
          if ($query->have_posts() ) {
              while ($query->have_posts() ) {
                $query->the_post();
                get_template_part('template-parts/blog/list-blog-post'); 
              }
            } else {
              get_template_part( 'template-parts/blog/list-blog-post-empty' );
            }
          ?>
          <?php if (  $wp_query->max_num_pages > 1 ) : ?>
          <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
          </script>
          <div id="load-more" class="btn btn_blue" style="text-align:center;">carregar mais postagens</div>
          <?php endif; ?>
          
          <div class="col-md-12 text-center">
            <a href="blog" class="btn btn_blue">ver matérias anteriores</a>
          </div>
        </div>

      </div>
    </section>