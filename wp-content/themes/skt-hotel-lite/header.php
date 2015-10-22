<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Hotel
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

</head>

<body <?php body_class(''); ?>>
<div class="header">  
        <div class="header-inner">
                <div class="logo">
                        <a href="<?php echo home_url('/'); ?>">
                                <h1><?php bloginfo('name'); ?></h1>
                                <span class="tagline"><?php bloginfo( 'description' ); ?></span>                          
                        </a>
                 </div><!-- logo -->                 
                <div class="toggle">
                <a class="toggleMenu" href="#"><?php _e('Menu','hotel'); ?></a>
                </div><!-- toggle -->
                <div class="nav">                  
                    <?php wp_nav_menu( array('theme_location' => 'primary')); ?>
                </div><!-- nav --><div class="clear"></div>
                    </div><!-- header-inner -->
</div><!-- header -->

<?php if ( is_front_page() && is_home() ) { ?>
<section id="home_slider">
					        
        	<?php
			$sldimages = ''; 
			$sldimages = array(
						'1' => get_template_directory_uri().'/images/slides/slider1.jpg',
						'2' => get_template_directory_uri().'/images/slides/slider2.jpg',
						'3' => get_template_directory_uri().'/images/slides/slider3.jpg',
						'4' => get_template_directory_uri().'/images/slides/slider4.jpg',
						'5' => get_template_directory_uri().'/images/slides/slider1.jpg',								
			); ?>
            
        	<?php
			$slAr = array();
			$m = 0;
			for ($i=1; $i<6; $i++) {
				if ( get_theme_mod('slide_image'.$i, $sldimages[$i]) != "" ) {
					$imgSrc 	= get_theme_mod('slide_image'.$i, $sldimages[$i]);
					$imgTitle	= get_theme_mod('slide_title'.$i);
					$imgDesc	= get_theme_mod('slide_desc'.$i);
					$imgLink	= get_theme_mod('slide_link'.$i);
					if ( strlen($imgSrc) > 3 ) {
						$slAr[$m]['image_src'] = get_theme_mod('slide_image'.$i, $sldimages[$i]);
						$slAr[$m]['image_title'] = get_theme_mod('slide_title'.$i);
						$slAr[$m]['image_desc'] = get_theme_mod('slide_desc'.$i);
						$slAr[$m]['image_link'] = get_theme_mod('slide_link'.$i);
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
                <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php echo esc_attr('#slidecaption'.$n) ; ?>" /><?php
                    $slideno[] = $n;
                }
                ?>
                </div><?php
				
				
                foreach( $slideno as $sln ){ ?>
                    <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
                    <div class="slide_info">
                       <h2><a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln,'#link'.$sln)); ?>"><?php echo get_theme_mod('slide_title'.$sln, 'We Create Wordpress Theme'); ?></a></h2>
                            <?php if( get_theme_mod('slide_desc'.$sln, '') ) { ?>
                              <p><?php echo get_theme_mod('slide_desc'.$sln, ''); ?></p>
                            <?php } ?>
                            
                           <?php if( get_theme_mod('slide_link'.$sln, '') ) { ?>
                              <a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln,'#link'.$sln)); ?>"><?php _e('Read More &raquo;','hotel'); ?></a>
                           <?php } ?>
                    </div>
                    </div><?php 
                } ?>
                </div>
                <div class="clear"></div><?php 
			}
            ?>
            <div class="container">           
                   <?php if( get_theme_mod('booknow_button','#') ) { ?>
                      <a class="bookbtn" target="_blank" href="<?php echo esc_url(get_theme_mod('booknow_button', '#' )); ?>"><?php _e('Book <b>Now</b><span class="fa fa-chevron-right"></span>','hotel'); ?></a>
                    <?php } ?>             
                 
             </div>
        </section>
<section id="wrapsecond">
            	<div class="container">
                    <div class="services-wrap">
                    
                      <?php if( get_theme_mod('shortinfo_sb') ) { ?>
                           <?php echo get_theme_mod('shortinfo_sb'); ?>
                      <?php } else { ?>                      
                      <?php echo '<h2 class="section-title">Check Our Comfortable <strong>Rooms</strong></h2>
<p>Praesent vitae odio eget felis vehicula vulputate sit amet ut tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus muscular.</p>'; } ?>

<div class="space30"></div>
                    
                      <?php if( get_theme_mod('column_one') ) { ?>
                           <?php echo get_theme_mod('column_one'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third"><a href="#"><img alt="" src="'.get_template_directory_uri()."/images/thumb_03.jpg".'">
<h4>Room with One Bedroom</h4>
</a></div>'; } ?>

<?php if( get_theme_mod('column_two') ) { ?>
                           <?php echo get_theme_mod('column_two'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third"><a href="#"><img alt="" src="'.get_template_directory_uri()."/images/thumb_04.jpg".'">
<h4>Family Spacious Room</h4>
</a></div>'; } ?>


<?php if( get_theme_mod('column_three') ) { ?>
                           <?php echo get_theme_mod('column_three'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third last_column"><a href="#"><img alt="" src="'.get_template_directory_uri()."/images/thumb_05.jpg".'">
<h4>2 Rooms Appartment</h4>
</a></div>'; } ?>

                      
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="clear"></div>        
<?php
}
elseif ( is_front_page() ) { 
?>
<section id="home_slider">
					        
        	<?php
			$sldimages = ''; 
			$sldimages = array(
						'1' => get_template_directory_uri().'/images/slides/slider1.jpg',
						'2' => get_template_directory_uri().'/images/slides/slider2.jpg',
						'3' => get_template_directory_uri().'/images/slides/slider3.jpg',
						'4' => get_template_directory_uri().'/images/slides/slider4.jpg',
						'5' => get_template_directory_uri().'/images/slides/slider1.jpg',								
			); ?>
            
        	<?php
			$slAr = array();
			$m = 0;
			for ($i=1; $i<6; $i++) {
				if ( get_theme_mod('slide_image'.$i, $sldimages[$i]) != "" ) {
					$imgSrc 	= get_theme_mod('slide_image'.$i, $sldimages[$i]);
					$imgTitle	= get_theme_mod('slide_title'.$i);
					$imgDesc	= get_theme_mod('slide_desc'.$i);
					$imgLink	= get_theme_mod('slide_link'.$i);
					if ( strlen($imgSrc) > 3 ) {
						$slAr[$m]['image_src'] = get_theme_mod('slide_image'.$i, $sldimages[$i]);
						$slAr[$m]['image_title'] = get_theme_mod('slide_title'.$i);
						$slAr[$m]['image_desc'] = get_theme_mod('slide_desc'.$i);
						$slAr[$m]['image_link'] = get_theme_mod('slide_link'.$i);
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
                <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php echo esc_attr('#slidecaption'.$n) ; ?>" /><?php
                    $slideno[] = $n;
                }
                ?>
                </div><?php
				
				
                foreach( $slideno as $sln ){ ?>
                    <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
                    <div class="slide_info">
                       <h2><a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln,'#link'.$sln)); ?>"><?php echo get_theme_mod('slide_title'.$sln, 'We Create Wordpress Theme'); ?></a></h2>
                            <?php if( get_theme_mod('slide_desc'.$sln, '') ) { ?>
                              <p><?php echo get_theme_mod('slide_desc'.$sln, ''); ?></p>
                            <?php } ?>
                            
                           <?php if( get_theme_mod('slide_link'.$sln, '') ) { ?>
                              <a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln,'#link'.$sln)); ?>"><?php _e('Read More &raquo;','hotel'); ?></a>
                           <?php } ?>
                    </div>
                    </div><?php 
                } ?>
                </div>
                <div class="clear"></div><?php 
			}
            ?>
            <div class="container">           
                   <?php if( get_theme_mod('booknow_button','#') ) { ?>
                      <a class="bookbtn" target="_blank" href="<?php echo esc_url(get_theme_mod('booknow_button', '#' )); ?>"><?php _e('Book <b>Now</b><span class="fa fa-chevron-right"></span>','hotel'); ?></a>
                    <?php } ?>             
                 
             </div>
        </section>
<section id="wrapsecond">
            	<div class="container">
                    <div class="services-wrap">
                    
                      <?php if( get_theme_mod('shortinfo_sb') ) { ?>
                           <?php echo get_theme_mod('shortinfo_sb'); ?>
                      <?php } else { ?>                      
                      <?php echo '<h2 class="section-title">Check Our Comfortable <strong>Rooms</strong></h2>
<p>Praesent vitae odio eget felis vehicula vulputate sit amet ut tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus muscular.</p>'; } ?>

<div class="space30"></div>
                    
                      <?php if( get_theme_mod('column_one') ) { ?>
                           <?php echo get_theme_mod('column_one'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third"><a href="#"><img alt="" src="'.get_template_directory_uri()."/images/thumb_03.jpg".'">
<h4>Room with One Bedroom</h4>
</a></div>'; } ?>

<?php if( get_theme_mod('column_two') ) { ?>
                           <?php echo get_theme_mod('column_two'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third"><a href="#"><img alt="" src="'.get_template_directory_uri()."/images/thumb_04.jpg".'">
<h4>Family Spacious Room</h4>
</a></div>'; } ?>


<?php if( get_theme_mod('column_three') ) { ?>
                           <?php echo get_theme_mod('column_three'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third last_column"><a href="#"><img alt="" src="'.get_template_directory_uri()."/images/thumb_05.jpg".'">
<h4>2 Rooms Appartment</h4>
</a></div>'; } ?>

                      
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="clear"></div>
<?php
}
elseif ( is_home() ) {
?>
<section id="home_slider" style="display:none;"></section>
<section id="wrapsecond" style="display:none;"></section>
<?php
}
?>