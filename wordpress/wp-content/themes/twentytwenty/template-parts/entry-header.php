<?php

/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$entry_header_classes = '';

if (is_singular()) {
	$entry_header_classes .= ' header-footer-group';
}

?>


<header class="<?php if(!is_single()) {echo "entry-header"; }?> <?php echo esc_attr( $entry_header_classes ); ?>">


	<div class="entry-header-inner section-inner medium">

		<?php
		/**
		 * Allow child themes and plugins to filter the display of the categories in the entry header.
		 *
		 * @since Twenty Twenty 1.0
		 *
		 * @param bool Whether to show the categories in header. Default true.
		 */
		$show_categories = apply_filters('twentytwenty_show_categories_in_entry_header', true);


		$has_sidebar_1 = is_active_sidebar('sidebar-1');
		$has_sidebar_2 = is_active_sidebar('sidebar-2');
		if (is_singular()) {
		?>
			<div class="row">
			<div class="col-10 container"><?php the_title( '<div class="conten-name"><h1 class="entry-title">', '</h1></div>' );?></div>
			<div class="col-2" id="date-detail" >
				<div class="item-date-deltail">
				<div class="datetime-detail">

						<div id="date-day-item-detail"><?php the_time( get_the_time( 'd' ) ); ?></div>

						<div>	<?php the_time( get_the_time( 'm' ) ); ?></div>

						</div>

						<div class="date-year-detail">	<?php the_time( get_the_time( 'Y' ) ); ?></div>
						<div class="item-color"></div>
				</div>
			
					
			

			</div>

		<?php


		} else {
			the_title('<h2 id="header-home" class="entry-title heading-size-1"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
		}

		$intro_text_width = '';

		if (is_singular()) {
			$intro_text_width = ' small';
		} else {
			$intro_text_width = ' thin';
		}

		if (has_excerpt() && is_singular()) {
		?>

			<div class="intro-text section-inner max-percentage<?php echo $intro_text_width; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output 
																?>">
				<?php the_excerpt(); ?>
			</div>

		<?php
		}

		// Default to displaying the post meta.

		?>

	</div><!-- .entry-header-inner -->

</header><!-- .entry-header -->