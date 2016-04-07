<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
//

/*
 * Tribe EVENTS (TEC/ECP) -- Organizer website link label
 */	
add_filter("tribe_get_organizer_website_link_label", "rewrite_website_link_label");
function rewrite_website_link_label($label){
	return "Go To website"; 
}

	// Make facebook and other links
	

	//
	// Add Author to Projects change capability_type
	//

	add_filter( 'et_project_posttype_args', 'add_author_on_divi_projects' );
	function add_author_on_divi_projects ($args) {
	$args['supports'] = array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields', 'author' );
	$args['capability_type'] = array( 'submission', 'submissions' );
	return $args;
	}

//add author to organizers
add_action( 'init', 'add_author_support_orgs_venues' );

function add_author_support_orgs_venues() {
	if ( ! class_exists( 'TribeEvents' ) ) return;
	add_post_type_support( TribeEvents::VENUE_POST_TYPE, 'author' );
	add_post_type_support( TribeEvents::ORGANIZER_POST_TYPE, 'author' );
}

//change the welcome message
add_filter('gettext', 'change_howdy', 10, 3);
 
function change_howdy($translated, $text, $domain) {
 
    if (!is_admin() || 'default' != $domain)
        return $translated;
 
    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Get in here', $translated);
 
    return $translated;
}


	
// hide categories on month view of calendar
teccc_ignore_slug('character', 'improv', 'musical', 'one-man', 'other', 'sketch', 'stand-up', 'variety', 'idiot', 'clown', 'video');

//Help meta boxes
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;


wp_add_dashboard_widget('custom_help_widget', 'Welcome', 'custom_dashboard_help');
wp_add_dashboard_widget('show_runner_widget', 'Show Runners Support', 'show_runner_help');
wp_add_dashboard_widget('admin_widget', 'Admin Support', 'admin_help');
}

function custom_dashboard_help() {
echo '<p>
<div>
<ul class="dash_list">
	<h2><strong><li>Events Tab</li></strong></h2>
		<ul class="indent_1">
			<u><strong><li>Events</strong></u> - Click here to get a list of your upcoming events.</li>
			<u><strong><li>Organizers</strong></u> - Click here to edit/update info about the host/host team.</li>
		</ul>
	<h2><strong><li>Form Tabs </h2></strong> - All are available without being signed in. Links will be in Facebook group.</li><br><br>
		<ul>
			<u><strong><li>Repair Requests</li></strong></u>
				<ul>
					<li>Please report all repairs here, they tend to get lost in the Facebook feed, it is better to have them all stored in one place. The form can be accessed without being logged in. The link will also be placed in the Facebook group.</li>
				</ul>
			<u><strong><li>One-Off Requests</li></u></strong>
				<ul>
					<li>Please share and use this form to request one-off shows at the theater.</li>
				</ul>
			<u><strong><li>Report Calendar Mistakes</li></strong></u>
				<ul>
					<li>If you see a mistake on the calendar please report it here.</li>
				</ul>
	 		<u><strong><li>Report Website Bugs</li></strong></u>
				<ul>
					<li>If you run into a broken link, missing photos or some other website issue please report it here</li>
				</ul>
		</ul>
	<h2><strong><li>Media Tab</li></strong></h2>
		<ul>
			<li>Manage your images here</li>
			<li>Upload new images here</li>
				<ul>
					<u><strong><li>Follow Naming Rules!</li></u>
					<li id="color_list_item">[Show_Name]-[Image Type].jpg</li></strong>
					<b><li>Image Types</li></b>
						<ul>
							<strong><u><li>MAIN</strong></u> - Main show image (used as ORGANIZER and SUBMISSION if theyre not uploaded).</li>
							<strong><u><li>ORGANIZER</strong></u> - Team photo or whatever.</li>
							<strong><u><li>Submission</strong></u> - Photo for use with submission instructions.</li>
						</ul>
					<li>Images will be re-sized to 450px x 450px.</li>
				</ul>
		</ul>
</ul>
</div>
</p>';
}
function admin_help() {
echo '<p></p>';
}
function show_runner_help() {
echo '<p></p>';
}
?>


<?php
// Custom Login
function my_loginlogo() {
  echo '<style type="text/css">
    h1 a {
      background-image: url(' . get_template_directory_uri() . '/login/tiny_logo_.png) !important;
    }
  </style>';
}
add_action('login_head', 'my_loginlogo');

function my_loginURL() {
    return 'http://www.clubhouseimprov.com';
}
add_filter('login_headerurl', 'my_loginURL');

function my_loginURLtext() {
    return 'Clubhouse Improv';
}
add_filter('login_headertitle', 'my_loginURLtext');

function my_logincustomCSSfile() {
    wp_enqueue_style('login-styles', get_template_directory_uri() . '/login/login-styles.css');
}
add_action('login_enqueue_scripts', 'my_logincustomCSSfile');

//Change Venues tag
add_filter('tribe_venue_label_singular', 'change_single_venue_label' );
function change_single_venue_label() {
    return 'Stage';
}
  
add_filter('tribe_venue_label_plural', 'change_plural_venue_label' );
function change_plural_venue_label() {
    return 'Stages';
}
  
add_filter('tribe_organizer_label_singular', 'change_single_organizer_label' );
function change_single_organizer_label() {
    return 'Host';
}
  
add_filter('tribe_organizer_label_plural', 'change_plural_organizer_label' );
function change_plural_organizer_label() {
    return 'Hosts';
}

?>