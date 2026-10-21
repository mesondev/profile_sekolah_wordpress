<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="site-search">Cari informasi di situs</label>
	<input id="site-search" type="search" class="search-field" placeholder="Cari informasi…" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<button type="submit" class="search-submit" aria-label="Mulai pencarian"><span aria-hidden="true">⌕</span></button>
</form>
