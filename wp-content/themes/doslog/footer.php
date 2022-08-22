<?php 
$theme_options_code = 435;
$informations_footer = get_field('informations_footer', $theme_options_code);
?>
<footer>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center h-100" data-aos="fade-up" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
      <div class="col-md-8 mx-auto">
        <img src="<?php bloginfo('template_url'); ?>/assets/imgs/logo-black.png" width="200" alt="<?php echo get_bloginfo( 'name' ) . ' - '. get_bloginfo( 'description' ); ?>">
        <ul class="styled-icons icon-theme-colored list-inline">
        <?php
        $social_media_footer = get_field('social_media_footer', $theme_options_code);
        $social_media_choose_footer = get_field('social_media_choose_footer', $theme_options_code);
        if($social_media_footer == true){ 
        ?>
          <?php if($social_media_choose_footer && in_array('Facebook', $social_media_choose_footer)) { ?>
            <li><a href="<?php the_field('link_facebook', $theme_options_code); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <?php } ?>
          <?php if($social_media_choose_footer && in_array('Instagram', $social_media_choose_footer)) { ?>
            <li><a href="<?php the_field('link_instagram', $theme_options_code); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
          <?php } ?>
          <?php if($social_media_choose_footer && in_array('Youtube', $social_media_choose_footer)) { ?>
            <li><a href="<?php the_field('link_youtube', $theme_options_code); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
          <?php } ?>
          <?php if($social_media_choose_footer && in_array('Twitter', $social_media_choose_footer)) { ?>
            <li><a href="<?php the_field('link_twitter', $theme_options_code); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <?php } ?>
          <?php if($social_media_choose_footer && in_array('Linkedin', $social_media_choose_footer)) { ?>
            <li><a href="<?php the_field('link_linkedin', $theme_options_code); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
          <?php } ?>
        <?php } ?>
        </ul>
      </div>
      <div class="col-md-8 mx-auto">
        <div class="row">
          <div class="col-md-6">
            <div class="btn btn_red" id="VerTelefone" onclick="VerTelefone()">VER TELEFONE</div>
          </div>
          <div class="col-md-6">
            <div class="btn btn_red" id="VerEmail" onclick="VerEmail()">VER EMAIL</div>
          </div>
          <div class="col-md-12">
            <p class="end">
              <?php echo $informations_footer['street_informations_footer']; ?><br>
              <?php echo $informations_footer['district_city_informations_footer']; ?><br>
              CEP <?php echo $informations_footer['cep_informations_footer']; ?><br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-4 logo-client">
          <img src="<?php bloginfo('template_url'); ?>/assets/imgs/logo.png" width="150" alt="<?php echo get_bloginfo( 'name' ) . ' - '. get_bloginfo( 'description' ); ?>">
        </div>
        <div class="col-xs-12 col-md-4 cnpj">
        </div>
        <div class="col-xs-12 col-md-4 bta-creative">
        <span>Desenvolvido por </span><a href="https://btacreative.com.br/"><img src="<?php bloginfo('template_url'); ?>/assets/imgs/logo-bta-principal.svg" width="75" alt="BTA Creative"></a>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init();
function VerTelefone(){ 
$("#VerTelefone").text('<?php $phone = $informations_footer['whatsapp_informations_footer_copiar'];
$whatsapp = $informations_footer['phone_informations_footer'];
if($phone == ""){
  $whatsapp = "(".substr($whatsapp, 0, 2).") ".substr($whatsapp, 2, -4)."-".substr($whatsapp, -4);
  echo $whatsapp;
} else {
  $phone = "(".substr($phone, 0, 2).") ".substr($phone, 2, -4)."-".substr($phone, -4);
  echo $phone;
}
?>'); 
}
function VerEmail(){ 
$("#VerEmail").text('<?php echo $informations_footer['email_informations_footer']; ?>'); 
}

$(window).scroll(function (event) {
    if ($(window).scrollTop() <= 100) {
    	$("#test").attr("src", "<?php bloginfo('template_url'); ?>/assets/imgs/logo-black.png");
    } else {
    	$("#test").attr("src", "<?php bloginfo('template_url'); ?>/assets/imgs/logo.png");
    }
});
</script>
</body>
</html>