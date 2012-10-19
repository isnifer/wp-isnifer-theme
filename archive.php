<?php get_header(); ?>

<div id="container">

  <header id="header">

  </header>

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

        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <h1 class="page-title">Archive for &#8216;<?php single_cat_title(); ?>&#8217;</h1>
        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <h1 class="page-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h1 class="page-title">Archive for <?php the_time('F jS, Y'); ?></h1>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h1 class="page-title">Archive for <?php the_time('F, Y'); ?></h1>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h1 class="page-title">Archive for <?php the_time('Y'); ?></h1>
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h1 class="page-title">Author Archive</h1>
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h1 class="page-title">Blog Archives</h1>
        <?php } ?>

          <!--BEGIN: Archive-->


            <?php while (have_posts()) : the_post(); ?>
              <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <h2 id="post-<?php the_ID(); ?>" class="archive_header"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                <small><?php the_time('l, F jS, Y') ?></small>

                <div class="entry">
                  <?php the_content() ?>
                </div>

                <?php if(!is_tag()): // don't show this stuff on tag pages '?>
                <!--BEGIN: Post Meta Data-->
                <div class="clear-fix" style="margin-top: 20px;"></div>
                <footer class="post-meta-data">
                  <ul class="no-bullet">
                    <li class="add-comment"><?php comments_popup_link('Оставьте ваш комментарий', '1 комментарий', '% комментариев'); ?></li>
                    <li>Posted in <?php the_category(', ') ?></li>
                    <li><?php edit_post_link('Изменить', '<b>', '</b>'); ?></li>
                    <li><?php the_tags('Метки: ', ', ', '<br />'); ?></li>
                  </ul>
                </footer>
                <!--END: Post Meta Data-->
                <?php endif; ?>
              </article>
            <?php endwhile; ?>
          <!--END: Archive-->

        <nav class="navigation">
          <?php posts_nav_link('&nbsp;','<div class="alignright">Туда &raquo;</div>','<div class="alignleft">&laquo; Сюда</div>') ?>
        </nav>

    </section>

    <?php else : // ERROR: nothing found ?>

      <h2>Постов не надо :(</h2>

    <?php endif; ?>


<?php get_footer(); ?>