<?php
get_header();

$page_id   = get_queried_object_id();
$page_slug = get_post_field( 'post_name', $page_id );
$parent_id = wp_get_post_parent_id( $page_id );
$children  = get_pages(
	array(
		'parent'      => $page_id,
		'sort_column' => 'menu_order,post_title',
		'sort_order'  => 'ASC',
	)
);

$category_by_slug = array(
	'berita-sekolah'   => 'berita-sekolah',
	'pengumuman'       => 'pengumuman',
	'kegiatan-sekolah' => 'kegiatan-sekolah',
	'prestasi'         => 'prestasi',
	'agenda-sekolah'   => 'agenda',
);
$post_query_args = null;
if ( 'berita-pengumuman' === $page_slug ) {
	$post_query_args = array();
} elseif ( isset( $category_by_slug[ $page_slug ] ) ) {
	$post_query_args = array( 'category_name' => $category_by_slug[ $page_slug ] );
}
?>

<main id="main-content" class="content-area">
	<div class="wrap">
		<?php if ( $parent_id ) : ?>
			<nav class="breadcrumbs" aria-label="Lokasi halaman">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
				<span aria-hidden="true">/</span>
				<a href="<?php echo esc_url( get_permalink( $parent_id ) ); ?>"><?php echo esc_html( get_the_title( $parent_id ) ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php the_title(); ?></span>
			</nav>
		<?php endif; ?>

		<article class="content-card">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<span class="eyebrow">SMP Negeri 4 Pirime</span>
				<h1><?php the_title(); ?></h1>
				<div class="entry-content"><?php the_content(); ?></div>
			<?php endwhile; ?>
		</article>

		<?php if ( 'profil-sekolah' === $page_slug ) : ?>
			<section class="school-profile-photo" aria-label="Lingkungan sekolah">
				<figure class="school-profile-photo-image">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/halaman-sekolah.webp' ) ); ?>" alt="Lingkungan dan bangunan SMP Negeri 4 Pirime" loading="lazy" decoding="async">
					<figcaption>Lingkungan SMP Negeri 4 Pirime</figcaption>
				</figure>
				<div class="school-profile-photo-copy"><span class="eyebrow">Profil sekolah</span><h2>Kenali lingkungan dan informasi sekolah</h2><p>Jelajahi halaman profil untuk membaca informasi resmi yang dikelola sekolah.</p><?php if ( $children ) : ?><a class="text-link" href="<?php echo esc_url( get_permalink( $children[0] ) ); ?>">Lihat informasi profil <span aria-hidden="true">→</span></a><?php endif; ?></div>
			</section>
		<?php endif; ?>

		<?php if ( $children ) : ?>
			<section class="child-pages" id="informasi-terkait" aria-label="Halaman terkait">
				<div class="section-heading compact-heading"><span class="eyebrow">Jelajahi bagian ini</span><h2>Informasi terkait</h2></div>
				<div class="child-page-grid">
					<?php foreach ( $children as $child_page ) : ?>
						<a class="child-page-card" href="<?php echo esc_url( get_permalink( $child_page ) ); ?>">
							<span class="child-page-card-icon" aria-hidden="true">↗</span>
							<strong><?php echo esc_html( get_the_title( $child_page ) ); ?></strong>
							<span>Pelajari informasi lebih lanjut</span>
						</a>
					<?php endforeach; ?>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( is_page( 'galeri-foto' ) ) : ?>
			<section class="gallery-section" aria-label="Foto sekolah">
				<div class="section-heading compact-heading"><span class="eyebrow">Dokumentasi sekolah</span><h2>Galeri foto</h2><p>Dokumentasi lingkungan dan kegiatan sekolah.</p></div>
				<div class="gallery-grid">
					<?php foreach ( pirime_modern_school_photos() as $school_photo ) : ?>
						<figure class="gallery-item">
							<a href="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $school_photo['file'] ) ); ?>" target="_blank" rel="noopener" aria-label="Buka foto: <?php echo esc_attr( $school_photo['caption'] ); ?>">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $school_photo['file'] ) ); ?>" alt="<?php echo esc_attr( $school_photo['alt'] ); ?>" loading="lazy" decoding="async">
							</a>
							<figcaption><?php echo esc_html( $school_photo['caption'] ); ?></figcaption>
						</figure>
					<?php endforeach; ?>
					<?php
					$gallery_query = new WP_Query(
						array(
							'post_type'      => 'attachment',
							'post_status'    => 'inherit',
							'post_mime_type' => 'image',
							'post_parent'    => $page_id,
							'posts_per_page' => 12,
							'orderby'        => 'date',
							'order'          => 'DESC',
						)
					);
					if ( $gallery_query->have_posts() ) :
						while ( $gallery_query->have_posts() ) :
							$gallery_query->the_post();
							?>
							<figure class="gallery-item">
								<a href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>">
									<?php echo wp_get_attachment_image( get_the_ID(), 'medium_large', false, array( 'loading' => 'lazy' ) ); ?>
								</a>
								<figcaption><?php echo esc_html( get_the_title() ); ?></figcaption>
							</figure>
							<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( 'peta-situs' === $page_slug ) : ?>
			<nav class="sitemap-list" aria-label="Peta situs">
				<ul><?php wp_list_pages( array( 'title_li' => '', 'sort_column' => 'menu_order,post_title' ) ); ?></ul>
			</nav>
		<?php endif; ?>

		<?php if ( is_array( $post_query_args ) ) : ?>
			<section class="page-posts" aria-label="Artikel terkait">
				<div class="section-heading compact-heading">
					<span class="eyebrow">Informasi sekolah</span>
					<h2><?php echo 'berita-pengumuman' === $page_slug ? 'Berita dan pengumuman terbaru' : esc_html( get_the_title() ); ?></h2>
				</div>
				<div class="news-grid">
					<?php
					$current_page = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
					$page_posts   = new WP_Query(
						array_merge(
							$post_query_args,
							array(
								'post_type'           => 'post',
								'post_status'         => 'publish',
								'posts_per_page'      => 9,
								'paged'               => $current_page,
								'ignore_sticky_posts' => true,
							)
						)
					);

					if ( $page_posts->have_posts() ) :
						while ( $page_posts->have_posts() ) :
							$page_posts->the_post();
							?>
							<article class="news-card">
								<a class="news-image" href="<?php the_permalink(); ?>" aria-label="Buka: <?php the_title_attribute(); ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
									<?php else : ?>
										<span class="news-image-placeholder" aria-hidden="true">✦</span>
									<?php endif; ?>
								</a>
								<div class="news-body">
									<div class="news-meta"><span><?php echo 'agenda-sekolah' === $page_slug ? esc_html__( 'Informasi diterbitkan', 'pirime-modern' ) : esc_html__( 'Tanggal terbit', 'pirime-modern' ); ?></span> <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></div>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p><?php echo esc_html( get_the_excerpt() ); ?></p>
									<a class="text-link" href="<?php the_permalink(); ?>">Baca selengkapnya <span aria-hidden="true">→</span></a>
								</div>
							</article>
							<?php
						endwhile;

						if ( $page_posts->max_num_pages > 1 ) {
							echo '<nav class="pagination" aria-label="Halaman artikel">';
							echo wp_kses_post(
								paginate_links(
									array(
										'total'     => $page_posts->max_num_pages,
										'current'   => $current_page,
										'type'      => 'list',
										'prev_text' => __( 'Sebelumnya', 'pirime-modern' ),
										'next_text' => __( 'Berikutnya', 'pirime-modern' ),
									)
								)
							);
							echo '</nav>';
						}
						wp_reset_postdata();
					else :
						?>
						<p class="empty-state">Belum ada konten yang diterbitkan pada bagian ini. Informasi akan ditampilkan setelah diperiksa oleh sekolah.</p>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
