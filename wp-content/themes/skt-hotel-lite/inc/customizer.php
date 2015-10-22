<?php
/**
 * SKT Hotel Theme Customizer
 *
 * @package SKT Hotel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hotel_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class hotel_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_section(
        'logo_sec',
        array(
            'title' => esc_attr__('Logo (PRO Version)', 'hotel'),
            'priority' => 1,
 			'description' => sprintf( esc_attr__( 'Logo Settings available in<br /> %s.', 'hotel' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), esc_attr__( 'PRO Version', 'hotel' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('hotel_options[logo-info]',array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new hotel_Info( $wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'hotel_options[logo-info]',
        'priority' => null
        ) )
    );
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#02aee7',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_attr__('Color Scheme','hotel'),
 			'description' => sprintf( esc_attr__( 'More color options in<br /> %s.', 'hotel' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), esc_attr__( 'PRO Version', 'hotel' )
						)
					),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_section('slider_below_desc',array(
		'title'	=> esc_attr__('Slider Below Info','hotel'),
		'description'	=> esc_attr__('Title & Description Below The Slider','hotel'),
		'priority'	=> null
	));
	$wp_customize->add_setting('shortinfo_sb',array(
			'default'	=> esc_attr__('<h2>Check Our Comfortable <strong>Rooms</strong></h2><p>Praesent vitae odio eget felis vehicula vulputate sit amet ut tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus muscular. </p>','hotel'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'shortinfo_sb', array(
				'label'	=> esc_attr__('','hotel'),
				'setting'	=> 'shortinfo_sb',
				'section'	=> 'slider_below_desc'
			)
		)
	);	
	
	
	$wp_customize->add_setting('booknow_button',array(
			'default'	=> '#',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('booknow_button',array(
			'label'	=> esc_attr__('Book Now Button Custom Link','hotel'),			
			'setting'	=> 'booknow_button',
			'section'	=> 'slider_below_desc'
	));		
		
	
	$wp_customize->add_section('home_boxes', array(
		'title'	=> esc_attr__('Homepage Boxes','hotel'),
 		'description' => sprintf( esc_attr__( 'More social icons can be found<br /> %s.', 'hotel' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_FONT_AWESOME_URL.'"' ), esc_attr__( 'Social Icons', 'hotel' )
						)
					),		
		'priority'	=> null
	));
	$wp_customize->add_setting('column_one', array(
			'default'	=> esc_attr__('<div class="one_third"><a href="#"><img alt="" src="'.get_template_directory_uri()."/images/thumb_03.jpg".'"><h4>Room with One Bedroom</h4></a></div>','hotel'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'column_one', array(
				'label'	=> __('First column content','hotel'),
				'setting'	=> 'column_one',
				'section'	=> 'home_boxes'
			)
		)
	);
	$wp_customize->add_setting('column_two', array(
			'default'	=> __('<div class="one_third"><a href="#"><img alt="" src="'.get_template_directory_uri().'/images/thumb_04.jpg'.'"><h4>Family Spacious Room</h4></a></div>', 'hotel'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'column_two', array(
				'label'	=> __('Second column content','hotel'),
				'setting'	=> 'column_two',
				'section'	=> 'home_boxes'
			)
		)
	);
	
	$wp_customize->add_setting('column_three',array(
			'default'	=> esc_attr__('<div class="one_third last_column"><a href="#"><img alt="" src="'.get_template_directory_uri()."/images/thumb_05.jpg".'"><h4>2 Rooms Appartment</h4></a></div>', 'hotel'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'column_three', array(
				'label'	=> esc_attr__('Third column content','hotel'),
				'setting'	=> 'column_three',
				'section'	=> 'home_boxes'
			)
		)
	);	
	
	$wp_customize->add_section('slider_section',array(
		'title'	=> esc_attr__('Slider Settings','hotel'),
		'description' => sprintf( esc_attr__( 'Add slider images here.<br />More slider settings available in %s.', 'hotel' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), esc_attr__( 'PRO Version', 'hotel' )
					)
				),			
		'priority'		=> null
	));	
	// Slide Image 1
	$wp_customize->add_setting('slide_image1',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider1.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(   new WP_Customize_Image_Control( $wp_customize, 'slide_image1', array(
            'label' => esc_attr__('Slide Image 1 (1400x536)','hotel'),
            'section' => 'slider_section',
            'settings' => 'slide_image1'
       		)
     	 )
	);	
	$wp_customize->add_setting('slide_title1',array(
			'default'	=> esc_attr__('Best Templates for Hotel Business','hotel'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title1', array(	
			'label'	=> esc_attr__('Slide title 1','hotel'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title1'
	));
	$wp_customize->add_setting('slide_desc1',array(
		'default'	=> esc_attr__('','hotel'),
		'sanitize_callback'	=> 'wptexturize'	
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc1', array(
				'label'	=> esc_attr__('Slider description  1','hotel'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc1'
			)
		)
	);
	$wp_customize->add_setting('slide_link1',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link1',array(
			'label'	=> esc_attr__('Slide link 1','hotel'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link1'
	));	
	// Slide Image 2
	$wp_customize->add_setting('slide_image2',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider2.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'slide_image2', array(
				'label'	=> esc_attr__('Slide image 2','hotel'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image2'
			)
		)
	);	
	$wp_customize->add_setting('slide_title2',array(
			'default'	=> esc_attr__('We Create Wordpress Responsive Theme','hotel'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title2', array(	
			'label'	=> esc_attr__('Slide title 2','hotel'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title2'
	));	
	$wp_customize->add_setting('slide_desc2',array(
			'default'	=> esc_attr__('','hotel'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc2', array(
				'label'	=> esc_attr__('Slide description 2','hotel'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc2'
			)
		)
	);	
	$wp_customize->add_setting('slide_link2',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('slide_link2',array(
		'label'	=> __('Slide link 2','hotel'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_link2'
	));	
	// Slide Image 3
	$wp_customize->add_setting('slide_image3',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider3.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control(	$wp_customize,'slide_image3', array(
				'label'	=> esc_attr__('Slide Image 3','hotel'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image3'				
			)
		)
	);	
	$wp_customize->add_setting('slide_title3',array(
			'default'	=> esc_attr__('We Create Wordpress Responsive Theme','hotel'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('slide_title3', array(		
			'label'	=> esc_attr__('Slide title 3','hotel'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title3'			
	));	
	$wp_customize->add_setting('slide_desc3',array(
			'default'	=> esc_attr__('','hotel'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control($wp_customize,'slide_desc3', array(
				'label'	=> esc_attr__('Slide Description 3','hotel'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc3'		
			)
		)
	);	
	$wp_customize->add_setting('slide_link3',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link3',array(
			'label'	=> esc_attr__('Slide link 3','hotel'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link3'
	));	
// Slide Image 4
	$wp_customize->add_setting('slide_image4',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider4.jpg',
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	$wp_customize->add_control(
	 	new WP_Customize_Image_Control(
			$wp_customize,
			'slide_image4',
			array(
				'label'	=> esc_attr__('Slide Image 4','hotel'),
				'section'	=> 'slider_section',	
				'setting'	=> 'slide_image4'
			)
		)
	);	
	$wp_customize->add_setting('slide_title4',array(
			'default'	=> 'We Create Wordpress Responsive Theme',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'slide_title4',	array(	
			'label'	=> esc_attr__('Slide title 4','hotel'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title4'		
	));
	$wp_customize->add_setting('slide_desc4',array(
			'default'	=> '',
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'slide_desc4',
			array(
				'label'	=> esc_attr__('Slide description 4','hotel'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc4'
			)
		)
	);		
	$wp_customize->add_setting('slide_link4',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('slide_link4',array(
			'label'	=> esc_attr__('Slide link 4','hotel'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link4'
	));
	// Slide Image 5
	$wp_customize->add_setting('slide_image5',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'slide_image5',
			array(
				'label'	=> esc_attr__('Slide image 5','hotel'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image5'
			)
		)
	);
	$wp_customize->add_setting('slide_title5',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('slide_title5',	array(	
			'label'	=> esc_attr__('Slide title 5','hotel'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title5'
	));
	$wp_customize->add_setting('slide_desc5',array(
			'default'	=> '',
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'slide_desc5',
			array(
				'label'	=> esc_attr__('Slide description 5','hotel'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc5'
			)
		)
	);
	$wp_customize->add_setting('slide_link5',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('slide_link5',array(
			'label'	=> esc_attr__('Slide link 5','hotel'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link5'
	));	
	$wp_customize->add_section('social_sec',array(
			'title'	=> esc_attr__('Social Settings','hotel'),
			'description' => sprintf( __( 'Add social icons link here.<br />More icon available in %s.', 'hotel' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'hotel' )
						)
					),			
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> esc_attr__('Add facebook link here','hotel'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> esc_attr__('Add twitter link here','hotel'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> esc_attr__('Add google plus link here','hotel'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> esc_attr__('Add linkedin link here','hotel'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	$wp_customize->add_section('footer_area',array(
			'title'	=> esc_attr__('Footer Area','hotel'),
			'priority'	=> null,
			'description'	=> esc_attr__('Add footer copyright text','hotel')
	));
	$wp_customize->add_setting('hotel_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new hotel_Info( $wp_customize, 'cred_section', array(
		'label'	=> esc_attr__('To remove credit &amp; copyright text upgrade to PRO version','hotel'),
        'section' => 'footer_area',
        'settings' => 'hotel_options[credit-info]'
        ) )
    );
	$wp_customize->add_setting('menu_title',array(
			'default'	=> esc_attr__('Main Menu','hotel'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('menu_title',array(
			'label'	=> esc_attr__('Add title for menu','hotel'),
			'section'	=> 'footer_area',
			'setting'	=> 'menu_title'
	));	
	
	$wp_customize->add_setting('footer_menu',array(
			'default'	=> esc_attr__('<li><a href="#">Home</a></li><li><a href="#">About Us</a></li> <li><a href="#">Portfolio</a></li><li><a href="#">Contact Us</a></li>','hotel'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'footer_menu', array(
				'label'	=> esc_attr__('','hotel'),
				'section'	=> 'footer_area',
				'setting'	=> 'footer_menu'
			)
		)
	);
	
	$wp_customize->add_setting('news_title',array(
			'default'	=> esc_attr__('Latest News','hotel'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('news_title',array(
			'label'	=> esc_attr__('Add title for latest news','hotel'),
			'section'	=> 'footer_area',
			'setting'	=> 'news_title'
	));	
	
	$wp_customize->add_setting('social_title',array(
			'default'	=> esc_attr__('Follow Us','hotel'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('social_title',array(
			'label'	=> esc_attr__('Add title for footer social icons','hotel'),
			'section'	=> 'footer_area',
			'setting'	=> 'social_title'
	));	
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> esc_attr__('Contact Info','hotel'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> esc_attr__('Add title for footer contact info','hotel'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));	
	
	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> esc_attr__('Contact Details','hotel'),
			'description'	=> esc_attr__('Add you contact details here','hotel'),
			'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> esc_attr__('100 King St, Melbourne PIC 4000, Australia','hotel'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
				'label'	=> esc_attr__('Add contact address here','hotel'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> esc_attr__('Phone: +123 456 7890','hotel'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> esc_attr__('Add contact number here.','hotel'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> esc_attr__('Add you email here','hotel'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));
	
	$wp_customize->add_section(
        'theme_layout_sec',
        array(
            'title' => esc_attr__('Layout Settings (PRO Version)', 'hotel'),
            'priority' => null,
			'description' => sprintf( esc_attr__( 'Layout Settings available in<br /> %s.', 'hotel' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), esc_attr__( 'PRO Version', 'hotel' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('hotel_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new hotel_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'hotel_options[layout-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section(
        'theme_font_sec',
        array(
            'title' => esc_attr__('Fonts Settings (PRO Version)', 'hotel'),
            'priority' => null,
			'description' => sprintf( esc_attr__( 'Font Settings available in<br /> %s.', 'hotel' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), esc_attr__( 'PRO Version', 'hotel' )
						)
					),				
        )
    );  
    $wp_customize->add_setting('hotel_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new hotel_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'hotel_options[font-info]',
        'priority' => null
        ) )
    );
	
    $wp_customize->add_section(
        'theme_doc_sec',
        array(
            'title' => esc_attr__('Documentation &amp; Support', 'hotel'),
            'priority' => null,
			'description' => sprintf( esc_attr__( 'For documentation and support check this link : <br /> %s.', 'hotel' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_DOC.'"' ), esc_attr__( 'Hotel Documentation', 'hotel' )
						)
					),				
        )
    );  
    $wp_customize->add_setting('hotel_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new hotel_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'hotel_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'hotel_customize_register' );

//Integer
function hotel_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function hotel_custom_css(){
		?>
        	<style type="text/css">
					
					a, .header .header-inner .nav ul li a:hover, 
					.signin_wrap a:hover,
					.header .header-inner .nav ul li.current_page_item a,					
					.services-wrap .one_fourth:hover .ReadMore,
					.services-wrap .one_fourth:hover h3,
					.services-wrap .one_fourth:hover .fa,
					.blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,
					.MoreLink:hover,
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a
					{ color:<?php echo get_theme_mod('color_scheme','#02aee7'); ?>;}
					
					.social-icons a:hover, 
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover,
					.nivo-controlNav a.active,
					.header .header-inner .logo,
					.bookbtn,
					.wpcf7 input[type="submit"]
					{ background-color:<?php echo get_theme_mod('color_scheme','#02aee7'); ?>;}
					
					.services-wrap .one_fourth:hover .ReadMore,
					.services-wrap .one_fourth:hover .fa,
					.MoreLink:hover
					{ border-color:<?php echo get_theme_mod('color_scheme','#02aee7'); ?>;}
					
			</style>
<?php        
}
         
add_action('wp_head','hotel_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hotel_customize_preview_js() {
	wp_enqueue_script( 'hotel_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'hotel_customize_preview_js' );


function hotel_custom_customize_enqueue() {
	wp_enqueue_script( 'hotel-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'hotel_custom_customize_enqueue' );