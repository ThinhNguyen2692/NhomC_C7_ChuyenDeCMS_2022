<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">

	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);

		if ( $wp_query->found_posts ) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results. */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'twentytwenty'
				),
				number_format_i18n( $wp_query->found_posts )
			);
		} else {
			$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
		}
	} elseif ( is_archive() && ! have_posts() ) {
		$archive_title = __( 'Nothing Found', 'twentytwenty' );
	} elseif ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ( $archive_title || $archive_subtitle ) {
		?>

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ( $archive_title ) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->
		
		<?php
		}

		if ( have_posts() ) {

			$i = 0;
			?> 
			<div style="padding-top: 100px;" class="row">
			<div class="col-3 index-active">
			
				<?php
				if(!is_search()){ echo "<div class='crossedbg'></div>" ; $has_sidebar_2 = is_active_sidebar( 'sidebar-2' );}
					
					if ( $has_sidebar_2){ 
						?>
							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div>
						<?php
					}
				?>
			</div>
			<div class="col-6">
			<?php
			while ( have_posts() ) {
			$i++;
			if ( $i > 1 ) {
				echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
			}
			the_post();
			?>
			
			<div><?php get_template_part( 'template-parts/content', get_post_type() );	?></div>
			
			<?php 
			
		}
		?>
		</div>
			<div class="col-3">
			
			<?php 	if(!is_search()){ echo "<div class='crossedbg'></div> <div class='item-commets-home'> <div> <h2>Comments</h2> </div>" ; $has_sidebar_4 = is_active_sidebar( 'sidebar-4' );}?>
			
			<?php
					
					if ( $has_sidebar_4){ 
						?>
							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'sidebar-4' ); ?>
							</div>
						<?php
					}
				?>

		</div>
			</div>
		</div>
		
		<?php
	} elseif ( is_search() ) {
		?>

		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'aria_label' => __( 'search again', 'twentytwenty' ),
				)
			);
			?>

		</div><!-- .no-search-results -->

		<?php
	}
	?>

	<?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->


<?php
get_footer();
