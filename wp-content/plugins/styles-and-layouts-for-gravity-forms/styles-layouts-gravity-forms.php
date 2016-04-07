<?php
/*
Plugin Name: Styles & Layouts Gravity Forms
Plugin URI:  http://wpmonks.com/styles-layouts-gravity-forms
Description: Create beautiful styles for your gravity forms
Version:     1.2
Author:      Sushil Kumar
Author URI:  http://wpmonks.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// don't load directly
if ( !defined( 'ABSPATH' ) ) die( '-1' );

define( "GF_STLA_DIR", WP_PLUGIN_DIR . "/" . basename( dirname( __FILE__ ) ) );
define( "GF_STLA_URL", plugins_url() . "/" . basename( dirname( __FILE__ ) ) );
define ("GF_STLA_STORE_URL","https://wpmonks.com");

if ( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {
	include_once GF_STLA_DIR.'/admin-menu/EDD_SL_Plugin_Updater.php';
}

include_once GF_STLA_DIR.'/admin-menu/licenses.php';
include_once GF_STLA_DIR.'/admin-menu/addons.php';

//Main class of Styles & layouts Gravity Forms
class Gravity_customizer_admin {

	public $all_found_forms_ids=array();
	/**
	 *  method for all hooks
	 *
	 * @author Sushil Kumar
	 * @since  v1.0
	 */
	function __construct() {
		add_action( 'wp', array( $this, 'get_gravity_forms_shortcode' ) );
		add_action( 'wp_head', array( $this, 'gf_stla_add_css_to_frontend' ) );
		add_action( 'customize_register', array( $this, 'gf_stla_customize_register' ) ) ;
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'gf_stla_autosave_form' ) );
		add_action( 'customize_preview_init', array( $this, 'gf_stla_live_preview' ) );
		$this->all_found_forms_ids = '';
	}

	function gf_stla_add_css_to_frontend() {
		if ( !empty( $this->all_found_forms_ids ) ) {
			$number_of_forms = count( $this->all_found_forms_ids );
			for ( $i=0; $i<$number_of_forms; $i++ ) {
				$current_selected_form_id = 'gf_stla_form_id_'.$this->all_found_forms_ids[$i];
				$get_style_options = get_option( $current_selected_form_id );
				if ( !empty( $get_style_options ) ) {
					$css_form_id = $this->all_found_forms_ids[$i];
					$main_class_object = $this;
					include 'display/class-styles.php';

				}
			}
		}
		do_action( 'gf_stla_after_post_style_display', $this );
	}

	/**
	 *  find all gravity forms in post_content using regex
	 *
	 * @author Sushil Kumar
	 * @since  v1.0
	 * @return [null]
	 */

	function get_gravity_forms_shortcode() {
		global $post;
		$pattern = get_shortcode_regex();
		$pos = -1;                                                                // to track current position of $matches[2] in for each loop
		$found_pos = 0;
		preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches );

		foreach ( $matches[2] as $all_shortcodes ) {                                //$matches[2] containes all shortcodes in array like gravityform, gallery etc
			$pos = $pos+1;

			if ( $all_shortcodes == 'gravityform' ) {
				$exploded_shortcode = explode( '="', $matches[3][$pos] );             //first explode gravity forms parameters using ="
				$quote_explode = explode( '"', $exploded_shortcode[1] );              //now explode gravity forms parameters using "
				$this->all_found_forms_ids[$found_pos] = $quote_explode[0];                    // storing form id in array
				$found_pos++;

			}
		}
	}
	/**
	 *  enqueue js file that autosaves the form selection in database
	 *
	 * @author Sushil Kumar
	 * @since  v1.0
	 * @return null
	 */
	function gf_stla_autosave_form() {

		wp_enqueue_script( 'gf_stla_auto_save_form', GF_STLA_URL. '/js/auto-save-form.js', array( 'jquery' ), '', true );

	}

	/**
	 *  shows live preview of css changes
	 *
	 * @author Sushil Kumar
	 * @since  v1.0
	 * @return null
	 */
	function gf_stla_live_preview() {
		wp_enqueue_script( 'gf_stla_show_live_changes', GF_STLA_URL. '/js/live-preview-changes.js', array( 'jquery', 'customize-preview' ), '', true );

	}

	/**
	 *  Function that adds panels, sections, settings and controls
	 *
	 * @author Sushil Kumar
	 * @since  v1.0
	 * @param main    wp customizer object
	 * @return null
	 */

	function gf_stla_customize_register( $wp_customize ) {

		$current_form_id = get_option( 'gf_stla_select_form_id' );
		$border_types = array( "solid" =>"Solid", "dotted"=> "Dotted", "dashed"=> "Dashed", "double"=> "Double", "groove"=> "Groove", "ridge"=> "Ridge", "inset"=> "Inset", "outset"=> "Outset" );
		$align_pos =array( "left" =>"Left", "center" => "Center", "justify" => "Justify", "right" => "Right", );
		//$font_collection = array("ABeeZee" => "ABeeZee","Abel" => "Abel","Abril+Fatface" => "Abril Fatface","Aclonica" => "Aclonica","Acme" => "Acme","Actor" => "Actor","Adamina" => "Adamina","Advent+Pro" => "Advent Pro","Aguafina+Script" => "Aguafina Script","Akronim" => "Akronim","Aladin" => "Aladin","Aldrich" => "Aldrich","Alef" => "Alef","Alegreya" => "Alegreya","Alegreya+SC" => "Alegreya SC","Alegreya+Sans" => "Alegreya Sans","Alegreya+Sans+SC" => "Alegreya Sans SC","Alex+Brush" => "Alex Brush","Alfa+Slab+One" => "Alfa Slab One","Alice" => "Alice","Alike" => "Alike","Alike+Angular" => "Alike Angular","Allan" => "Allan","Allerta" => "Allerta","Allerta+Stencil" => "Allerta Stencil","Allura" => "Allura","Almendra" => "Almendra","Almendra+Display" => "Almendra Display","Almendra+SC" => "Almendra SC","Amarante" => "Amarante","Amaranth" => "Amaranth","Amatic+SC" => "Amatic SC","Amethysta" => "Amethysta","Amiri" => "Amiri","Amita" => "Amita","Anaheim" => "Anaheim","Andada" => "Andada","Andika" => "Andika","Angkor" => "Angkor","Annie+Use+Your+Telescope" => "Annie Use Your Telescope","Anonymous+Pro" => "Anonymous Pro","Antic" => "Antic","Antic+Didone" => "Antic Didone","Antic+Slab" => "Antic Slab","Anton" => "Anton","Arapey" => "Arapey","Arbutus" => "Arbutus","Arbutus+Slab" => "Arbutus Slab","Architects+Daughter" => "Architects Daughter","Archivo+Black" => "Archivo Black","Archivo+Narrow" => "Archivo Narrow","Arimo" => "Arimo","Arizonia" => "Arizonia","Armata" => "Armata","Artifika" => "Artifika","Arvo" => "Arvo","Arya" => "Arya","Asap" => "Asap","Asar" => "Asar","Asset" => "Asset","Astloch" => "Astloch","Asul" => "Asul","Atomic+Age" => "Atomic Age","Aubrey" => "Aubrey","Audiowide" => "Audiowide","Autour+One" => "Autour One","Average" => "Average","Average+Sans" => "Average Sans","Averia+Gruesa+Libre" => "Averia Gruesa Libre","Averia+Libre" => "Averia Libre","Averia+Sans+Libre" => "Averia Sans Libre","Averia+Serif+Libre" => "Averia Serif Libre","Bad+Script" => "Bad Script","Balthazar" => "Balthazar","Bangers" => "Bangers","Basic" => "Basic","Battambang" => "Battambang","Baumans" => "Baumans","Bayon" => "Bayon","Belgrano" => "Belgrano","Belleza" => "Belleza","BenchNine" => "BenchNine","Bentham" => "Bentham","Berkshire+Swash" => "Berkshire Swash","Bevan" => "Bevan","Bigelow+Rules" => "Bigelow Rules","Bigshot+One" => "Bigshot One","Bilbo" => "Bilbo","Bilbo+Swash+Caps" => "Bilbo Swash Caps","Biryani" => "Biryani","Bitter" => "Bitter","Black+Ops+One" => "Black Ops One","Bokor" => "Bokor","Bonbon" => "Bonbon","Boogaloo" => "Boogaloo","Bowlby+One" => "Bowlby One","Bowlby+One+SC" => "Bowlby One SC","Brawler" => "Brawler","Bree+Serif" => "Bree Serif","Bubblegum+Sans" => "Bubblegum Sans","Bubbler+One" => "Bubbler One","Buda" => "Buda","Buenard" => "Buenard","Butcherman" => "Butcherman","Butterfly+Kids" => "Butterfly Kids","Cabin" => "Cabin","Cabin+Condensed" => "Cabin Condensed","Cabin+Sketch" => "Cabin Sketch","Caesar+Dressing" => "Caesar Dressing","Cagliostro" => "Cagliostro","Calligraffitti" => "Calligraffitti","Cambay" => "Cambay","Cambo" => "Cambo","Candal" => "Candal","Cantarell" => "Cantarell","Cantata+One" => "Cantata One","Cantora+One" => "Cantora One","Capriola" => "Capriola","Cardo" => "Cardo","Carme" => "Carme","Carrois+Gothic" => "Carrois Gothic","Carrois+Gothic+SC" => "Carrois Gothic SC","Carter+One" => "Carter One","Catamaran" => "Catamaran","Caudex" => "Caudex","Caveat" => "Caveat","Caveat+Brush" => "Caveat Brush","Cedarville+Cursive" => "Cedarville Cursive","Ceviche+One" => "Ceviche One","Changa+One" => "Changa One","Chango" => "Chango","Chau+Philomene+One" => "Chau Philomene One","Chela+One" => "Chela One","Chelsea+Market" => "Chelsea Market","Chenla" => "Chenla","Cherry+Cream+Soda" => "Cherry Cream Soda","Cherry+Swash" => "Cherry Swash","Chewy" => "Chewy","Chicle" => "Chicle","Chivo" => "Chivo","Chonburi" => "Chonburi","Cinzel" => "Cinzel","Cinzel+Decorative" => "Cinzel Decorative","Clicker+Script" => "Clicker Script","Coda" => "Coda","Coda+Caption" => "Coda Caption","Codystar" => "Codystar","Combo" => "Combo","Comfortaa" => "Comfortaa","Coming+Soon" => "Coming Soon","Concert+One" => "Concert One","Condiment" => "Condiment","Content" => "Content","Contrail+One" => "Contrail One","Convergence" => "Convergence","Cookie" => "Cookie","Copse" => "Copse","Corben" => "Corben","Courgette" => "Courgette","Cousine" => "Cousine","Coustard" => "Coustard","Covered+By+Your+Grace" => "Covered By Your Grace","Crafty+Girls" => "Crafty Girls","Creepster" => "Creepster","Crete+Round" => "Crete Round","Crimson+Text" => "Crimson Text","Croissant+One" => "Croissant One","Crushed" => "Crushed","Cuprum" => "Cuprum","Cutive" => "Cutive","Cutive+Mono" => "Cutive Mono","Damion" => "Damion","Dancing+Script" => "Dancing Script","Dangrek" => "Dangrek","Dawning+of+a+New+Day" => "Dawning of a New Day","Days+One" => "Days One","Dekko" => "Dekko","Delius" => "Delius","Delius+Swash+Caps" => "Delius Swash Caps","Delius+Unicase" => "Delius Unicase","Della+Respira" => "Della Respira","Denk+One" => "Denk One","Devonshire" => "Devonshire","Dhurjati" => "Dhurjati","Didact+Gothic" => "Didact Gothic","Diplomata" => "Diplomata","Diplomata+SC" => "Diplomata SC","Domine" => "Domine","Donegal+One" => "Donegal One","Doppio+One" => "Doppio One","Dorsa" => "Dorsa","Dosis" => "Dosis","Dr+Sugiyama" => "Dr Sugiyama","Droid+Sans" => "Droid Sans","Droid+Sans+Mono" => "Droid Sans Mono","Droid+Serif" => "Droid Serif","Duru+Sans" => "Duru Sans","Dynalight" => "Dynalight","EB+Garamond" => "EB Garamond","Eagle+Lake" => "Eagle Lake","Eater" => "Eater","Economica" => "Economica","Eczar" => "Eczar","Ek+Mukta" => "Ek Mukta","Electrolize" => "Electrolize","Elsie" => "Elsie","Elsie+Swash+Caps" => "Elsie Swash Caps","Emblema+One" => "Emblema One","Emilys+Candy" => "Emilys Candy","Engagement" => "Engagement","Englebert" => "Englebert","Enriqueta" => "Enriqueta","Erica+One" => "Erica One","Esteban" => "Esteban","Euphoria+Script" => "Euphoria Script","Ewert" => "Ewert","Exo" => "Exo","Exo+2" => "Exo 2","Expletus+Sans" => "Expletus Sans","Fanwood+Text" => "Fanwood Text","Fascinate" => "Fascinate","Fascinate+Inline" => "Fascinate Inline","Faster+One" => "Faster One","Fasthand" => "Fasthand","Fauna+One" => "Fauna One","Federant" => "Federant","Federo" => "Federo","Felipa" => "Felipa","Fenix" => "Fenix","Finger+Paint" => "Finger Paint","Fira+Mono" => "Fira Mono","Fira+Sans" => "Fira Sans","Fjalla+One" => "Fjalla One","Fjord+One" => "Fjord One","Flamenco" => "Flamenco","Flavors" => "Flavors","Fondamento" => "Fondamento","Fontdiner+Swanky" => "Fontdiner Swanky","Forum" => "Forum","Francois+One" => "Francois One","Freckle+Face" => "Freckle Face","Fredericka+the+Great" => "Fredericka the Great","Fredoka+One" => "Fredoka One","Freehand" => "Freehand","Fresca" => "Fresca","Frijole" => "Frijole","Fruktur" => "Fruktur","Fugaz+One" => "Fugaz One","GFS+Didot" => "GFS Didot","GFS+Neohellenic" => "GFS Neohellenic","Gabriela" => "Gabriela","Gafata" => "Gafata","Galdeano" => "Galdeano","Galindo" => "Galindo","Gentium+Basic" => "Gentium Basic","Gentium+Book+Basic" => "Gentium Book Basic","Geo" => "Geo","Geostar" => "Geostar","Geostar+Fill" => "Geostar Fill","Germania+One" => "Germania One","Gidugu" => "Gidugu","Gilda+Display" => "Gilda Display","Give+You+Glory" => "Give You Glory","Glass+Antiqua" => "Glass Antiqua","Glegoo" => "Glegoo","Gloria+Hallelujah" => "Gloria Hallelujah","Goblin+One" => "Goblin One","Gochi+Hand" => "Gochi Hand","Gorditas" => "Gorditas","Goudy+Bookletter+1911" => "Goudy Bookletter 1911","Graduate" => "Graduate","Grand+Hotel" => "Grand Hotel","Gravitas+One" => "Gravitas One","Great+Vibes" => "Great Vibes","Griffy" => "Griffy","Gruppo" => "Gruppo","Gudea" => "Gudea","Gurajada" => "Gurajada","Habibi" => "Habibi","Halant" => "Halant","Hammersmith+One" => "Hammersmith One","Han=i" => "Hanalei","Hanalei+Fill" => "Hanalei Fill","Handlee" => "Handlee","Hanuman" => "Hanuman","Happy+Monkey" => "Happy Monkey","Headland+One" => "Headland One","Henny+Penny" => "Henny Penny","Herr+Von+Muellerhoff" => "Herr Von Muellerhoff","Hind" => "Hind","Hind+Siliguri" => "Hind Siliguri","Hind+Vadodara" => "Hind Vadodara","Holtwood+One+SC" => "Holtwood One SC","Homemade+Apple" => "Homemade Apple","Homenaje" => "Homenaje","IM+Fell+DW+Pica" => "IM Fell DW Pica","IM+Fell+DW+Pica+SC" => "IM Fell DW Pica SC","IM+Fell+Double+Pica" => "IM Fell Double Pica","IM+Fell+Double+Pica+SC" => "IM Fell Double Pica SC","IM+Fell+English" => "IM Fell English","IM+Fell+English+SC" => "IM Fell English SC","IM+Fell+French+Canon" => "IM Fell French Canon","IM+Fell+French+Canon+SC" => "IM Fell French Canon SC","IM+Fell+Great+Primer" => "IM Fell Great Primer","IM+Fell+Great+Primer+SC" => "IM Fell Great Primer SC","Iceberg" => "Iceberg","Iceland" => "Iceland","Imprima" => "Imprima","Inconsolata" => "Inconsolata","Inder" => "Inder","Indie+Flower" => "Indie Flower","Inika" => "Inika","Inknut+Antiqua" => "Inknut Antiqua","Irish+Grover" => "Irish Grover","Istok+Web" => "Istok Web","Italiana" => "Italiana","Italianno" => "Italianno","Itim" => "Itim","Jacques+Francois" => "Jacques Francois","Jacques+Francois+Shadow" => "Jacques Francois Shadow","Jaldi" => "Jaldi","Jim+Nightshade" => "Jim Nightshade","Jockey+One" => "Jockey One","Jolly+Lodger" => "Jolly Lodger","Josefin+Sans" => "Josefin Sans","Josefin+Slab" => "Josefin Slab","Joti+One" => "Joti One","Judson" => "Judson","Julee" => "Julee","Julius+Sans+One" => "Julius Sans One","Junge" => "Junge","Jura" => "Jura","Just+Another+Hand" => "Just Another Hand","Just+Me+Again+Down+Here" => "Just Me Again Down Here","Kadwa" => "Kadwa","Kalam" => "Kalam","Kameron" => "Kameron","Kantumruy" => "Kantumruy","Karla" => "Karla","Karma" => "Karma","Kaushan+Script" => "Kaushan Script","Kavoon" => "Kavoon","Kdam+Thmor" => "Kdam Thmor","Keania+One" => "Keania One","Kelly+Slab" => "Kelly Slab","Kenia" => "Kenia","Khand" => "Khand","Khmer" => "Khmer","Khula" => "Khula","Kite+One" => "Kite One","Knewave" => "Knewave","Kotta+One" => "Kotta One","Koulen" => "Koulen","Kranky" => "Kranky","Kreon" => "Kreon","Kristi" => "Kristi","Krona+One" => "Krona One","Kurale" => "Kurale","La+Belle+Aurore" => "La Belle Aurore","Laila" => "Laila","Lakki+Reddy" => "Lakki Reddy","Lancelot" => "Lancelot","Lateef" => "Lateef","Lato" => "Lato","League+Script" => "League Script","Leckerli+One" => "Leckerli One","Ledger" => "Ledger","Lekton" => "Lekton","Lemon" => "Lemon","Libre+Baskerville" => "Libre Baskerville","Life+Savers" => "Life Savers","Lilita+One" => "Lilita One","Lily+Script+One" => "Lily Script One","Limelight" => "Limelight","Linden+Hill" => "Linden Hill","Lobster" => "Lobster","Lobster+Two" => "Lobster Two","Londrina+Outline" => "Londrina Outline","Londrina+Shadow" => "Londrina Shadow","Londrina+Sketch" => "Londrina Sketch","Londrina+Solid" => "Londrina Solid","Lora" => "Lora","Love+Ya+Like+A+Sister" => "Love Ya Like A Sister","Loved+by+the+King" => "Loved by the King","Lovers+Quarrel" => "Lovers Quarrel","Luckiest+Guy" => "Luckiest Guy","Lusitana" => "Lusitana","Lustria" => "Lustria","Macondo" => "Macondo","Macondo+Swash+Caps" => "Macondo Swash Caps","Magra" => "Magra","Maiden+Orange" => "Maiden Orange","Mako" => "Mako","Mallanna" => "Mallanna","Mandali" => "Mandali","Marcellus" => "Marcellus","Marcellus+SC" => "Marcellus SC","Marck+Script" => "Marck Script","Margarine" => "Margarine","Marko+One" => "Marko One","Marmelad" => "Marmelad","Martel" => "Martel","Martel+Sans" => "Martel Sans","Marvel" => "Marvel","Mate" => "Mate","Mate+SC" => "Mate SC","Maven+Pro" => "Maven Pro","McLaren" => "McLaren","Meddon" => "Meddon","MedievalSharp" => "MedievalSharp","Medula+One" => "Medula One","Megrim" => "Megrim","Meie+Script" => "Meie Script","Merienda" => "Merienda","Merienda+One" => "Merienda One","Merriweather" => "Merriweather","Merriweather+Sans" => "Merriweather Sans","Metal" => "Metal","Metal+Mania" => "Metal Mania","Metamorphous" => "Metamorphous","Metrophobic" => "Metrophobic","Michroma" => "Michroma","Milonga" => "Milonga","Miltonian" => "Miltonian","Miltonian+Tattoo" => "Miltonian Tattoo","Miniver" => "Miniver","Miss+Fajardose" => "Miss Fajardose","Modak" => "Modak","Modern+Antiqua" => "Modern Antiqua","Molengo" => "Molengo","Molle" => "Molle","Monda" => "Monda","Monofett" => "Monofett","Monoton" => "Monoton","Monsieur+La+Doulaise" => "Monsieur La Doulaise","Montaga" => "Montaga","Montez" => "Montez","Montserrat" => "Montserrat","Montserrat+Alternates" => "Montserrat Alternates","Montserrat+Subrayada" => "Montserrat Subrayada","Moul" => "Moul","Moulpali" => "Moulpali","Mountains+of+Christmas" => "Mountains of Christmas","Mouse+Memoirs" => "Mouse Memoirs","Mr+Bedfort" => "Mr Bedfort","Mr+Dafoe" => "Mr Dafoe","Mr+De+Haviland" => "Mr De Haviland","Mrs+Saint+Delafield" => "Mrs Saint Delafield","Mrs+Sheppards" => "Mrs Sheppards","Muli" => "Muli","Mystery+Quest" => "Mystery Quest","NTR" => "NTR","Neucha" => "Neucha","Neuton" => "Neuton","New+Rocker" => "New Rocker","News+Cycle" => "News Cycle","Niconne" => "Niconne","Nixie+One" => "Nixie One","Nobile" => "Nobile","Nokora" => "Nokora","Norican" => "Norican","Nosifer" => "Nosifer","Nothing+You+Could+Do" => "Nothing You Could Do","Noticia+Text" => "Noticia Text","Noto+Sans" => "Noto Sans","Noto+Serif" => "Noto Serif","Nova+Cut" => "Nova Cut","Nova+Flat" => "Nova Flat","Nova+Mono" => "Nova Mono","Nova+Oval" => "Nova Oval","Nova+Round" => "Nova Round","Nova+Script" => "Nova Script","Nova+Slim" => "Nova Slim","Nova+Square" => "Nova Square","Numans" => "Numans","Nunito" => "Nunito","Odor+Mean+Chey" => "Odor Mean Chey","Offside" => "Offside","Old+Standard+TT" => "Old Standard TT","Oldenburg" => "Oldenburg","Oleo+Script" => "Oleo Script","Oleo+Script+Swash+Caps" => "Oleo Script Swash Caps","Open+Sans" => "Open Sans","Open+Sans+Condensed" => "Open Sans Condensed","Oranienbaum" => "Oranienbaum","Orbitron" => "Orbitron","Oregano" => "Oregano","Orienta" => "Orienta","Original+Surfer" => "Original Surfer","Oswald" => "Oswald","Over+the+Rainbow" => "Over the Rainbow","Overlock" => "Overlock","Overlock+SC" => "Overlock SC","Ovo" => "Ovo","Oxygen" => "Oxygen","Oxygen+Mono" => "Oxygen Mono","PT+Mono" => "PT Mono","PT+Sans" => "PT Sans","PT+Sans+Caption" => "PT Sans Caption","PT+Sans+Narrow" => "PT Sans Narrow","PT+Serif" => "PT Serif","PT+Serif+Caption" => "PT Serif Caption","Pacifico" => "Pacifico","Palanquin" => "Palanquin","Palanquin+Dark" => "Palanquin Dark","Paprika" => "Paprika","Parisienne" => "Parisienne","Passero+One" => "Passero One","Passion+One" => "Passion One","Pathway+Gothic+One" => "Pathway Gothic One","Patrick+Hand" => "Patrick Hand","Patrick+Hand+SC" => "Patrick Hand SC","Patua+One" => "Patua One","Paytone+One" => "Paytone One","Peddana" => "Peddana","Peralta" => "Peralta","Permanent+Marker" => "Permanent Marker","Petit+Formal+Script" => "Petit Formal Script","Petrona" => "Petrona","Philosopher" => "Philosopher","Piedra" => "Piedra","Pinyon+Script" => "Pinyon Script","Pirata+One" => "Pirata One","Plaster" => "Plaster","Play" => "Play","Playball" => "Playball","Playfair+Display" => "Playfair Display","Playfair+Display+SC" => "Playfair Display SC","Podkova" => "Podkova","Poiret+One" => "Poiret One","Poller+One" => "Poller One","Poly" => "Poly","Pompiere" => "Pompiere","Pontano+Sans" => "Pontano Sans","Poppins" => "Poppins","Port+Lligat+Sans" => "Port Lligat Sans","Port+Lligat+Slab" => "Port Lligat Slab","Pragati+Narrow" => "Pragati Narrow","Prata" => "Prata","Preahvihear" => "Preahvihear","Press+Start+2P" => "Press Start 2P","Princess+Sofia" => "Princess Sofia","Prociono" => "Prociono","Prosto+One" => "Prosto One","Puritan" => "Puritan","Purple+Purse" => "Purple Purse","Quando" => "Quando","Quantico" => "Quantico","Quattrocento" => "Quattrocento","Quattrocento+Sans" => "Quattrocento Sans","Questrial" => "Questrial","Quicksand" => "Quicksand","Quintessential" => "Quintessential","Qwigley" => "Qwigley","Racing+Sans+One" => "Racing Sans One","Radley" => "Radley","Rajdhani" => "Rajdhani","Raleway" => "Raleway","Raleway+Dots" => "Raleway Dots","Ramabhadra" => "Ramabhadra","Ramaraja" => "Ramaraja","Rambla" => "Rambla","Rammetto+One" => "Rammetto One","Ranchers" => "Ranchers","Rancho" => "Rancho","Ranga" => "Ranga","Rationale" => "Rationale","Ravi+Prakash" => "Ravi Prakash","Redressed" => "Redressed","Reenie+Beanie" => "Reenie Beanie");
		//$font_collection_two = array("Revalia" => "Revalia","Rhodium+Libre" => "Rhodium Libre","Ribeye" => "Ribeye","Ribeye+Marrow" => "Ribeye Marrow","Righteous" => "Righteous","Risque" => "Risque","Roboto" => "Roboto","Roboto+Condensed" => "Roboto Condensed","Roboto+Mono" => "Roboto Mono","Roboto+Slab" => "Roboto Slab","Rochester" => "Rochester","Rock+Salt" => "Rock Salt","Rokkitt" => "Rokkitt","Romanesco" => "Romanesco","Ropa+Sans" => "Ropa Sans","Rosario" => "Rosario","Rosarivo" => "Rosarivo","Rouge+Script" => "Rouge Script","Rozha+One" => "Rozha One","Rubik" => "Rubik","Rubik+Mono+One" => "Rubik Mono One","Rubik+One" => "Rubik One","Ruda" => "Ruda","Rufina" => "Rufina","Ruge+Boogie" => "Ruge Boogie","Ruluko" => "Ruluko","Rum+Raisin" => "Rum Raisin","Ruslan+Display" => "Ruslan Display","Russo+One" => "Russo One","Ruthie" => "Ruthie","Rye" => "Rye","Sacramento" => "Sacramento","Sahitya" => "Sahitya","Sail" => "Sail","Salsa" => "Salsa","Sanchez" => "Sanchez","Sancreek" => "Sancreek","Sansita+One" => "Sansita One","Sarala" => "Sarala","Sarina" => "Sarina","Sarpanch" => "Sarpanch","Satisfy" => "Satisfy","Scada" => "Scada","Scheherazade" => "Scheherazade","Schoolbell" => "Schoolbell","Seaweed+Script" => "Seaweed Script","Sevillana" => "Sevillana","Seymour+One" => "Seymour One","Shadows+Into+Light" => "Shadows Into Light","Shadows+Into+Light+Two" => "Shadows Into Light Two","Shanti" => "Shanti","Share" => "Share","Share+Tech" => "Share Tech","Share+Tech+Mono" => "Share Tech Mono","Shojumaru" => "Shojumaru","Short+Stack" => "Short Stack","Siemreap" => "Siemreap","Sigmar+One" => "Sigmar One","Signika" => "Signika","Signika+Negative" => "Signika Negative","Simonetta" => "Simonetta","Sintony" => "Sintony","Sirin+Stencil" => "Sirin Stencil","Six+Caps" => "Six Caps","Skranji" => "Skranji","Slabo+13px" => "Slabo 13px","Slabo+27px" => "Slabo 27px","Slackey" => "Slackey","Smokum" => "Smokum","Smythe" => "Smythe","Sniglet" => "Sniglet","Snippet" => "Snippet","Snowburst+One" => "Snowburst One","Sofadi+One" => "Sofadi One","Sofia" => "Sofia","Sonsie+One" => "Sonsie One","Sorts+Mill+Goudy" => "Sorts Mill Goudy","Source+Code+Pro" => "Source Code Pro","Source+Sans+Pro" => "Source Sans Pro","Source+Serif+Pro" => "Source Serif Pro","Special+Elite" => "Special Elite","Spicy+Rice" => "Spicy Rice","Spinnaker" => "Spinnaker","Spirax" => "Spirax","Squada+One" => "Squada One","Sree+Krushnadevaraya" => "Sree Krushnadevaraya","Stalemate" => "Stalemate","Stalinist+One" => "Stalinist One","Stardos+Stencil" => "Stardos Stencil","Stint+Ultra+Condensed" => "Stint Ultra Condensed","Stint+Ultra+Expanded" => "Stint Ultra Expanded","Stoke" => "Stoke","Strait" => "Strait","Sue+Ellen+Francisco" => "Sue Ellen Francisco","Sumana" => "Sumana","Sunshiney" => "Sunshiney","Supermercado+One" => "Supermercado One","Sura" => "Sura","Suranna" => "Suranna","Suravaram" => "Suravaram","Suwannaphum" => "Suwannaphum","Swanky+and+Moo+Moo" => "Swanky and Moo Moo","Syncopate" => "Syncopate","Tangerine" => "Tangerine","Taprom" => "Taprom","Tauri" => "Tauri","Teko" => "Teko","Telex" => "Telex","Tenali+Ramakrishna" => "Tenali Ramakrishna","Tenor+Sans" => "Tenor Sans","Text+Me+One" => "Text Me One","The+Girl+Next+Door" => "The Girl Next Door","Tienne" => "Tienne","Tillana" => "Tillana","Timmana" => "Timmana","Tinos" => "Tinos","Titan+One" => "Titan One","Titillium+Web" => "Titillium Web","Trade+Winds" => "Trade Winds","Trocchi" => "Trocchi","Trochut" => "Trochut","Trykker" => "Trykker","Tulpen+One" => "Tulpen One","Ubuntu" => "Ubuntu","Ubuntu+Condensed" => "Ubuntu Condensed","Ubuntu+Mono" => "Ubuntu Mono","Ultra" => "Ultra","Uncial+Antiqua" => "Uncial Antiqua","Underdog" => "Underdog","Unica+One" => "Unica One","UnifrakturCook" => "UnifrakturCook","UnifrakturMaguntia" => "UnifrakturMaguntia","Unkempt" => "Unkempt","Unlock" => "Unlock","Unna" => "Unna","VT323" => "VT323","Vampiro+One" => "Vampiro One","Varela" => "Varela","Varela+Round" => "Varela Round","Vast+Shadow" => "Vast Shadow","Vesper+Libre" => "Vesper Libre","Vibur" => "Vibur","Vidaloka" => "Vidaloka","Viga" => "Viga","Voces" => "Voces","Volkhov" => "Volkhov","Vollkorn" => "Vollkorn","Voltaire" => "Voltaire","Waiting+for+the+Sunrise" => "Waiting for the Sunrise","Wallpoet" => "Wallpoet","Walter+Turncoat" => "Walter Turncoat","Warnes" => "Warnes","Wellfleet" => "Wellfleet","Wendy+One" => "Wendy One","Wire+One" => "Wire One","Work+Sans" => "Work Sans","Yanone+Kaffeesatz" => "Yanone Kaffeesatz","Yantramanav" => "Yantramanav","Yellowtail" => "Yellowtail","Yeseva+One" => "Yeseva One","Yesteryear" => "Yesteryear","Zeyada" => "Zeyada");
		$font_collection = array( 'Default'=>'Default',  'Open Sans'=>'Open Sans', 'Droid Sans'=>'Droid Sans', 'PT Sans'=>'PT Sans', 'Lato'=>'Lato', 'Oswald'=>'Oswald', 'Droid Serif'=>'Droid Serif', 'Roboto'=>'Roboto', 'Lora'=>'Lora', 'Libre Baskerville'=>'Libre Baskerville', 'Josefin Slab'=>'Josefin Slab', 'Arvo'=>'Arvo', 'Ubuntu'=>'Ubuntu', 'Raleway'=>'Raleway', 'Source Sans Pro'=>'Source Sans Pro', 'Lobster'=>'Lobster', 'PT Serif'=>'PT Serif', 'Old Standard TT'=>'Old Standard TT', 'Vollkorn'=>'Vollkorn', 'Gravitas One'=>'Gravitas One', 'Merriweather'=>'Merriweather' );

		$wp_customize->add_panel( 'gf_stla_panel', array(
				'title' => __( 'Styles & Layouts Gravity Forms' ),
				'description' => '<p> Craft your Forms</p>', // Include html tags such as <p>.
				'priority' => 160, // Mixed with top-level-section hierarchy.
			) );

		//hidden field to get form id in jquery

		if ( !array_key_exists( 'formid', $_GET ) ) {

			$wp_customize->add_setting( 'gf_stla_hidden_field_for_form_id' , array(
					'default'     => $current_form_id,
					'transport'   => 'postMessage',
					'type' => 'option'
				) );

			$wp_customize->add_control( 'gf_stla_hidden_field_for_form_id', array(
					'type' => 'hidden',
					'priority' => 10, // Within the section.
					'section' => 'gf_stla_select_form_section', // Required, core or custom.
					'input_attrs' => array(
						'value' => $current_form_id,
						'id' => 'gf_stla_hidden_field_for_form_id'
					),
				) );
		}

		include 'includes/form-select.php';
		do_action( 'gf_stla_add_theme_section' );
		include 'includes/form-wrapper.php';
		include 'includes/form-header.php';
		include 'includes/form-title.php';
		include 'includes/form-description.php';
		include 'includes/submit-button.php';
		// //include 'includes/outer-shadow.php';
		// //include 'includes/inner-shadow.php';
		include 'includes/field-labels.php';
		include 'includes/field-descriptions.php';
		include 'includes/text-fields.php';
		include 'includes/dropdown-fields.php';
		include 'includes/radio-inputs.php';
		include 'includes/checkbox-inputs.php';
		include 'includes/paragraph-textarea.php';
		include 'includes/section-break-title.php';
		include 'includes/section-break-description.php';
		include 'includes/confirmation-message.php';
		include 'includes/error-message.php';
	} // main customizer function ends here

	function gf_sb_get_saved_styles( $form_id, $category ) {


		$settings = get_option( 'gf_stla_form_id_'.$form_id );

		if ( empty( $settings ) ) {
			return;
		}

		$input_styles = '';
		if ( isset( $settings[$category]['use-outer-shadows'] ) ) {
			$input_styles.= empty( $settings[$category]['horizontal-offset'] )?'box-shadow: 0px ':'box-shadow:'. $settings[$category]['outer-horizontal-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-vertical-offset'] )?'0px ': $settings[$category]['outer-vertical-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-blur-radius'] )?'0px ': $settings[$category]['outer-blur-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-spread-radius'] )?'0px ': $settings[$category]['outer-spread-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-shadow-color'] )?';': $settings[$category]['outer-shadow-color'].' ';

			if ( isset( $settings[$category]['use-inner-shadows'] ) ) {
				$input_styles.= empty( $settings[$category]['inner-horizontal-offset'] )?', 0px ':', '. $settings[$category]['inner-horizontal-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-vertical-offset'] )?'0px ': $settings[$category]['inner-vertical-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-blur-radius'] )?'0px ': $settings[$category]['inner-blur-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-spread-radius'] )?'0px ': $settings[$category]['inner-spread-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-shadow-color'] )?';': $settings[$category]['inner-shadow-color'].' inset; ';
			}

			else {
				$input_styles.= ';';
			}
		}

		if ( isset(  $settings[$category]['use-outer-shadows'] ) ) {
			$input_styles.= empty( $settings[$category]['outer-horizontal-offset'] )?'-moz-box-shadow: 0px ':'-moz-box-shadow:'. $settings[$category]['outer-horizontal-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-vertical-offset'] )?'0px ': $settings[$category]['outer-vertical-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-blur-radius'] )?'0px ': $settings[$category]['outer-blur-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-spread-radius'] )?'0px ': $settings[$category]['outer-spread-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-shadow-color'] )?';': $settings[$category]['outer-shadow-color'].' ';

			if ( isset( $settings[$category]['use-inner-shadows'] ) ) {
				$input_styles.= empty( $settings[$category]['inner-horizontal-offset'] )?', 0px ':', '. $settings[$category]['inner-horizontal-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-vertical-offset'] )?'0px ': $settings[$category]['inner-vertical-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-blur-radius'] )?'0px ': $settings[$category]['inner-blur-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-spread-radius'] )?'0px ': $settings[$category]['inner-spread-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-shadow-color'] )?';': $settings[$category]['inner-shadow-color'].' inset; ';
			}

			else {
				$input_styles.= ';';
			}
		}

		if ( isset( $settings[$category]['use-outer-shadows'] ) ) {
			$input_styles.= empty( $settings[$category]['outer-horizontal-offset'] )?'-webkit-box-shadow: 0px ':'-webkit-box-shadow:'. $settings[$category]['outer-horizontal-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-vertical-offset'] )?'0px ': $settings[$category]['outer-vertical-offset'].' ';
			$input_styles.= empty( $settings[$category]['outer-blur-radius'] )?'0px ': $settings[$category]['outer-blur-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-spread-radius'] )?'0px ': $settings[$category]['outer-spread-radius'].' ';
			$input_styles.= empty( $settings[$category]['outer-shadow-color'] )?';': $settings[$category]['outer-shadow-color'].' ';

			if ( isset( $settings[$category]['use-inner-shadows'] ) ) {
				$input_styles.= empty( $settings[$category]['inner-horizontal-offset'] )?', 0px ':', '. $settings[$category]['inner-horizontal-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-vertical-offset'] )?'0px ': $settings[$category]['inner-vertical-offset'].' ';
				$input_styles.= empty( $settings[$category]['inner-blur-radius'] )?'0px ': $settings[$category]['inner-blur-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-spread-radius'] )?'0px ': $settings[$category]['inner-spread-radius'].' ';
				$input_styles.= empty( $settings[$category]['inner-shadow-color'] )?';': $settings[$category]['inner-shadow-color'].' inset; ';
			}

			else {
				$input_styles.= ';';
			}
		}

		$input_styles.= empty( $settings[$category]['color'] )?'':'color:'. $settings[$category]['color'].';';
		$input_styles.= empty( $settings[$category]['background-color'] )?'':'background:'. $settings[$category]['background-color'].';';
		//$input_styles.= empty( $settings[$category]['padding'] )?'':'padding:'. $settings[$category]['padding'].';';
		$input_styles.= empty( $settings[$category]['width'] )?'':'width:'. $settings[$category]['width'].';';
		$input_styles.= empty( $settings[$category]['height'] )?'':'height:'. $settings[$category]['height'].';';

		$input_styles.= empty( $settings[$category]['title-position'] )?'':'text-align:'. $settings[$category]['title-position'].';';
		$input_styles.= empty( $settings[$category]['text-align'] )?'':'text-align:'. $settings[$category]['text-align'].';';
		$input_styles.= empty( $settings[$category]['error-position'] )?'':'text-align:'. $settings[$category]['error-position'].';';
		$input_styles.= empty( $settings[$category]['description-position'] )?'':'text-align:'. $settings[$category]['description-position'].';';

		$input_styles.= empty( $settings[$category]['title-color'] )?'':'color:'. $settings[$category]['title-color'].';';
		$input_styles.= empty( $settings[$category]['font-color'] )?'':'color:'. $settings[$category]['font-color'].';';
		$input_styles.= empty( $settings[$category]['description-color'] )?'':'color:'. $settings[$category]['description-color'].';';
		$input_styles.= empty( $settings[$category]['button-color'] )?'':'background-color:'. $settings[$category]['button-color'].';';
		$input_styles.= empty( $settings[$category]['description-color'] )?'':'color:'. $settings[$category]['description-color'].';';

		$input_styles.= empty( $settings[$category]['font-family'] )?'':'font-family:'. $settings[$category]['font-family'].';';
		$input_styles.= empty( $settings[$category]['font-size'] )?'':'font-size:'. $settings[$category]['font-size'].';';
		$input_styles.= empty( $settings[$category]['max-width'] )?'':'max-width:'. $settings[$category]['max-width'].';';
		$input_styles.= empty( $settings[$category]['maximum-width'] )?'':'max-width:'. $settings[$category]['maximum-width'].';';
		$input_styles.= empty( $settings[$category]['margin'] )?'':'margin:'. $settings[$category]['margin'].';';
		$input_styles.= empty( $settings[$category]['padding'] )?'':'padding:'. $settings[$category]['padding'].';';

		$input_styles.= empty( $settings[$category]['border-size'] )?'':'border-width:'. $settings[$category]['border-size'].';';
		$input_styles.= empty( $settings[$category]['border-color'] )?'':'border-color:'. $settings[$category]['border-color'].';';
		$input_styles.= empty( $settings[$category]['border-type'] )?'':'border-style:'. $settings[$category]['border-type'].';';
		$input_styles.= empty( $settings[$category]['border-bottom'] )?'':'border-bottom-style:'. $settings[$category]['border-bottom'].';';
		$input_styles.= empty( $settings[$category]['border-bottom-size'] )?'':'border-bottom-width:'. $settings[$category]['border-bottom-size'].';';
		$input_styles.= empty( $settings[$category]['border-bottom-color'] )?'':'border-bottom-color:'. $settings[$category]['border-bottom-color'].';';

		$input_styles.= empty( $settings[$category]['custom-css'] )?'':$settings[$category]['custom-css'].';';

		$input_styles.= empty( $settings[$category]['background-image-url'] )?'':'background: url('. $settings[$category]['background-image-url'].') no-repeat;';
		$input_styles.= empty( $settings[$category]['border-bottom-color'] )?'':'border-bottom-color:'. $settings[$category]['border-bottom-color'].';';

		if ( !empty( $settings[$category]['border-radius'] ) ) {
			$input_styles .= 'border-radius:'.$settings[$category]['border-radius'].';';
			$input_styles .= '-web-border-radius:'.$settings[$category]['border-radius'].';';
			$input_styles .= '-moz-border-radius:'.$settings[$category]['border-radius'].';';
		}

		return $input_styles;
	}

}// class ends here

new Gravity_customizer_admin();
