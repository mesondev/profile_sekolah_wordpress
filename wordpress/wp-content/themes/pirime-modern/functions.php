<?php
/**
 * Theme setup, content structure, and assets for Pirime Modern.
 *
 * @package Pirime_Modern
 */

function pirime_modern_setup() {
	load_theme_textdomain( 'pirime-modern', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Menu Utama', 'pirime-modern' ),
			'footer'  => __( 'Menu Footer', 'pirime-modern' ),
		)
	);
}
add_action( 'after_setup_theme', 'pirime_modern_setup' );

function pirime_modern_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$style_path    = get_stylesheet_directory() . '/style.css';
	$script_path   = get_template_directory() . '/menu.js';

	wp_enqueue_style(
		'pirime-modern-style',
		get_stylesheet_uri(),
		array(),
		file_exists( $style_path ) ? (string) filemtime( $style_path ) : $theme_version
	);
	wp_enqueue_script(
		'pirime-modern-menu',
		get_template_directory_uri() . '/menu.js',
		array(),
		file_exists( $script_path ) ? (string) filemtime( $script_path ) : $theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'pirime_modern_assets' );

function pirime_modern_excerpt_length() {
	return 24;
}
add_filter( 'excerpt_length', 'pirime_modern_excerpt_length' );

function pirime_modern_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'pirime_modern_excerpt_more' );

/**
 * Get a page URL by its path, falling back to the matching site path.
 *
 * @param string $path Page path or slug.
 * @return string
 */
function pirime_modern_page_url( $path ) {
	$page = get_page_by_path( $path );

	return $page ? get_permalink( $page ) : home_url( trailingslashit( $path ) );
}

/**
 * Return the school photos supplied with this project.
 *
 * @return array
 */
function pirime_modern_school_photos() {
	return array(
		array(
			'file'    => 'gedung-sekolah.webp',
			'alt'     => 'Gedung sekolah dengan halaman terbuka',
			'caption' => 'Gedung sekolah',
		),
		array(
			'file'    => 'halaman-sekolah.webp',
			'alt'     => 'Area halaman sekolah dan ruang belajar',
			'caption' => 'Lingkungan sekolah',
		),
		array(
			'file'    => 'pembelajaran-kelas.webp',
			'alt'     => 'Guru dan siswa mengikuti pembelajaran di kelas',
			'caption' => 'Pembelajaran di kelas',
		),
		array(
			'file'    => 'diskusi-kelas.webp',
			'alt'     => 'Siswa berpartisipasi dalam kegiatan belajar',
			'caption' => 'Kegiatan belajar',
		),
		array(
			'file'    => 'upacara-bendera.webp',
			'alt'     => 'Siswa mengikuti upacara bendera',
			'caption' => 'Upacara bendera',
		),
		array(
			'file'    => 'membaca-di-kelas.webp',
			'alt'     => 'Siswa membaca dan belajar di ruang kelas',
			'caption' => 'Membaca di kelas',
		),
		array(
			'file'    => 'belajar-bersama.webp',
			'alt'     => 'Siswa bekerja bersama dalam kegiatan belajar',
			'caption' => 'Belajar bersama',
		),
		array(
			'file'    => 'kegiatan-sekolah.webp',
			'alt'     => 'Siswa berkegiatan di area sekolah',
			'caption' => 'Aktivitas sekolah',
		),
		array(
			'file'    => 'kegiatan-lapangan.webp',
			'alt'     => 'Siswa mengikuti kegiatan bersama di lapangan sekolah',
			'caption' => 'Kegiatan lapangan',
		),
		array(
			'file'    => 'diskusi-luar-kelas.webp',
			'alt'     => 'Siswa berdiskusi bersama di lingkungan sekolah',
			'caption' => 'Diskusi siswa',
		),
		array(
			'file'    => 'pembelajaran-kelas-2.webp',
			'alt'     => 'Kegiatan pembelajaran di ruang kelas',
			'caption' => 'Pembelajaran kelas',
		),
		array(
			'file'    => 'olahraga-sekolah.webp',
			'alt'     => 'Siswa melakukan kegiatan olahraga di sekolah',
			'caption' => 'Olahraga sekolah',
		),
		array(
			'file'    => 'baris-berbaris.webp',
			'alt'     => 'Siswa berbaris mengikuti kegiatan sekolah',
			'caption' => 'Kegiatan bersama',
		),
		array(
			'file'    => 'belajar-proyek.webp',
			'alt'     => 'Siswa mengerjakan kegiatan belajar kelompok',
			'caption' => 'Belajar berbasis proyek',
		),
		array(
			'file'    => 'literasi-perpustakaan.webp',
			'alt'     => 'Siswa membaca dan belajar di perpustakaan',
			'caption' => 'Literasi perpustakaan',
		),
	);
}

/**
 * Render the full navigation when no menu has been assigned in WordPress.
 */
function pirime_modern_fallback_menu() {
	$items = array(
		array( 'Beranda', '', array() ),
		array(
			'Profil Sekolah',
			'profil-sekolah',
			array(
				array( 'Sambutan Kepala Sekolah', 'profil-sekolah/sambutan-kepala-sekolah' ),
				array( 'Sejarah Sekolah', 'profil-sekolah/sejarah-sekolah' ),
				array( 'Visi dan Misi', 'profil-sekolah/visi-misi' ),
				array( 'Identitas Sekolah', 'profil-sekolah/identitas-sekolah' ),
				array( 'Struktur Organisasi', 'profil-sekolah/struktur-organisasi' ),
				array( 'Sarana dan Prasarana', 'profil-sekolah/sarana-prasarana' ),
			)
		),
		array(
			'Guru dan Tenaga Kependidikan',
			'guru-tenaga-kependidikan',
			array(
				array( 'Kepala Sekolah', 'guru-tenaga-kependidikan/kepala-sekolah' ),
				array( 'Guru', 'guru-tenaga-kependidikan/guru' ),
				array( 'Tenaga Kependidikan', 'guru-tenaga-kependidikan/tenaga-kependidikan' ),
			)
		),
		array(
			'Berita dan Pengumuman',
			'berita-pengumuman',
			array(
				array( 'Berita Sekolah', 'berita-pengumuman/berita-sekolah' ),
				array( 'Pengumuman', 'berita-pengumuman/pengumuman' ),
				array( 'Kegiatan Sekolah', 'berita-pengumuman/kegiatan-sekolah' ),
			)
		),
		array( 'Prestasi', 'prestasi', array() ),
		array(
			'Galeri',
			'galeri',
			array(
				array( 'Galeri Foto', 'galeri/galeri-foto' ),
				array( 'Galeri Video', 'galeri/galeri-video' ),
			)
		),
		array( 'Agenda Sekolah', 'agenda-sekolah', array() ),
		array( 'PPDB / SPMB', 'ppdb-spmb', array() ),
		array( 'Kontak', 'kontak', array() ),
	);

	$render_items = function ( $menu_items ) use ( &$render_items ) {
		foreach ( $menu_items as $item ) {
			$label      = $item[0];
			$path       = $item[1];
			$children   = isset( $item[2] ) ? $item[2] : array();
			$page       = $path ? get_page_by_path( $path ) : null;
			$is_current = $page && is_page( $page->ID );
			$classes    = array();

			if ( $children ) {
				$classes[] = 'menu-item-has-children';
			}
			if ( $is_current ) {
				$classes[] = 'current-menu-item';
			}

			echo '<li' . ( $classes ? ' class="' . esc_attr( implode( ' ', $classes ) ) . '"' : '' ) . '>';
			echo '<a href="' . esc_url( $path ? pirime_modern_page_url( $path ) : home_url( '/' ) ) . '"' . ( $is_current ? ' aria-current="page"' : '' ) . '>' . esc_html( $label ) . '</a>';

			if ( $children ) {
				echo '<ul class="sub-menu">';
				$render_items( $children );
				echo '</ul>';
			}

			echo '</li>';
		}
	};

	echo '<ul id="primary-menu-list" class="primary-menu">';
	$render_items( $items );
	echo '</ul>';
}

/**
 * Render a responsive set of post cards.
 *
 * @param array  $query_args Query arguments.
 * @param string $empty_message Message shown when the query has no results.
 * @return void
 */
function pirime_modern_post_cards( $query_args, $empty_message ) {
	$card_query = new WP_Query( $query_args );

	if ( ! $card_query->have_posts() ) {
		echo '<p class="empty-state">' . esc_html( $empty_message ) . '</p>';
		return;
	}

	while ( $card_query->have_posts() ) {
		$card_query->the_post();
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
				<div class="news-meta"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></div>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
				<a class="text-link" href="<?php the_permalink(); ?>">Baca selengkapnya <span aria-hidden="true">→</span></a>
			</div>
		</article>
		<?php
	}

	wp_reset_postdata();
}

/**
 * Assign a hierarchical starter menu if the site has no primary menu yet.
 *
 * @param array $page_ids Page paths mapped to post IDs.
 * @return void
 */
function pirime_modern_create_primary_menu( $page_ids ) {
	$locations  = get_nav_menu_locations();
	$menu      = wp_get_nav_menu_object( 'Menu Utama SMP Negeri 4 Pirime' );
	$menu_id   = $menu ? (int) $menu->term_id : wp_create_nav_menu( 'Menu Utama SMP Negeri 4 Pirime' );
	$menu_items = is_wp_error( $menu_id ) ? array() : wp_get_nav_menu_items( $menu_id );
	if ( is_wp_error( $menu_id ) ) {
		return;
	}

	if ( empty( $menu_items ) ) {
		$menu_tree = array(
			array( 'beranda', array() ),
			array(
				'profil-sekolah',
				array(
					array( 'profil-sekolah/sambutan-kepala-sekolah', array() ),
					array( 'profil-sekolah/sejarah-sekolah', array() ),
					array( 'profil-sekolah/visi-misi', array() ),
					array( 'profil-sekolah/identitas-sekolah', array() ),
					array( 'profil-sekolah/struktur-organisasi', array() ),
					array( 'profil-sekolah/sarana-prasarana', array() ),
				)
			),
			array(
				'guru-tenaga-kependidikan',
				array(
					array( 'guru-tenaga-kependidikan/kepala-sekolah', array() ),
					array( 'guru-tenaga-kependidikan/guru', array() ),
					array( 'guru-tenaga-kependidikan/tenaga-kependidikan', array() ),
				)
			),
			array(
				'berita-pengumuman',
				array(
					array( 'berita-pengumuman/berita-sekolah', array() ),
					array( 'berita-pengumuman/pengumuman', array() ),
					array( 'berita-pengumuman/kegiatan-sekolah', array() ),
				)
			),
			array( 'prestasi', array() ),
			array(
				'galeri',
				array(
					array( 'galeri/galeri-foto', array() ),
					array( 'galeri/galeri-video', array() ),
				)
			),
			array( 'agenda-sekolah', array() ),
			array( 'ppdb-spmb', array() ),
			array( 'kontak', array() ),
		);

		$add_items = function ( $items, $parent_item_id = 0 ) use ( &$add_items, $menu_id, $page_ids ) {
			foreach ( $items as $item ) {
				$path = $item[0];
				if ( ! isset( $page_ids[ $path ] ) ) {
					continue;
				}

				$page = get_post( $page_ids[ $path ] );
				if ( ! $page || 'publish' !== $page->post_status ) {
					continue;
				}

				$menu_item_id = wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'     => get_the_title( $page ),
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $page->ID,
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
						'menu-item-parent-id' => $parent_item_id,
					)
				);

				if ( ! is_wp_error( $menu_item_id ) && ! empty( $item[1] ) ) {
					$add_items( $item[1], $menu_item_id );
				}
			}
		};

		$add_items( $menu_tree );
	}

	$locations['primary'] = (int) $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

/**
 * Create the starter pages and categories once, without overwriting content.
 * The page copy deliberately avoids unverified school facts.
 */
function pirime_modern_seed_site_content() {
	if ( get_option( 'pirime_modern_content_seeded_v2' ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$pages = array(
		'beranda' => array(
			'title'   => 'Beranda',
			'content' => '',
			'parent'  => '',
		),
		'profil-sekolah' => array(
			'title'   => 'Profil Sekolah',
			'content' => 'Kenali identitas, sejarah, visi, misi, dan lingkungan SMP Negeri 4 Pirime. Informasi resmi akan ditampilkan setelah dilengkapi dan diverifikasi oleh pihak sekolah.',
			'parent'  => '',
		),
		'profil-sekolah/sambutan-kepala-sekolah' => array(
			'title'   => 'Sambutan Kepala Sekolah',
			'content' => 'Sambutan resmi kepala sekolah akan ditambahkan setelah naskah dan nama pejabat dikonfirmasi oleh sekolah.',
			'parent'  => 'profil-sekolah',
		),
		'profil-sekolah/sejarah-sekolah' => array(
			'title'   => 'Sejarah Sekolah',
			'content' => 'Riwayat pendirian dan perkembangan sekolah akan dimuat setelah datanya diverifikasi.',
			'parent'  => 'profil-sekolah',
		),
		'profil-sekolah/visi-misi' => array(
			'title'   => 'Visi dan Misi',
			'content' => 'Visi dan misi resmi sekolah akan ditampilkan setelah disahkan dan diperiksa oleh pihak sekolah.',
			'parent'  => 'profil-sekolah',
		),
		'profil-sekolah/identitas-sekolah' => array(
			'title'   => 'Identitas Sekolah',
			'content' => 'Informasi identitas resmi, termasuk alamat dan nomor identitas sekolah, perlu dilengkapi dari sumber resmi sebelum diterbitkan.',
			'parent'  => 'profil-sekolah',
		),
		'profil-sekolah/struktur-organisasi' => array(
			'title'   => 'Struktur Organisasi',
			'content' => 'Struktur organisasi sekolah akan ditampilkan setelah susunan dan nama pejabat dikonfirmasi.',
			'parent'  => 'profil-sekolah',
		),
		'profil-sekolah/sarana-prasarana' => array(
			'title'   => 'Sarana dan Prasarana',
			'content' => 'Informasi fasilitas akan ditambahkan berdasarkan kondisi dan inventaris sekolah yang telah dikonfirmasi.',
			'parent'  => 'profil-sekolah',
		),
		'guru-tenaga-kependidikan' => array(
			'title'   => 'Guru dan Tenaga Kependidikan',
			'content' => 'Daftar tenaga pendidik dan kependidikan akan diterbitkan setelah data serta izin publikasinya diperiksa.',
			'parent'  => '',
		),
		'guru-tenaga-kependidikan/kepala-sekolah' => array(
			'title'   => 'Kepala Sekolah',
			'content' => 'Profil kepala sekolah akan ditambahkan setelah nama, jabatan, dan materi publikasinya dikonfirmasi.',
			'parent'  => 'guru-tenaga-kependidikan',
		),
		'guru-tenaga-kependidikan/guru' => array(
			'title'   => 'Guru',
			'content' => 'Informasi guru dan bidang tugasnya akan ditambahkan setelah daftar resmi sekolah diperiksa.',
			'parent'  => 'guru-tenaga-kependidikan',
		),
		'guru-tenaga-kependidikan/tenaga-kependidikan' => array(
			'title'   => 'Tenaga Kependidikan',
			'content' => 'Informasi tenaga kependidikan akan ditambahkan setelah data dan izin publikasinya diperiksa.',
			'parent'  => 'guru-tenaga-kependidikan',
		),
		'berita-pengumuman' => array(
			'title'   => 'Berita dan Pengumuman',
			'content' => 'Berita, pengumuman, dan kegiatan sekolah akan ditampilkan di halaman ini.',
			'parent'  => '',
		),
		'berita-pengumuman/berita-sekolah' => array(
			'title'   => 'Berita Sekolah',
			'content' => 'Artikel berita sekolah yang telah diperiksa akan ditampilkan di sini.',
			'parent'  => 'berita-pengumuman',
		),
		'berita-pengumuman/pengumuman' => array(
			'title'   => 'Pengumuman',
			'content' => 'Pengumuman resmi sekolah yang masih berlaku akan ditampilkan di sini.',
			'parent'  => 'berita-pengumuman',
		),
		'berita-pengumuman/kegiatan-sekolah' => array(
			'title'   => 'Kegiatan Sekolah',
			'content' => 'Informasi kegiatan sekolah akan diterbitkan setelah waktu dan keterangannya dikonfirmasi.',
			'parent'  => 'berita-pengumuman',
		),
		'prestasi' => array(
			'title'   => 'Prestasi',
			'content' => 'Pencapaian sekolah, siswa, guru, atau tim akan ditampilkan setelah hasil dan dokumentasinya diverifikasi.',
			'parent'  => '',
		),
		'galeri' => array(
			'title'   => 'Galeri',
			'content' => 'Dokumentasi kegiatan dan lingkungan sekolah akan ditampilkan dengan keterangan serta izin publikasi yang sesuai.',
			'parent'  => '',
		),
		'galeri/galeri-foto' => array(
			'title'   => 'Galeri Foto',
			'content' => 'Foto kegiatan yang telah dipilih dan diizinkan untuk dipublikasikan akan ditampilkan di sini.',
			'parent'  => 'galeri',
		),
		'galeri/galeri-video' => array(
			'title'   => 'Galeri Video',
			'content' => 'Video kegiatan dapat ditambahkan melalui sematan dari platform tepercaya setelah izin publikasi diperiksa.',
			'parent'  => 'galeri',
		),
		'agenda-sekolah' => array(
			'title'   => 'Agenda Sekolah',
			'content' => 'Jadwal dan kegiatan yang akan datang akan ditampilkan setelah tanggal, waktu, dan keterangannya dikonfirmasi.',
			'parent'  => '',
		),
		'ppdb-spmb' => array(
			'title'   => 'PPDB / SPMB',
			'content' => 'Informasi penerimaan murid baru akan diperbarui mengikuti jadwal dan ketentuan resmi pada tahun berjalan. Halaman ini bukan formulir pendaftaran daring.',
			'parent'  => '',
		),
		'kontak' => array(
			'title'   => 'Kontak',
			'content' => 'Alamat, nomor telepon, email, jam layanan, dan petunjuk lokasi akan ditampilkan setelah dikonfirmasi sebagai informasi resmi sekolah.',
			'parent'  => '',
		),
		'kebijakan-privasi' => array(
			'title'   => 'Kebijakan Privasi',
			'content' => 'Kebijakan privasi perlu disesuaikan dengan layanan, formulir, dan data yang benar-benar digunakan oleh situs ini sebelum diterbitkan.',
			'parent'  => '',
			'status'  => 'draft',
		),
		'peta-situs' => array(
			'title'   => 'Peta Situs',
			'content' => '',
			'parent'  => '',
		),
		'aksesibilitas' => array(
			'title'   => 'Aksesibilitas',
			'content' => 'Gunakan navigasi keyboard, perbesar tampilan perangkat, atau hubungi sekolah melalui kanal resmi jika Anda memerlukan bantuan mengakses informasi.',
			'parent'  => '',
		),
		'dokumen-unduhan' => array(
			'title'   => 'Dokumen Unduhan',
			'content' => 'Dokumen resmi akan ditambahkan setelah isi, versi, dan izin publikasinya diperiksa.',
			'parent'  => '',
		),
		'ketentuan-penggunaan' => array(
			'title'   => 'Ketentuan Penggunaan',
			'content' => 'Ketentuan penggunaan perlu ditinjau dan disesuaikan dengan kebijakan resmi sekolah sebelum diterbitkan.',
			'parent'  => '',
			'status'  => 'draft',
		),
	);

	$created_pages = array();
	foreach ( $pages as $path => $page_data ) {
		$existing_page = get_page_by_path( $path, OBJECT, 'page' );
		if ( $existing_page ) {
			$created_pages[ $path ] = $existing_page->ID;
			continue;
		}

		$parent_id = 0;
		if ( ! empty( $page_data['parent'] ) && isset( $created_pages[ $page_data['parent'] ] ) ) {
			$parent_id = $created_pages[ $page_data['parent'] ];
		}

		$page_id = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => isset( $page_data['status'] ) ? $page_data['status'] : 'publish',
				'post_title'   => $page_data['title'],
				'post_name'    => basename( $path ),
				'post_content' => $page_data['content'],
				'post_parent'  => $parent_id,
			),
			true
		);

		if ( ! is_wp_error( $page_id ) ) {
			$created_pages[ $path ] = $page_id;
		}
	}

	if ( ! get_option( 'page_on_front' ) && isset( $created_pages['beranda'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $created_pages['beranda'] );
	}

	$categories = array(
		'berita-sekolah'   => 'Berita Sekolah',
		'pengumuman'       => 'Pengumuman',
		'kegiatan-sekolah' => 'Kegiatan Sekolah',
		'prestasi'         => 'Prestasi',
		'agenda'           => 'Agenda',
	);
	foreach ( $categories as $slug => $name ) {
		if ( ! term_exists( $slug, 'category' ) ) {
			wp_insert_term( $name, 'category', array( 'slug' => $slug ) );
		}
	}

	pirime_modern_create_primary_menu( $created_pages );

	update_option( 'pirime_modern_content_seeded_v2', 1 );
}
add_action( 'admin_init', 'pirime_modern_seed_site_content' );
