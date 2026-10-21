<?php get_header(); ?>

<main id="main-content" class="content-area">
	<div class="wrap">
		<div class="section-heading archive-heading">
			<span class="eyebrow">SMP Negeri 4 Pirime</span>
			<?php if ( is_search() ) : ?>
				<h1>Hasil pencarian</h1>
				<p>Hasil untuk: <strong><?php echo esc_html( get_search_query() ); ?></strong></p>
			<?php elseif ( is_category() || is_tag() ) : ?>
				<h1><?php the_archive_title(); ?></h1>
				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			<?php elseif ( is_home() ) : ?>
				<h1>Kabar sekolah</h1>
				<p>Berita, pengumuman, dan cerita kegiatan dari SMP Negeri 4 Pirime.</p>
			<?php else : ?>
				<h1><?php the_archive_title(); ?></h1>
			<?php endif; ?>
		</div>

		<?php if ( have_posts() ) : ?>
			<div class="news-grid archive-grid">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<article class="news-card">
						<a class="news-image" href="<?php the_permalink(); ?>" aria-label="Buka: <?php the_title_attribute(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
							<?php else : ?>
								<span class="news-image-placeholder" aria-hidden="true">✦</span>
							<?php endif; ?>
						</a>
						<div class="news-body">
							<div class="news-meta"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></div>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo esc_html( get_the_excerpt() ); ?></p>
							<a class="text-link" href="<?php the_permalink(); ?>">Baca selengkapnya <span aria-hidden="true">→</span></a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => __( 'Sebelumnya', 'pirime-modern' ), 'next_text' => __( 'Berikutnya', 'pirime-modern' ) ) ); ?>
		<?php else : ?>
			<div class="empty-state empty-state-wide">
				<h2>Belum ada informasi untuk ditampilkan.</h2>
				<p>Coba kata pencarian lain atau kembali lagi setelah sekolah menerbitkan informasi.</p>
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
