    <section id="dna"> 
      <div class="container">
        <div class="row">
          <div class="col-md-12" data-aos="fade-up" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <h2>Nosso DNA</h2>
          </div>
          <div class="col-md-4" data-aos="fade-right" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <div class="card">
              <img class="mx-auto" src="<?php the_field('imagem_missao') ?>" width="84" alt="Missão"/>
              <div class="card-body">
                <h3 class="card-title">Missão</h3>
                <p><?php the_field('txt_missao') ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-right" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <div class="card">
              <img class="mx-auto" src="<?php the_field('imagem_visao') ?>" width="84" alt="Visão"/>
              <div class="card-body">
                <h3 class="card-title">Visão</h3>
                <p><?php the_field('txt_visao') ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-right" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="10" data-aos-duration="1000">
            <div class="card">
              <img class="mx-auto" src="<?php the_field('imagem_valores') ?>" width="84" alt="Valores"/>
              <div class="card-body">
                <h3 class="card-title">Valores</h3>
                <p><?php the_field('txt_valores') ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-center">
            <a href="#contato" class="btn btn__rose">AGENDE AGORA</a>
          </div>
        </div>
      </div>
    </section>