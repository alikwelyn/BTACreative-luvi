<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<section id="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="post-single">
                  <div class="container">
                    <div class="row">

                      <div class="col-md-12">
                        <div class="post-container" data-aos="fade-down" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
                          <span class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?>');"></span>
                          <div class="single-header">
                            <span class="single-category">
                              <?php
                                $category = get_the_category(); 
                                echo $category[0]->cat_name;
                              ?>
                            </span>
                            <h1 class="single-title"><?php the_title(); ?></h1>
                            <span class="single-body">
                              <span class="post-author">
                                <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" width="40" height="40" alt="<?php echo get_author_name(); ?>" class="rounded-circle">
                                <span><?php echo get_author_name(); ?></span>
                              </span>
                              <span class="post-date">
                                <i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
                              </span>
                              <span class="post-time-read">
                                <i class="fa fa-clock-o"></i> <?php echo display_read_time(); ?>
                              </span>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" data-aos="fade-down" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
                        <?php the_content(); ?>
                      </div>

                      <div class="col-md-6">
                        <?php echo do_shortcode("[sharing_post]"); ?>
                      </div>

                      <?php 
                      $args = array(
                        'order' => 'ASC',
                        'orderby' => 'ID'
                      );
                      $tags = get_tags($args); 
                      ?>
                      <div class="col-md-6 text-sm-right">
                        <div class="post-tags">
                        <?php foreach ( $tags as $tag ) { ?>
                            <!--<a href="<?php echo get_tag_link( $tag->term_id ); ?>" rel="tag"><?php echo $tag->name; ?></a>-->
                            <span><?php echo $tag->name; ?></span>
                        <?php } ?>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <?php blog_posts_nav(); ?>
                      </div>

                      <div class="col-md-12">
                        <h2 class="related-posts">Postagens relacionadas</h2>
                      </div>

                    <?php
                    $related = get_posts( array(
                        'category__in' =>wp_get_post_categories($post->ID),
                        'numberposts' => 3,
                        'post__not_in' => array($post->ID) 
                    ) );
                    if( $related ) foreach( $related as $post ) {
                    setup_postdata($post);
                    add_filter( 'the_title', 'max_title_length');
                    ?>  
                    
                    <article class="col-md-4 blog" id="post-<?php the_ID(); ?>" data-aos="fade-right" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card">
                                <div class="category-tag">
                                    <p class="category">
                                    <?php
                                        $category = get_the_category(); 
                                        echo $category[0]->cat_name;
                                    ?>
                                    </p>
                                    <?php the_post_thumbnail('index-thumb', ['class' => 'banner-img']); ?>
                                </div>
                                <div class="card-body">
                                    <h3 class="title"><?php echo wp_trim_excerpt( get_the_title() ); ?></h3>
                                    <p class="description"><?php echo strip_tags( get_the_excerpt() ); ?></p>
                                </div>
                            </div>
                        </a>
                    </article>
                    
                    <?php } wp_reset_postdata(); ?>

                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>