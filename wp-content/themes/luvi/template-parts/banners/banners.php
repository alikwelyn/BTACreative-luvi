<section id="home">
    <div class="container-fluid">
        <div id="banner-indicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner text-center">
                <?php 
                $theme_options_code = 435;
                $banners_section = get_field('banners_section', $theme_options_code);
                foreach($banners_section as $key => $value) {
                    if($key == 0){
                ?>

                <div class="carousel-item active"
                    style="background-image: url('<?php echo $value['banner_img'] ?>')">
                    <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                        <h1><?php echo $value['banner_title'] ?></h1>
                    </div>
                    <div class="button">
                        <a href="#contato" class="btn btn_blue">FALE CONOSCO</a>
                    </div>
                </div>

                <?php } else { ?>

                <div class="carousel-item"
                    style="background-image: url('<?php echo $value['banner_img'] ?>')">
                    <div class="d-flex h-100 align-items-center justify-content-center">
                        <h1><?php echo $value['banner_title'] ?></h1>
                    </div>
                </div>

                <?php } } ?>

                <a class="carousel-control-prev" href="#banner-indicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#banner-indicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>