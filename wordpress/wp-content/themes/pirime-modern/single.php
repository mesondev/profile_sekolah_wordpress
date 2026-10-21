<?php get_header(); ?>

<main id="main-content" class="content-area">
	<div class="wrap">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<nav class="breadcrumbs" aria-label="Lokasi halaman">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
				<span aria-hidden="true">/</span>
				<a href="<?php echo esc_url( pirime_modern_page_url( 'berita-pengumuman' ) ); ?>">Berita dan Pengumuman</a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php the_title(); ?></span>
			</nav>

			<article <?php post_class( 'content-card article-card' ); ?>>
				<header class="article-header">
					<div class="news-meta"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time><?php if ( get_the_author() ) : ?> <span aria-hidden="true">·</span> <?php the_author(); ?><?php endif; ?></div>
					<h1><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?><p class="article-summary"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="article-featured-image"><?php the_post_thumbnail( 'large', array( 'loading' => 'eager' ) ); ?><?php if ( get_the_post_thumbnail_caption() ) : ?><figcaption><?php echo esc_html( get_the_post_thumbnail_caption() ); ?></figcaption><?php endif; ?></figure>
				<?php endif; ?>

				<div class="entry-content"><?php the_content(); ?></div>
				<footer class="article-footer">
					<?php the_category( ', ' ); ?>
					<?php the_post_navigation( array( 'prev_text' => '<span class="nav-subtitle">Sebelumnya</span><span class="nav-title">%title</span>', 'next_text' => '<span class="nav-subtitle">Berikutnya</span><span class="nav-title">%title</span>' ) ); ?>
				</footer>
			</article>
		<?php endwhile; ?>
	</div>
</main>

<?php get_footer(); ?>
