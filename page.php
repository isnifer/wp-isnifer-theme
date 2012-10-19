<?php get_header(); ?>

<div id="container">

  <header id="header">

  </header>
<!--BEGIN: Content-->
<div id="content" class="clear-fix" role="main">
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
    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

        <!--BEGIN: Post-->
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

          <header>
            <h1><?php the_title(); ?></h1>
            <time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time('F jS, Y'); ?></time>
            <span class="author-meta">автором <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author() ?></a></span>
          </header>

          <div class="entry">
            <?php the_content("Читать далее " . the_title('', '', false)); ?>
          </div>

          <h2 class="add_comment"><?php comments_popup_link('Выразить мнение', '1 комментарий', '% комментариев'); ?></h2>
          <?php comments_template( '', true ); ?>

        </article>
        <!--END: Post-->

        <?php wp_link_pages(); //this allows for multi-page posts ?>

      <?php endwhile; ?>

        <div class="navigation">
          <?php posts_nav_link('&nbsp;','<div class="alignleft">&laquo; Назад</div>','<div class="alignright">Вперед &raquo;</div>') ?>
        </div>

      <?php else : // ERROR: nothing found ?>

        <h2>Постов не найдено :(</h2>

    <?php endif; ?>
  </section>

</div>
<!--END: Content-->

<?php get_footer(); ?>