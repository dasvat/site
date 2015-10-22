<?php get_header(); ?>
<div class="main-heading">
</div>
<section>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="post">
		<div class="post-date"><span class="post-month"><?php the_time('M') ?></span> <span class="post-day"><?php the_time('j') ?></span></div>
		<div class="post-title">
		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		<span class="post-cat"><a href="#"><?php the_category(', ') ?></a></span> <span class="post-comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span> 
		</div>
		<div class="entry">
		<?php the_content(); ?>
		</div>
		</div>
	<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>