<?php
?>
<div id="footer-wrapper">
    	<div class="container">

                <div class="cols-4 widget-column-4">
                   <h5><?php echo get_theme_mod('contact_title',__('Contact Info','hotel')); ?></h5> 
                   <p><?php echo get_theme_mod('contact_add',__('100 King St, Melbourne PIC 4000,<br /> Australia','hotel')); ?></p>
              <div class="phone-no"><?php echo get_theme_mod('contact_no',__('<strong>Phone:</strong> +123 456 7890','hotel')); ?> <br  />
             
           <strong> Email:</strong> <a href="mailto:<?php echo get_theme_mod('contact_mail','contact@company.com'); ?>"><?php echo get_theme_mod('contact_mail','contact@company.com'); ?></a></div>
              
                   
                </div><!--end .widget-column-4-->
                
                
            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt"><?php echo hotel_credit(); ?></div>
                <div class="design-by"><?php echo hotel_themebytext(); ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>