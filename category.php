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

        <h1 class="category-header">Записи в категории: <?php single_cat_title(); ?></h1>

        <?php while (have_posts()) : the_post(); ?>

          <!--BEGIN: Post-->
          <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

            <header>
              <h1><a href="<?php the_permalink() ?>" rel="bookmark" title='Click to read: "<?php strip_tags(the_title()); ?>"'><?php the_title(); ?></a></h1>
              <p class="post-date"><?php the_time('F jS, Y') ?> &#8212; <?php the_category(', ') ?></p>
            </header>

            <div class="entry">
              <?php the_content(); ?>
            </div>

            <!--BEGIN: Post Meta Data-->
            <footer class="post-meta-data">
              <ul class="no-bullet">
                <li><?php the_time('F jS, Y') ?> by <?php the_author() ?></li>
                <li class="add-comment"><?php comments_popup_link('Оставьте ваш комментарий', '1 комментарий', '% комментариев'); ?></li>
                <li><?php edit_post_link('Изменить', '<b>', '</b>'); ?></li>
                <li><div class="utw"><?php if(function_exists ('UTW_ShowTagsForCurrentPost')) {UTW_ShowTagsForCurrentPost("commalist","",0); } ?></div></li>
              </ul>
            </footer>
            <!--END: Post Meta Data-->

          </article>
          <!--END: Post-->

        <?php endwhile; ?>


          <div class="navigation">
            <?php posts_nav_link('&nbsp;','<div class="alignleft">&laquo; Previous Page</div>','<div class="alignright">Next Page &raquo;</div>') ?>
          </div>
    </section>
    <?php else : //ERROR: nothing was found ?>

    <h2>No posts were found :(</h2>

    <?php endif; ?>

<!--END: Content-->

<?php get_footer(); ?>