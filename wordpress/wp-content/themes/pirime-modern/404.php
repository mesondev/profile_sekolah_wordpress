<?php get_header(); ?>

<main id="main-content" class="content-area error-page">
	<div class="wrap">
		<section class="content-card error-card">
			<span class="error-code" aria-hidden="true">404</span>
			<span class="eyebrow">Halaman tidak ditemukan</span>
			<h1>Sepertinya halaman ini belum tersedia.</h1>
			<p>Periksa kembali alamat yang Anda buka, atau gunakan pencarian untuk menemukan informasi sekolah.</p>
			<div class="error-search"><?php get_search_form(); ?></div>
			<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">Kembali ke beranda <span aria-hidden="true">→</span></a>
		</section>
	</div>
</main>

<?php get_footer(); ?>
