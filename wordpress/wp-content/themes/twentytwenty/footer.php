<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
$has_sidebar_3 = is_active_sidebar( 'sidebar-3' );
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<footer id="site-footer" class="header-footer-group demo-vui">

<!------ Include the above in your HEAD tag ---------->

<!-- Footer -->
<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
			<?php if ( $has_sidebar_1 || $has_sidebar_2|| $has_sidebar_3 ) { ?>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<?php if ( $has_sidebar_1 ) { ?>
<div class="footer-widgets column-one grid-item">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>	
<?php } ?>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<?php if ( $has_sidebar_2 ) { ?>
<div class="footer-widgets column-two grid-item">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div>
<?php } ?>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
				<?php if ( $has_sidebar_3 ) { ?>

<div class="footer-widgets column-three grid-item">
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
</div>

<?php } ?>
					
				</div>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
					<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
				</div>
				<hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->
				
				
			
				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
