<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eximious_Magazine
 */

get_header();
$archive_style = eximious_magazine_get_option('archive_style');
set_query_var( 'archive_style', $archive_style );
?>
<div class="container">
	<div id="primary" class="content-area <?php echo esc_attr($archive_style);?>">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

            eximious_magazine_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	$page_layout = eximious_magazine_get_page_layout();
	if ('no-sidebar' != $page_layout) {
	    get_sidebar();
	}
	?>
</div>
<?php
get_footer();