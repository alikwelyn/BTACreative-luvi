<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
  <div id="search-input">
    <input type="search" placeholder="Procurar postagens..." name="s" value="<?php echo get_search_query(); ?>"/>
    <input type="hidden" name="post" value="buscar"/>
    <button onclick="searchToggle(this, event);" type="submit">
      <i class="fa fa-search"></i>
    </button>
  </div>
</form>
