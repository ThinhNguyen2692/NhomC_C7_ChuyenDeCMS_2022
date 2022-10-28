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

<header class="entry-header <?php echo esc_attr($entry_header_classes); ?>">

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
				<div class="col-3 index-active">

					<h2>Recent Post</h2>
					<div class="crossedbg"></div>
					<ul style="list-style: none" class="recent_post">

						<?php
						// $args = array( 'numberposts' => '5' );
						$recent_posts = wp_get_recent_posts();
						foreach ($recent_posts as $recent) {
							echo '<li class="category-icon"><a class="category-text" href="' . get_permalink($recent["ID"]) . '" title="Look ' . esc_attr($recent["post_title"]) . '" >' .   $recent["post_title"] . '</a> </li> ';
						}
						?>
					</ul>

				</div>
				<div class="col-6"><?php the_title('<div class="conten-name"><h1 class="entry-title">', '</h1></div>'); ?></div>

				<div class="col-3 index-active">

					<h2>Categories</h2>
					<div class="crossedbg"></div>
					<ul style="list-style: none" class="recent_post">
						<?php $categories = get_categories();
						foreach ($categories as $category) {
							echo '<li class="category-icon"><a class="category-text" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
						} ?>

					</ul>

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