<?php

class Stla_Addons_Page {

	function __construct() {
		add_action( 'admin_menu', array( $this, 'register_menu' ) );
	}

	public function register_menu() {

		add_submenu_page(  'stla_licenses', 'Add-Ons', 'Add-Ons', 'manage_options', 'stla-addons', array( $this, 'show_addons' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_scripts' ) );


	}

	public function add_scripts() {
		wp_enqueue_style( 'stla-admin-css', GF_STLA_URL.'/css/stla-admin.css' );
	}

	public function show_addons() {

?>
		 <div class="wrap">
		<h2>Addons </h2>
		<p> You can use below addons to extend the functionality of Styles layouts for Gravity Forms</p>
		<br/>
		<div class="stla-extend stla-box">
		<img src="<?php echo GF_STLA_URL; ?>/css/images/widget-sidebar.jpg">
		<h2>Widget & Sidebar</h2>
		<div class="stla-extend-content">
		<p>This addon lets you display styles for Forms which are added using Gravity Forms widget in sidebar</p>
		<div class="stla-extend-buttons">
		<a href="https://wpmonks.com/downloads/widget-sidebar-addon/" class="button-secondary nf-doc-button">Documentation</a>
		<a href="https://wpmonks.com/downloads/widget-sidebar-addon/" title="Conditional Logic" class="button-primary nf-button">Learn More</a>
		</div>
		</div>
		</div> <!-- End Stla Box -->

		<div class="stla-extend stla-box">
		<img src="<?php echo GF_STLA_URL; ?>/css/images/coming-soon.jpg">
		<h2>Coming Soon</h2>
		<div class="stla-extend-content">
		<p>Keep looking for more addons</p>
		<div class="stla-extend-buttons">

		<a href="https://wpmonks.com/styles-and-layouts-for-gravity-forms/" title="Conditional Logic" class="button-primary nf-button">Learn More</a>
		</div>
		</div>
		</div> <!-- End Stla Box -->
		 </div>
	<?php
	}



}

new Stla_Addons_Page();
