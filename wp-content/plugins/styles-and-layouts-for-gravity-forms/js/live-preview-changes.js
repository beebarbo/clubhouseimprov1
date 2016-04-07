( function( $ ) {
  

var urlParams;
(window.onpopstate = function () {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query))
       urlParams[decode(match[1])] = decode(match[2]);
})();

function addGoogleFont(FontName) {
var fontPlus='';
    FontName=FontName.split(" ");
    if($.isArray(FontName)){
      fontPlus = FontName[0];
      for(var i=1; i<FontName.length; i++){
       fontPlus = fontPlus +'+'+FontName[i];
      }

    }
    $("head").append("<link href='https://fonts.googleapis.com/css?family=" + fontPlus + "' rel='stylesheet' type='text/css'>");
}
//********************************* Form Wrapper *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][background-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'background',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][max-width]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][font]', function( value ) {
    value.bind( function( to ) {
      if(to == 'Default') {
      console.log('if worked');
         $( '#gform_wrapper_'+urlParams["formid"] ).css( 'font-family','inherit' );
      }
      else{
              addGoogleFont(to);
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'font-family',to );
          }
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][border-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'border-width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][border-type]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'border-style',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][border-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'border-color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][border-radius]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'border-radius',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][background-image]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'background-image','url(' + to + ')' );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-wrapper][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"] ).css( 'padding',to);
         } );
  } );

//********************************* Form Header *******************************************

  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-header][background-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading' ).css( 'background',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-header][border-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading' ).css( 'border-width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-header][border-type]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading' ).css( 'border-style',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-header][border-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading' ).css( 'border-color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-header][border-radius]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading' ).css( 'border-radius',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-header][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-header][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading' ).css( 'padding',to);
         } );
  } );


//********************************* Form Title *******************************************


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-title][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_title' ).css( 'color',to );
         } );
  } );



wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-title][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_title' ).css( 'font-size',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-title][text-align]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_title' ).css( 'text-align',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-title][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_title' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-title][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_title' ).css( 'padding',to);
         } );
  } );


//********************************* Form Description *******************************************

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-description][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_description' ).css( 'color',to );
         } );
  } );



wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-description][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_description' ).css( 'font-size',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-description][text-align]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_description' ).css( 'text-align',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-description][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_description' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[form-description][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_heading .gform_description' ).css( 'padding',to);
         } );
  } );
 
//********************************* Dropdown Fields *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'color',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][max-width]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][background-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'background',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][border-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'border-width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][border-type]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'border-style',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][border-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'border-color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][border-radius]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'border-radius',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[dropdown-fields][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield select' ).css( 'padding',to);
         } );
  } );       

//********************************* Radio Inputs *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[radio-inputs][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_radio' ).css( 'color',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[radio-inputs][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_radio' ).css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[radio-inputs][max-width]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_radio' ).css( 'width',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[radio-inputs][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_radio' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[radio-inputs][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_radio' ).css( 'padding',to);
         } );
  } );        

//********************************* Checkbox Inputs *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[checkbox-inputs][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_checkbox' ).css( 'color',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[checkbox-inputs][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_checkbox' ).css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[checkbox-inputs][max-width]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_checkbox' ).css( 'width',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[checkbox-inputs][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_checkbox' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[checkbox-inputs][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_checkbox' ).css( 'padding',to);
         } );
  } ); 
//********************************* Field Labels *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-labels][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_label' ).css( 'color',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-labels][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_label' ).css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-labels][text-align]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_label' ).css( 'text-align',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-labels][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_label' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-labels][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_label' ).css( 'padding',to);
         } );
  } ); 
//********************************* Field Descriptions *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-descriptions][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_description' ).css( 'color',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-descriptions][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_description' ).css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-descriptions][text-align]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_description' ).css( 'display','block' );
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_description' ).css( 'text-align',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-descriptions][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_description' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[field-descriptions][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield .gfield_description' ).css( 'padding',to);
         } );
  } ); 

//********************************* Text Fields *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'color',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][max-width]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][background-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'background',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][border-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'border-width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][border-type]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'border-style',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][border-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'border-color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][border-radius]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'border-radius',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield input[type=text]' ).css( 'padding',to);
         } );
  } );       

//********************************* Paragraph Textarea Fields *******************************************
  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'color',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'font-size',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][background-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'background',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][border-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'border-width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][border-type]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'border-style',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][border-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'border-color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[text-fields][border-radius]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'border-radius',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[paragraph-textarea][max-width]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'width',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[paragraph-textarea][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[paragraph-textarea][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gfield textarea' ).css( 'padding',to);
         } );
  } );       

//********************************* Submit Button *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][button-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'background-color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][width]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][height]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'height',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][button-align]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer' ).css( 'text-align',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'font-size',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][border-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'border-width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][border-type]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'border-style',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][border-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'border-color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][border-radius]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'border-radius',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[submit-button][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_footer input[type=submit]' ).css( 'padding',to);
         } );
  } );

//********************************* Section Break Title *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[section-break-title][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gsection .gsection_title' ).css( 'color',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[section-break-title][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gsection .gsection_title' ).css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[section-break-title][text-align]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gsection .gsection_title' ).css( 'text-align',to );
         } );
  } );


//********************************* Section Break Description *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[section-break-description][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gsection .gsection_description' ).css( 'color',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[section-break-description][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gsection .gsection_description' ).css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[section-break-description][text-align]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gsection .gsection_description' ).css( 'text-align',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[section-break-description][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gsection .gsection_description' ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[section-break-description][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .gform_body .gform_fields .gsection' ).css( 'padding',to);
         } );
  } ); 

//********************************* Confirmation Message *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][text-align]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'text-align',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][max-width]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][background-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'background',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][border-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'border-width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][border-type]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'border-style',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][border-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'border-color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][border-radius]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'border-radius',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[confirmation-message][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gforms_confirmation_message_'+urlParams["formid"] ).css( 'padding',to);
         } );
  } );       

//********************************* error Message *******************************************


  wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][font-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][text-align]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'text-align',to );
         } );
  } );

   wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][font-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'font-size',to );
         } );
  } );


wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][max-width]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][background-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'background',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][border-size]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'border-width',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][border-type]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'border-style',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][border-color]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'border-color',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][border-radius]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'border-radius',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][margin]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'margin',to );
         } );
  } );

wp.customize( 'gf_stla_form_id_'+urlParams["formid"]+'[error-message][padding]', function( value ) {
    value.bind( function( to ) {
            $( '#gform_wrapper_'+urlParams["formid"]+' .validation_error').css( 'padding',to);
         } );
  } );       


} )( jQuery );
