    <section id="video"> 
      <div class="container">
        <div class="row">
          <div class="col-md-9 mx-auto d-block" data-aos="zoom-in" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <div class="videoWrapper videoWrapper169 js-videoWrapper">
              <?php  
              $theme_options_code = 435; //$theme_options = get_fields($theme_options_code);
              $link_youtube = get_field('link_youtube', $theme_options_code);
              $converted_link = preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                "<iframe class=\"videoIframe js-videoIframe\" data-src=\"https://www.youtube.com/embed/$1?autoplay=1&modestbranding=1&rel=0&hl=sv\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>"
                ,$link_youtube
              );
              ?>
              <button class="videoPoster js-videoPoster" style="background-image:url('<?php
              $link_youtube = get_field('link_youtube', $theme_options_code);
              $video_id = explode("?v=", $link_youtube);
              $video_id = $video_id[1];
              $thumbnail="http://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";
              echo $thumbnail; ?>'); ">Assitir Vídeo</button>
            </div>
          </div>
        </div>
      </div>
    </section>