<?php
/**
 * Template Name: Site List
 * Template for displaying list of all network sites
 *
 * @package ITPNYU
 * @subpackage metasite-theme
 * @since metasite-theme 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<ul>
			<?php
				$sites = wp_get_sites(array('public' => true));
				// Start the Loop.
				foreach ( $sites as $site ) {
					$details = get_blog_details( $site["blog_id"], true );
					 ?>
			<li><a href="<?php echo $site["path"]; ?>"><?php echo $details->blogname; ?></a></li>

				<?php } ?>
			</ul>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
