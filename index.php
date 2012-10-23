<?php get_header(); ?>

<div id="container">
  <header id="header">
    <img src="<?php bloginfo('template_url'); ?>/img/bat.svg" class="batman" alt="Bat">
  </header>
  <div id="content">
    <section class="findme">
      <p class="hellome">Это я!</p>
      <div class="myphoto"></div>
      <div class="twitter-followers">
        <a href="https://twitter.com/iSnifer" class="twitter-follow-button" data-show-count="true" data-lang="ru">Follow @iSnifer</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
    </section>
    <section class="sidebar">
      <?php
      if ( 'content' != $current_layout ) :
      ?>
      <div id="secondary" class="widget-area" role="complementary">
        <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

        <aside id="archives" class="widget">
          <h3 class="widget-title"><?php _e( 'Архив записей', 'new-style' ); ?></h3>
          <ul>
            <?php wp_get_archives( array( 'type' => 'monthly', 'show_post_count' => true ) ); ?>
          </ul>
        </aside>

        <aside id="tag">
          <h3 class="widget-title"><?php _e( 'Метки', 'new-style' ); ?></h3>
          <?php wp_tag_cloud('smallest=8&largest=22'); ?>
        </aside>

        <aside id="meta" class="widget">
          <h3 class="widget-title"><?php _e( 'Авторизация', 'new-style' ); ?></h3>
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
            <span class="author-meta">автором <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author() ?></a></span>
          </div>

          <?php the_content('<button class="readit-later">Читать далее</button>'); ?>

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