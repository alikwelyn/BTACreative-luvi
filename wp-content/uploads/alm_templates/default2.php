<?php
                      add_filter( 'the_title', 'max_title_length');

               ?>
              <div class="card">
                  <?php the_post_thumbnail('index-thumb', ['class' => 'card-img-top']); ?>
                  <div class="card-body">
                      <p class="blog-date"><?php echo get_the_date(); ?></p>
                      <p class="blog-name"><?php echo get_author_name(); ?></p>
                    <a href="<?php the_permalink(); ?>"><h5 class="blog-title"><?php echo wp_trim_excerpt( get_the_title() ); ?></h5></a>
                    <?php the_excerpt(); ?>
					<div class="align-self-end align-items-end">
						<a href="<?php the_permalink(); ?>" class="btn btn-block btn__orange__b">LER MATÉRIA COMPLETA</a>
					</div>
                  </div>
              </div>