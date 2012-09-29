<?php get_header(); ?>

<div class="container" xmlns="http://www.w3.org/1999/html">
  <header class="header">

  </header>
  <div class="content">
    <section class="sidebar well">
      <h2 class="pagination-centered">Sidebar</h2>
      <a href="#" class="thumbnail"><img src="http://placehold.it/200x300" alt=""></a>
      <a href="#" class="thumbnail"><img src="http://placehold.it/200x300" alt=""></a>
      <a href="#" class="thumbnail"><img src="http://placehold.it/200x300" alt=""></a>
      <a href="#" class="thumbnail"><img src="http://placehold.it/200x300" alt=""></a>
    </section>
    <section class="posts">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); //BEGIN: The Loop ?>
      <article class="blogpost" id="post-<?php the_ID(); ?>">

				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time('F jS, Y'); ?></time>
				<h6>Автор: <a href="/author/<?php the_author_link() ?>"><?php the_author() ?></a></h6>

				<div class="entry">
					<?php the_content('<button class="btn btn-info">Читать далее</button>'); ?>
				</div>

			</article>

			<ul class="no-bullet">
					<li class="add-comment">» <?php comments_popup_link('Оставьте Ваш комментарий', '1 комментарий', 'Комментариев (%)'); ?></li>
					<li>» Рубрики: <?php the_category(', ') ?></li>
					<li>» <?php edit_post_link('Редактировать пост', '<small>', '</small>'); ?></li>
					<li><?php the_tags('Метки: ', ', ', '<br />'); ?></li>
				</ul>
			<?php endwhile; ?>
    </section>
    <?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
						<?php kriesi_pagination(); ?>
		<?php endif; ?>

		<?php else : ?>
			<h2>No posts were found :(</h2>
		<?php endif; ?>
  </div>

<?php get_footer(); ?>
