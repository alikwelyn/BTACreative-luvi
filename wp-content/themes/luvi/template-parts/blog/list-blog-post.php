<article class="col-md-4 blog" id="post-<?php the_ID(); ?>">
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
                <div class="post-content">
                    <img class="thumbnail" src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php echo get_author_name(); ?>">
                    <div class="info">
                        <h5 class="author-name"><?php echo get_author_name(); ?></h5>
                        <span class="date"><?php echo get_the_date(); ?></span> <span class="read-time"><i class="fa fa-clock-o"></i> <?php echo display_read_time(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</article>