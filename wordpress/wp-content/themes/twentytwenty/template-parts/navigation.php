<?php

/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ($next_post || $prev_post) {

	$pagination_classes = '';

	if (!$next_post) {
		$pagination_classes = ' only-one only-prev';
	} elseif (!$prev_post) {
		$pagination_classes = ' only-one only-next';
	}

?>

	<nav class="pagination-single section-inner<?php echo esc_attr($pagination_classes); ?>" aria-label="<?php esc_attr_e('Post', 'twentytwenty'); ?>">

		<div class="pagination-single-inner">

			<?php
			if ($prev_post) {
			?>
				<style>
					.previous-post {
						color: #000;
					}

					.title {
						font-size: 18px;
						font-weight: 300;
						margin-left: 10%;
					}

					.pagination-single-inner {
						flex-direction: column;
					}

					.arrow {
						font-size: 0.7em;
						font-weight: 500;
						width: 100%;
						min-width: 55px;
						display: table-cell;
						vertical-align: middle;
						margin: 5px 2rem 0 0
					}

					.arrow .arrow-headlinesdm {
						float: left;
						font-family: 'Prata', serif;
						margin-top: -7px;
					}

					.arrow-headlinesday {
						border-bottom: 1px solid #000;
					}

					.arrow .arrow-headlinesyear {
						line-height: 3.5em;
						float: left;
						margin-left: 3px;
						margin-top: -12px;
					}

				</style>
				<a class="previous-post" style="margin-left: 40px ;" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">

					<div class="arrow">
						<div class="arrow-headlinesdm">
							<div class="arrow-headlinesday"><?php echo get_the_date('d', $post_id); ?></div>
							<div class="arrow-headlinesmonth"><?php echo get_the_date('m', $post_id); ?></div>
						</div>
						<div class="arrow-headlinesyear"><?php echo get_the_date('y', $post_id); ?></div>
						<span class="title"  style="margin-left: 167px;"><span class="title-inner"><?php echo wp_kses_post(get_the_title($prev_post->ID)); ?></span></span>
					
					</div>
				
				</a>

				<a class="previous-post" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
					<div class="arrow">
						<div class="arrow-headlinesdm">
							<div class="arrow-headlinesday"><?php echo get_the_date('d', $post_id); ?></div>
							<div class="arrow-headlinesmonth"><?php echo get_the_date('m', $post_id); ?></div>
						</div>
						<div class="arrow-headlinesyear"><?php echo get_the_date('y', $post_id); ?></div>
						<span class="title"><span class="title-inner"><?php echo wp_kses_post(get_the_title($next_post->ID)); ?></span></span>
					</div>
				</a>

			<?php
			}

			if ($next_post) {
			?>

				<a class="next-post" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
					<span class="arrow" aria-hidden="true">&rarr;</span>
					<span class="title"><span class="title-inner"><?php echo wp_kses_post(get_the_title($next_post->ID)); ?></span></span>
				</a>
			<?php
			}
			?>

		</div><!-- .pagination-single-inner -->

	</nav><!-- .pagination-single -->

<?php
}
