<?php
/**
 * Template Name: Site List W3
 * Template for displaying list of all network sites
 *
 * @package ITPNYU
 * @subpackage metasite-theme
 * @since metasite-theme 1.0
 */

//require_once("https://itp.nyu.edu/classes/wp-load.php");

//get_header(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>ITP Classes</title>
<? //wp_head();?>
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
<link rel="stylesheet" href="https://itp.nyu.edu/classes/wp-content/themes/metasite-theme/w3.css">
<link rel="stylesheet" href="https://itp.nyu.edu/classes/wp-content/themes/metasite-theme/w3-theme-deep-purple.css">
<link rel="stylesheet" type="text/css" href="//cloud.typography.com/7436432/657448/css/fonts.css"/>
<link rel="stylesheet" href="//fonts.typotheque.com/WF-024077-007717.css" type="text/css"/>
<link rel="stylesheet" href="https://tisch.nyu.edu/etc/designs/tisch/global.min.css"/>
<style>

/* WCAG fix*/

	body:focus {
	    outline: #000000;
	}

.page-id-3892 .top_bar {
	display: none;
}

.global-nav {
  width: 100%;
  height: 40px;
  background-color: #57068c;
  overflow: hidden;
  position: relative;
  z-index: 1000;
}

.global-nav-row {
  width: 100%;
  /*margin-left: 75px;*/
  margin-left: 50px;
  margin-right: auto;
  margin-top: 0;
  margin-bottom: 0;
  max-width: 830px;
}

.global-nav__logo {
  float: left;
  margin: 5px 0 0;
  width: 224px;
  height: 30px;
  background-image: url('https://itp.nyu.edu/ranch/projects/img/logo_nyu-tisch_white.svg');
}

.list-group-item.searchable_class:focus-within {
	/* background: #000000; */
	/* outline: 1px dotted #212121; */
 outline: 5px auto -webkit-focus-ring-color;

}


		</style>
</head>
<body>

<!-- <div class="global-nav">
	<div class="row">
		<div class="small-13 small-centered columns">
			<a claslass="global-nav__search-trigger"></a>
			<a class="global-nav__logo" href="/" title="NYU | Tisch Homepage">ITP</a>
		</div>
	</div>
</div> style="position: fixed;"-->

<div id="after_body_tag" class="global-nav" >
  			<div class="row global-nav-row">
	  			<a class="global-nav__logo" href="https://itp.nyu.edu" title="NYU | Tisch Homepage" aria-label="Link to Tisch Homepage"></a>
  			</div>
		</div>


<section class="region-header headroom headroom--top">

			<div class="wrapper">
				<ul class="main-nav">


<li class="x-toplevel"><a href="/">About <br>ITP</a></li>
<li class="x-toplevel"><a href="https://itp.nyu.edu/classes">ITP Courses</a></li>
<li class="x-toplevel"><a href="https://itp.nyu.edu/itp/people">ITP People</a></li>
<li class="x-toplevel"><a href="https://itp.nyu.edu/ranch/projects">ITP Projects</a></li>

</ul>
		</div>
</section>

<a class="head-hl section-title" href="/itp">ITP<div></div></a>
<h1>ITP Classes</h1>

	<div id="primary" class="content-area w3-content">


		<div id="content" class="site-content" role="main">

			<br>
			<ul class="list-group w3-ul w3-card-4 w3-hoverable">

<?php

echo <<<SEARCHBAR
<div class="search-box-wrapper">
		<div class="search-box">

					<input class="search-field w3-input w3-card-4" placeholder="Search classes" id="searchbar" type="text" aria-label="Search classes">


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

	<!-- <h1>ITP Classes</h1>

	<div id="primary" class="content-area w3-content">


		<div id="content" class="site-content" role="main"> -->


			<!-- <br>
			<ul class="list-group w3-ul w3-card-4 w3-hoverable"> -->
			<?php

				$sites = get_sites(array('public' => 1,'orderby'=>'last_updated', 'order'=>'DESC'));

				// Start the Loop.
				foreach ( $sites as $site ) {
					//print_r($site);
					if ($site->blog_id == 1) continue;
					$details = get_blog_details( $site->blog_id);
					$lower_for_search = strtolower($details->blogname);
					 ?>
			<li class="list-group-item searchable_class" <?php echo "data-index=\"".$lower_for_search."\""; ?>><a href="<?php echo $site->path; ?>"><h4><!-- <span class="label label-primary w3-tag w3-xlarge w3-padding w3-red" style="transform:rotate(-5deg)"><?php //echo date('Y', strtotime($details->registered)); ?></span> -->  <span class="label label-success w3-tag w3-xlarge w3-padding w3-theme-d3" style="transform:rotate(-5deg)"><?php echo date('Y', strtotime($details->last_updated)); ?></span>  <span class="label label-danger w3-text-theme"><?php echo $details->blogname;  ?></span></h4></a><?php echo " since ". date('Y', strtotime($details->registered)); ?></li>

				<?php } ?>
			</ul>
			<h4><!-- <span class="label label-primary">Created</span>  <span class="label label-success">Last Updated</span>   --><span class="label label-danger">ITP Classes</span></h4>
		</div><!-- #content -->

	</div><!-- #primary -->

</body>
</html>


<?php
//get_sidebar( 'content' );
//get_sidebar();
//get_footer();
