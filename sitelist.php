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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<?php

echo <<<SEARCHBAR
<div class="search-box-wrapper">
		<div class="search-box">
				<label>	
					<input class="search-field" placeholder="Search …" id="searchbar" type="text"> 
				</label>

			</div>
			
			</div>
		<br>
<style id="search_classes"></style>

<script type="text/javascript">
var searchStyle = document.getElementById('search_classes');

document.getElementById('searchbar').addEventListener('input', function() {
	//alert(this.value);
  if (!this.value) { 
    searchStyle.innerHTML = "";
    return;
  }
  // look ma, no indexOf!
  searchStyle.innerHTML = ".searchable_class:not([data-index*=\"" + this.value.toLowerCase() + "\"]) { display: none;}";
  // beware of css injections!
});

</script>

SEARCHBAR;


?>
		
	<div id="primary" class="content-area">


		<div id="content" class="site-content" role="main">

			
			<br>
			<ul class="list-group">
			<?php
				$sites = wp_get_sites(array('public' => true));
				// Start the Loop.
				foreach ( $sites as $site ) {
					$details = get_blog_details( $site["blog_id"], true );
					$lower_for_search = strtolower($details->blogname);
					 ?>
			<li class="list-group-item searchable_class" <?php echo "data-index=\"".$lower_for_search."\""; ?>><a href="<?php echo $site["path"]; ?>"><h4><span class="label label-primary"><?php echo date('Y', strtotime($details->registered)); ?></span>  <span class="label label-success"><?php echo date('Y', strtotime($details->last_updated)); ?></span>  <span class="label label-danger"><?php echo $details->blogname; ?></span></h4></a></li>

				<?php } ?>
			</ul>
			<h4><span class="label label-primary">Created</span>  <span class="label label-success">Last Updated</span>  <span class="label label-danger">Classes</span></h4>
		</div><!-- #content -->

	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
