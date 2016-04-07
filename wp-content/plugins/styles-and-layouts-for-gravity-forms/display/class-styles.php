<?php
    $get_form_options = get_option("gf_stla_form_id_".$css_form_id);
    $font_name = $get_form_options['form-wrapper']['font'];
    $font_name= str_replace(' ', '+', $font_name);
    if($font_name !='' && $font_name !== 'Default'){
        echo "<link href='https://fonts.googleapis.com/css?family=".$font_name."' rel='stylesheet' type='text/css'>";
}
?>

<style type="text/css">

body #gform_wrapper_<?php echo $css_form_id ?> {

<?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'form-wrapper' );  ?>
<?php echo empty($get_form_options['form-wrapper']['background-image'])?'':'background-image:url("'. $get_form_options['form-wrapper']['background-image'].'");' ;  ?>
<?php 
    if(!empty($get_form_options['form-wrapper']['font'])){
        if($get_form_options['form-wrapper']['font'] == 'Default'){
echo 'font-family:inherit;' ; 
        }
 else{           
echo 'font-family:'. $get_form_options['form-wrapper']['font'].';' ; 
 }
} ?>
}
body #gform_wrapper_<?php echo $css_form_id ?> .gform_heading {

    <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'form-header' );  ?>
 
   
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_heading .gform_title {

    <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'form-title' );  ?>
    }

body #gform_wrapper_<?php echo $css_form_id ?> .gform_heading .gform_description {
	<?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'form-description' );  ?>
  
    display:block;
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_footer input[type=submit] {

    <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'submit-button' );  ?>
}

/*body #gform_wrapper_<?php echo $css_form_id ?> .gform_footer input[type=submit]:hover {

    <?php echo empty( $gf_sb_settings['submit-button']['hover-color'] )?'':'background:'. $gf_sb_settings['submit-button']['hover-color'].';'; ?>
}*/

body #gform_wrapper_<?php echo $css_form_id ?> .gform_footer {
	

	<?php echo empty($get_form_options['submit-button']['button-align'])?'':'text-align:'. $get_form_options['submit-button']['button-align'].';' ;  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield input[type=text],
body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield input[type=email],
body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield input[type=tel],
body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield input[type=url],
body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield input[type=password]
{

   <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'text-fields' );  ?>

  
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield textarea {
	<?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'paragraph-textarea' );  ?>
    <?php echo empty( $get_form_options['text-fields']['background-color'] )?'':'background:'. $get_form_options['text-fields']['background-color'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['border-size'] )?'':'border-width:'. $get_form_options['text-fields']['border-size'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['border-color'] )?'':'border-color:'. $get_form_options['text-fields']['border-color'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['border-type'] )?'':'border-style:'. $get_form_options['text-fields']['border-type'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['font-size'] )?'':'font-size:'. $get_form_options['text-fields']['font-size'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['font-color'] )?'':'color:'. $get_form_options['text-fields']['font-color'].';'; ?>
    <?php
     if ( !empty($get_form_options['text-fields']['border-radius'] ) ) {
                            echo 'border-radius:'.$get_form_options['text-fields']['border-radius'].';';
                            echo '-web-border-radius:'.$get_form_options['text-fields']['border-radius'].';';
                            echo '-moz-border-radius:'.$get_form_options['text-fields']['border-radius'].';';
    }  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield select {

    <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'dropdown-fields' );  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield .gfield_radio li input[type=radio] {

   <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'radio-inputs' );  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield .gfield_checkbox li input[type=checkbox] {

   <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'checkbox-inputs' );  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gfield_radio label {

   <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'radio-inputs' );  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gfield_checkbox label {

    <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'checkbox-inputs');  ?>
   
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield .gfield_description {
 <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'field-descriptions' );  ?>
  

}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield .gfield_label {
    <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'field-labels' );  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gsection .gsection_title {
   <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'section-break-title' );  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gsection .gsection_description {
   <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'section-break-description' );  ?>
    
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield .ginput_container {


}

body #gforms_confirmation_message_<?php echo $css_form_id ?>  {
    <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'confirmation-message' );  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .validation_error {
    <?php echo $main_class_object->gf_sb_get_saved_styles($css_form_id, 'error-message' );  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_fields .gfield_error .validation_message {
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_page_footer .gform_next_button {

   <?php echo empty( $get_form_options['submit-button']['button-color'] )?'':'background:'. $get_form_options['submit-button']['button-color'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['border-size'] )?'':'border-width:'. $get_form_options['submit-button']['border-size'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['border-color'] )?'':'border-color:'. $get_form_options['submit-button']['border-color'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['border-type'] )?'':'border-style:'. $get_form_options['submit-button']['border-type'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['font-size'] )?'':'font-size:'. $get_form_options['submit-button']['font-size'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['font-color'] )?'':'color:'. $get_form_options['submit-button']['font-color'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['height'] )?'':'height:'. $get_form_options['submit-button']['height'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['width'] )?'':'width:'. $get_form_options['submit-button']['width'].';'; ?>
    <?php
     if ( !empty($get_form_options['submit-button']['border-radius'] ) ) {
                        echo 'border-radius:'.$get_form_options['submit-button']['border-radius'].';';
                        echo '-web-border-radius:'.$get_form_options['submit-button']['border-radius'].';';
                        echo '-moz-border-radius:'.$get_form_options['submit-button']['border-radius'].';';
    }  ?>
}

body #gform_wrapper_<?php echo $css_form_id ?> .gform_body .gform_page_footer .gform_previous_button {

    <?php echo empty( $get_form_options['submit-button']['button-color'] )?'':'background:'. $get_form_options['submit-button']['button-color'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['border-size'] )?'':'border-width:'. $get_form_options['submit-button']['border-size'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['border-color'] )?'':'border-color:'. $get_form_options['submit-button']['border-color'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['border-type'] )?'':'border-style:'. $get_form_options['submit-button']['border-type'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['font-size'] )?'':'font-size:'. $get_form_options['submit-button']['font-size'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['font-color'] )?'':'color:'. $get_form_options['submit-button']['font-color'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['height'] )?'':'height:'. $get_form_options['submit-button']['height'].';'; ?>
    <?php echo empty( $get_form_options['submit-button']['width'] )?'':'width:'. $get_form_options['submit-button']['width'].';'; ?>
    <?php
     if ( !empty($get_form_options['submit-button']['border-radius'] ) ) {
                        echo 'border-radius:'.$get_form_options['submit-button']['border-radius'].';';
                        echo '-web-border-radius:'.$get_form_options['submit-button']['border-radius'].';';
                        echo '-moz-border-radius:'.$get_form_options['submit-button']['border-radius'].';';
    }  ?>
}


</style>