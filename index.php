<?php get_header(); ?>

<div id="container">
  <header id="header">

  </header>
  <div id="content">
    <section class="sidebar">
      <?php
      if ( 'content' != $current_layout ) :
      ?>
      <div id="secondary" class="widget-area" role="complementary">
        <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

        <aside id="archives" class="widget">
          <h3 class="widget-title"><?php _e( 'Archives', 'new-style' ); ?></h3>
          <ul>
            <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
          </ul>
        </aside>

        <aside id="meta" class="widget">
          <h3 class="widget-title"><?php _e( 'Meta', 'new-style' ); ?></h3>
          <ul>
            <?php wp_register(); ?>
            <li><?php wp_loginout(); ?></li>
            <?php wp_meta(); ?>
          </ul>
        </aside>

        <?php endif; // end sidebar widget area ?>
      </div><!-- #secondary .widget-area -->
      <?php endif; ?>
    </section>
    <section class="posts">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); //BEGIN: The Loop ?>
      <div class="post-block" id="post-<?php the_ID(); ?>">
        <article class="blogpost">

          <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
          <div class="entry-meta">
            Опубликовано
            <time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><a href="<?php the_permalink() ?>"><?php the_time('F jS, Y'); ?></a></time>
            <span class="author-meta">автором <a href="/author/<?php the_author_link() ?>"><?php the_author() ?></a></span>
          </div>

          <?php the_content('<button class="btn btn-info">Читать далее</button>'); ?>

        </article>

        <ul class="no-bullet">
          <li>» <span class="categories">Рубрика:</span> <?php the_category(', ') ?></li>
          <li>» <span class="categories">Метки:</span><?php the_tags(' ', ', ', '<br />'); ?></li>
          <li>» <?php comments_popup_link('Добавить комментарий', '1 комментарий', 'Комментариев (%)'); ?> <?php edit_post_link('Изменить'); ?></li>
          <li>» <a href="#top-header">Наверх</a></li>
        </ul>
      </div>
      <?php endwhile; ?>
    </section>
    <div class="clear-fix"></div>
    <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

		<?php else : ?>
			<h2>No posts were found :(</h2>
		<?php endif; ?>
  </div>

<?php get_footer(); ?>