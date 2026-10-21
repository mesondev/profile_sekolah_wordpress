<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content">Lewati ke konten utama</a>

<header class="site-header">
	<div class="wrap header-inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> - Beranda">
			<span class="brand-mark brand-logo-wrap" aria-hidden="true"><img class="brand-logo" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-sekolah.webp' ) ); ?>" alt="" width="52" height="52"></span>
			<span class="brand-copy">
				<strong><?php bloginfo( 'name' ); ?></strong>
				<small>Website Resmi Sekolah</small>
			</span>
		</a>

		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu" aria-label="Buka menu navigasi">
			<span class="menu-toggle-icon" aria-hidden="true"><span></span><span></span><span></span></span>
			<span class="menu-toggle-label">Menu</span>
		</button>

		<nav class="site-nav" id="primary-menu" aria-label="Navigasi utama" tabindex="-1">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_id'        => 'primary-menu-list',
					'menu_class'     => 'primary-menu',
					'depth'          => 3,
					'fallback_cb'    => 'pirime_modern_fallback_menu',
				)
			);
			?>
			<div class="mobile-search"><?php get_search_form(); ?></div>
		</nav>

		<div class="header-tools">
			<div class="header-search"><?php get_search_form(); ?></div>
			<a class="nav-cta" href="<?php echo esc_url( pirime_modern_page_url( 'ppdb-spmb' ) ); ?>">
				Info PPDB / SPMB <span aria-hidden="true">↗</span>
			</a>
		</div>
	</div>
</header>
