<footer class="site-footer">
	<div class="wrap">
		<div class="footer-grid">
			<div class="footer-intro">
				<a class="brand footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="brand-mark brand-logo-wrap" aria-hidden="true"><img class="brand-logo" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-sekolah.webp' ) ); ?>" alt="" width="52" height="52" loading="lazy"></span>
					<span class="brand-copy">
						<strong><?php bloginfo( 'name' ); ?></strong>
						<small>Website Resmi Sekolah</small>
					</span>
				</a>
				<p class="footer-about">Portal informasi resmi SMP Negeri 4 Pirime. Informasi di situs ini dikelola dan diperbarui oleh sekolah.</p>
			</div>

			<div>
				<h2 class="footer-title">Jelajahi</h2>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'profil-sekolah' ) ); ?>">Profil sekolah</a></li>
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'berita-pengumuman' ) ); ?>">Berita dan pengumuman</a></li>
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'agenda-sekolah' ) ); ?>">Agenda sekolah</a></li>
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'ppdb-spmb' ) ); ?>">PPDB / SPMB</a></li>
				</ul>
			</div>

			<div>
				<h2 class="footer-title">Media sekolah</h2>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'guru-tenaga-kependidikan' ) ); ?>">Guru dan tenaga kependidikan</a></li>
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'galeri/galeri-foto' ) ); ?>">Galeri foto</a></li>
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'prestasi' ) ); ?>">Prestasi</a></li>
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'peta-situs' ) ); ?>">Peta situs</a></li>
				</ul>
			</div>

			<div>
				<h2 class="footer-title">Kontak dan layanan</h2>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'kontak' ) ); ?>">Kontak resmi</a></li>
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'ppdb-spmb' ) ); ?>">PPDB / SPMB</a></li>
					<li><a href="<?php echo esc_url( pirime_modern_page_url( 'aksesibilitas' ) ); ?>">Aksesibilitas</a></li>
					<?php if ( get_privacy_policy_url() ) : ?><li><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Kebijakan privasi</a></li><?php endif; ?>
				</ul>
			</div>
		</div>

		<div class="footer-bottom">
			<span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. Hak cipta dilindungi.</span>
			<a href="<?php echo esc_url( home_url( '/wp-login.php' ) ); ?>">Masuk ke WordPress</a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
