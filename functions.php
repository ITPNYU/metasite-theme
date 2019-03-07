<?



function start_wp_head_buffer() {
    ob_start();
}
//add_action('wp_head','start_wp_head_buffer',0);

function end_wp_head_buffer() {
    $in = ob_get_clean();

    // here do whatever you want with the header code
    echo $in; // output the result unless you want to remove it
}
//add_action('wp_head','end_wp_head_buffer', PHP_INT_MAX); //PHP_INT_MAX will ensure this action is called after all other actions that can modify head

function head_content($list){

    var_dump($list);

    return $list;

}

//add_filter('print_styles_array', 'head_content');


// ******************** Crunchify Tips - Clean up WordPress Header START ********************** //
// function crunchify_remove_version() {
// 	return '';
// }
// add_filter('the_generator', 'crunchify_remove_version');
 
//  remove_action('wp_head', 'wp-block-library-css', 10);
// remove_action('wp_head', 'rest_output_link_wp_head', 10);
// remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
// remove_action('template_redirect', 'rest_output_link_header', 11, 0);
 
// remove_action ('wp_head', 'rsd_link');
// remove_action( 'wp_head', 'wlwmanifest_link');
// remove_action( 'wp_head', 'wp_shortlink_wp_head');
 
// function crunchify_cleanup_query_string( $src ){ 
// 	$parts = explode( '?', $src ); 
// 	return $parts[0]; 
// } 
// add_filter( 'script_loader_src', 'crunchify_cleanup_query_string', 15, 1 ); 
// add_filter( 'style_loader_src', 'crunchify_cleanup_query_string', 15, 1 );
// ******************** Clean up WordPress Header END ********************** //


?>