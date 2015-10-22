<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kvar72
 */

?>

	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer_wrapper">
			<div class="logo" id="footer_logo">
				<a href="http://Kvar72.ru">
					<img src="/site/wp-content\themes\kvar72\images\log.png"/>
				</a>
			</div>
			<div class="contacts">
				<span><a href="">ГРУППА В ВК</a></span><br>
				<span><a href="">СТРАНИЦА В ВК</a></span><br>
				<span>+7(3452)903-223</span><br>
				<span>+7(932)472-55-62</span>
			</div>
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kvar72' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kvar72' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'kvar72' ), 'kvar72', '<a href="http://2coz.ru/" rel="designer">2coz.ru</a>' ); ?>
			</div><!-- .site-info -->
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
