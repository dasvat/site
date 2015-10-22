<?php
get_header(); 
?>
<?php if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) : ?>   
<div class="container">
     <div class="page_content">
        <section class="site-main">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
                        hotel_pagination();
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
                    </div><!-- blog-post -->
             </section>
      
        <?php get_sidebar();?>     
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php else: ?>
<div class="clear"></div>
 <section id="FrontBlogPost">
  <div class="container">
  <h1 class="entry-title"><center><?php _e('Latest Posts','hotel'); ?></center></h1>       
     <div class="site-main" id="sitefull">         
       <?php
	   $p = 0;
        global $wp_query;
        query_posts(array_merge($wp_query->query, array(
            'paged'          => get_query_var('paged'),
            'posts_per_page' => 3, 'orderby' => 'title', 'order' => 'DESC' )));       
    ?>
       <?php global $wp_query; ?>
        <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?><?php $p++; ?>      
            <div class="blog_lists BlogPosts <?php if( $p%3==0 ){?>last_column<?php } ?>">        
              <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <?php if( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail(); ?>
                <?php } else {  ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/img_404.png" />
                <?php } ?>
                </a>
               <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div class="blog-meta"><?php echo get_the_date(); ?> | <?php comments_number(); ?></div>
              <?php echo hotel_content(30); ?>
              <a class="MoreLink" href="<?php the_permalink(); ?>">Read more &raquo;</a> 
              <div class="clear"></div>
          </div>       
        <?php endwhile; ?> 
        <?php //hotel_pagination(); ?>   
      <div class="clear"></div>
  </div> 
  </div><!-- .container -->   
 </section><!-- #FrontBlogPost -->  
<?php endif; ?>
<?php get_footer(); ?>