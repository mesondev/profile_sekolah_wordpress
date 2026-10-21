<?php get_header(); ?>

<main id="main-content">
	<section class="hero hero-photo">
		<div class="hero-photo-background" aria-hidden="true">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/gedung-sekolah.webp' ) ); ?>" alt="" fetchpriority="high" decoding="async">
		</div>
		<div class="wrap hero-grid">
			<div class="hero-copy-wrap">
				<span class="eyebrow">Selamat datang di website resmi</span>
				<h1>SMP Negeri 4 <em>Pirime</em></h1>
				<p class="hero-copy">Ruang belajar untuk tumbuh bersama. Temukan profil, kegiatan, kabar terbaru, dan informasi resmi sekolah dalam satu tempat.</p>
				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( pirime_modern_page_url( 'profil-sekolah' ) ); ?>">
						Kenali sekolah <span aria-hidden="true">→</span>
					</a>
					<a class="button button-secondary" href="<?php echo esc_url( pirime_modern_page_url( 'berita-pengumuman' ) ); ?>">
						Baca kabar terbaru
					</a>
				</div>
				<p class="hero-note"><span class="note-dot" aria-hidden="true">✦</span>Informasi resmi dalam satu tempat.</p>
			</div>

			<div class="hero-art" role="img" aria-label="Ilustrasi perbukitan dan suasana pagi">
				<div class="hero-art-label"><span class="hero-art-sun"></span><span class="hero-art-hill hero-art-hill-one"></span><span class="hero-art-hill hero-art-hill-two"></span></div>
				<div class="hero-art-card"><span class="eyebrow">SMP Negeri 4</span><strong>Pirime</strong><span>Belajar · Berkarya · Bertumbuh</span></div>
			</div>
		</div>
	</section>

	<section class="quick-links" aria-label="Akses cepat">
		<div class="wrap quick-link-grid">
			<?php
			$quick_links = array(
				array( 'school', 'Profil Sekolah', 'Sejarah, visi misi, dan identitas', 'profil-sekolah', '<path d="M3 21h18M6 21V8l6-4 6 4v13M9 21v-6h6v6M9 10h.01M15 10h.01"/>' ),
				array( 'users', 'Guru & Tenaga Kependidikan', 'Profil pendidik dan staf', 'guru-tenaga-kependidikan', '<path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M10 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM20 8v6M23 11h-6"/>' ),
				array( 'news', 'Berita & Pengumuman', 'Informasi terbaru sekolah', 'berita-pengumuman', '<path d="M4 4h13v16H4zM17 8h3v12h-3M7 8h7M7 12h7M7 16h4"/>' ),
				array( 'trophy', 'Prestasi', 'Pencapaian sekolah', 'prestasi', '<path d="M8 21h8M12 17v4M7 4h10v5a5 5 0 0 1-10 0V4ZM7 6H4v2a4 4 0 0 0 4 4M17 6h3v2a4 4 0 0 1-4 4"/>' ),
				array( 'gallery', 'Galeri', 'Foto dan video kegiatan', 'galeri/galeri-foto', '<rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="8.5" cy="9" r="1.5"/><path d="m21 15-5-5L5 20"/>' ),
				array( 'calendar', 'Agenda Sekolah', 'Jadwal kegiatan sekolah', 'agenda-sekolah', '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18M8 14h.01M12 14h.01M16 14h.01M8 17h.01M12 17h.01"/>' ),
				array( 'cap', 'PPDB / SPMB', 'Informasi penerimaan siswa', 'ppdb-spmb', '<path d="m2 10 10-5 10 5-10 5-10-5ZM6 12v5c3 3 9 3 12 0v-5M22 10v6"/>' ),
				array( 'pin', 'Kontak', 'Alamat dan kanal sekolah', 'kontak', '<path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/>' ),
			);
			foreach ( $quick_links as $quick_link ) :
				?>
				<a class="quick-link" href="<?php echo esc_url( pirime_modern_page_url( $quick_link[3] ) ); ?>">
					<span class="quick-link-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" focusable="false"><?php echo $quick_link[4]; // Static icon paths above are authored in this template. ?></svg></span>
					<span><strong><?php echo esc_html( $quick_link[1] ); ?></strong><small><?php echo esc_html( $quick_link[2] ); ?></small></span>
					<span class="quick-link-arrow" aria-hidden="true">↗</span>
				</a>
			<?php endforeach; ?>
		</div>
	</section>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php if ( trim( get_the_content() ) ) : ?>
			<section class="section home-content">
				<div class="wrap entry-content"><?php the_content(); ?></div>
			</section>
		<?php endif; ?>
	<?php endwhile; ?>

	<section class="section latest-news" id="berita">
		<div class="wrap">
			<div class="section-heading section-heading-row">
				<div><span class="eyebrow">Cerita dan informasi</span><h2>Kabar terbaru dari sekolah</h2><p>Berita, pengumuman, dan kegiatan yang diterbitkan sekolah.</p></div>
				<a class="text-link heading-link" href="<?php echo esc_url( pirime_modern_page_url( 'berita-pengumuman' ) ); ?>">Semua berita <span aria-hidden="true">→</span></a>
			</div>
			<div class="home-information-grid">
				<div class="home-news-column">
					<?php
					$featured_news = new WP_Query(
						array(
							'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 1,
							'ignore_sticky_posts' => true,
						)
					);
					if ( $featured_news->have_posts() ) :
						while ( $featured_news->have_posts() ) :
							$featured_news->the_post();
							?>
							<article class="featured-news-card">
								<a class="featured-news-image" href="<?php the_permalink(); ?>" aria-label="Baca: <?php the_title_attribute(); ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
									<?php else : ?>
										<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/kegiatan-lapangan.webp' ) ); ?>" alt="" loading="lazy" decoding="async">
									<?php endif; ?>
								</a>
								<div class="featured-news-body"><div class="news-meta"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></div><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html( get_the_excerpt() ); ?></p><a class="text-link" href="<?php the_permalink(); ?>">Baca berita <span aria-hidden="true">→</span></a></div>
							</article>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?><div class="featured-news-empty"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/kegiatan-lapangan.webp' ) ); ?>" alt="" loading="lazy"><p>Berita unggulan akan tampil setelah sekolah menerbitkan artikel.</p></div><?php
					endif;
					?>
					<div class="home-news-list">
						<?php
						pirime_modern_post_cards(
							array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 3, 'offset' => 1, 'ignore_sticky_posts' => true ),
							'Berita lainnya akan tampil di sini setelah diterbitkan.'
						);
						?>
					</div>
				</div>
				<aside class="home-agenda-panel" aria-labelledby="home-agenda-title">
					<div class="agenda-panel-heading"><span class="eyebrow">Jadwal sekolah</span><h3 id="home-agenda-title">Agenda</h3></div>
					<?php
					$home_agenda = new WP_Query(
						array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 4, 'category_name' => 'agenda', 'ignore_sticky_posts' => true )
					);
					if ( $home_agenda->have_posts() ) :
						while ( $home_agenda->have_posts() ) :
							$home_agenda->the_post();
							?>
							<a class="agenda-item" href="<?php the_permalink(); ?>"><span class="agenda-date"><strong><?php echo esc_html( get_the_date( 'd' ) ); ?></strong><small><?php echo esc_html( get_the_date( 'M Y' ) ); ?></small></span><span class="agenda-copy"><strong><?php the_title(); ?></strong><small>Informasi agenda · diterbitkan <?php echo esc_html( get_the_date() ); ?></small></span><span class="agenda-arrow" aria-hidden="true">↗</span></a>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?><p class="agenda-empty">Agenda terverifikasi akan tampil di sini setelah diterbitkan.</p><?php
					endif;
					?>
					<a class="text-link" href="<?php echo esc_url( pirime_modern_page_url( 'agenda-sekolah' ) ); ?>">Semua agenda <span aria-hidden="true">→</span></a>
				</aside>
			</div>
		</div>
	</section>

	<section class="section home-media-section">
		<div class="wrap home-media-grid">
			<section class="home-gallery-panel" aria-labelledby="home-gallery-title">
				<div class="section-heading section-heading-row">
					<div><span class="eyebrow">Dokumentasi sekolah</span><h2 id="home-gallery-title">Galeri Kegiatan</h2></div>
					<a class="text-link heading-link" href="<?php echo esc_url( pirime_modern_page_url( 'galeri/galeri-foto' ) ); ?>">Lihat semua <span aria-hidden="true">→</span></a>
				</div>
				<div class="gallery-grid home-gallery-grid">
					<?php foreach ( array_slice( pirime_modern_school_photos(), 8, 4 ) as $school_photo ) : ?>
						<figure class="gallery-item">
							<a href="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $school_photo['file'] ) ); ?>" target="_blank" rel="noopener" aria-label="Buka foto: <?php echo esc_attr( $school_photo['caption'] ); ?>">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $school_photo['file'] ) ); ?>" alt="<?php echo esc_attr( $school_photo['alt'] ); ?>" loading="lazy" decoding="async">
							</a>
							<figcaption><strong><?php echo esc_html( $school_photo['caption'] ); ?></strong><small>Dokumentasi sekolah</small></figcaption>
						</figure>
					<?php endforeach; ?>
				</div>
			</section>

			<section class="home-achievement-panel" aria-labelledby="home-achievement-title">
				<div class="section-heading section-heading-row">
					<div><span class="eyebrow">Pencapaian</span><h2 id="home-achievement-title">Prestasi Terbaru</h2></div>
					<a class="text-link heading-link" href="<?php echo esc_url( pirime_modern_page_url( 'prestasi' ) ); ?>">Lihat semua <span aria-hidden="true">→</span></a>
				</div>
				<div class="achievement-list">
					<?php
					$home_achievements = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 4, 'category_name' => 'prestasi', 'ignore_sticky_posts' => true ) );
					if ( $home_achievements->have_posts() ) :
						while ( $home_achievements->have_posts() ) :
							$home_achievements->the_post();
							?>
							<article class="achievement-item"><span class="achievement-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M8 21h8M12 17v4M7 4h10v5a5 5 0 0 1-10 0V4ZM7 6H4v2a4 4 0 0 0 4 4M17 6h3v2a4 4 0 0 1-4 4"/></svg></span><span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><small><?php echo esc_html( get_the_date() ); ?></small></span></article>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?><p class="agenda-empty">Prestasi sekolah akan tampil setelah informasinya diterbitkan.</p><?php
					endif;
					?>
				</div>
			</section>
		</div>
	</section>

	<section class="section school-intro">
		<div class="wrap school-intro-grid">
			<figure class="school-intro-image">
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/halaman-sekolah.webp' ) ); ?>" alt="Gedung dan halaman SMP Negeri 4 Pirime" loading="lazy" decoding="async">
				<figcaption>Lingkungan SMP Negeri 4 Pirime</figcaption>
			</figure>
			<div class="school-intro-copy">
				<span class="eyebrow">Mengenal sekolah</span>
				<h2>Tentang SMP Negeri 4 Pirime</h2>
				<p>Kenali lingkungan sekolah dan temukan informasi resmi tentang profil, tenaga pendidik, fasilitas, dan kegiatan melalui halaman yang dikelola sekolah.</p>
				<div class="school-info-links">
					<a href="<?php echo esc_url( pirime_modern_page_url( 'profil-sekolah' ) ); ?>"><span aria-hidden="true">✦</span> Profil dan identitas</a>
					<a href="<?php echo esc_url( pirime_modern_page_url( 'guru-tenaga-kependidikan' ) ); ?>"><span aria-hidden="true">✦</span> Guru dan tenaga kependidikan</a>
					<a href="<?php echo esc_url( pirime_modern_page_url( 'profil-sekolah/sarana-prasarana' ) ); ?>"><span aria-hidden="true">✦</span> Sarana dan prasarana</a>
					<a href="<?php echo esc_url( pirime_modern_page_url( 'kontak' ) ); ?>"><span aria-hidden="true">✦</span> Kontak sekolah</a>
				</div>
				<a class="button school-profile-button" href="<?php echo esc_url( pirime_modern_page_url( 'profil-sekolah' ) ); ?>">Selengkapnya <span aria-hidden="true">→</span></a>
			</div>
		</div>
	</section>

	<section class="cta-section">
		<div class="wrap">
			<div class="cta-panel cta-photo-panel">
				<div><span class="eyebrow">Terhubung dengan sekolah</span><h2>Butuh informasi lebih lanjut?</h2><p>Hubungi sekolah melalui kanal resmi yang telah dicantumkan.</p></div>
				<a class="button" href="<?php echo esc_url( pirime_modern_page_url( 'kontak' ) ); ?>">Informasi kontak <span aria-hidden="true">→</span></a>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
