<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	 
	<?php wp_head(); ?>
    
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/look.css" > 
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/skin.css" />
<meta name="viewport" content="width=device-width" />
<link href="<?php bloginfo('template_url');?>/responsive.css" rel="stylesheet" media="all">

<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery-ui.min.js" ></script>
<script type="text/javascript">
jQuery(document).ready(function() {





	 
    jQuery('#mycarousel').jcarousel();
	
	jQuery('#mycarousel').jcarousel({
    auto: 10,
    scroll: 1
});

var text;


	jQuery( ".video_list>li" ).each(function( index ) {
  //console.log( index + ": " + jQuery( this ).find('h3').attr('id') );

	jQuery.ajax({
         url:    'https://www.googleapis.com/youtube/v3/videos?id='+jQuery( this ).find('h3').attr('id')+'&key=AIzaSyB1kwoWAKxiT5OTdvPnUxX56vr8nTGHdqc&fields=items(snippet(title))&part=snippet',
         success: function(result) {
                      
                          //console.log(result.items[0].snippet.title);

				text = result.items[0].snippet.title;
				
                  },
         async:   false
    }); 
	       
jQuery( this ).find('h3').text(text);

});


});
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=501305906572612";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script src="<?php bloginfo('template_url');?>/js/modernizr.custom.js"></script>



</head>

<body>

<div class="mainContainer">
	<div class="headerContainer">
    	<div class="logo">
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url');?>/images/logo.png" /></a>
        </div>
        
        <div class="menuMain">	
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav' ) ); ?>
             
        </div>
        
        
        <div class="middleContainer">
        	<div class="middleLeft">