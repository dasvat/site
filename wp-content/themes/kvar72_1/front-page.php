<?php get_header(); ?>
<section>
<div class="main-wrapper">
<div class="entering">Мы предлагаем 1, 2, 3х комнатные квартиры с хорошим ремонтом, чистые, уютные, имеется все необходимое для проживания. 
Мебель, бытовая техника и электроника, постельное белье и полотенца, посуда. Интернет Wi-Fi и кабельное телевидение. 
Скидки на долговременное проживание. 
</div>
<div class="posts">
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<div class="post">
		<div class="entry">
		<?php the_content(); ?>
		</div>
		<span class="post_btn post_btn_right"><a href="<?php the_permalink()?>">Подробнее</a></span>
		<span class="post_btn post_btn_left"><a href="<?php the_permalink()?>">Заказать</a></span>
	</div>
	<div class="clear"></div>
	<?php endwhile; endif; ?>
	</div>
	</div>
</section>
<?php get_footer(); ?>