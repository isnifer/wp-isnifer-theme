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

	<h1 class="search-header">Результаты поиска</h1>

	<section class="posts">
	<?php
	
	// Query Posts
	
	//BEGIN: The Loop
	if (have_posts()) : while (have_posts()) : the_post();?>
	
		<div class="search-result-item">
		<!--BEGIN: List Item-->
			<a <?php post_class('ClearFix') ?> id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" title="Click to read more...">
			
				<strong><?php the_title(); ?></strong>

				<!--BEGIN: Large Thumbnail-->
				<?php $thumbLg = get_post_meta($post->ID, 'thumb_lg', $single = true); // if theres a thumbnail get it ?>
				
				<?php if ($thumbLg !== '') : ?>
					
					<img class="alignleft" alt="<?php echo the_title(); ?>" src="<?php echo '/wp-content' . "$thumbLg" ?>" />

				<?php endif; ?>
				<!--END: Large Thumbnail-->
				
				<!--BEGIN: Excerpt-->
				<span class="entry">
					<?php the_excerpt("Continue reading &rarr;"); ?>
				</span>
				<!--END: Excerpt-->
						
			</a>
		<!--END: List Item-->
		</div>	
		
		<?php endwhile; ?>

    <div class="navigation">
      <?php posts_nav_link('&nbsp;','<div class="alignleft">&laquo; Сюда</div>','<div class="alignright">Туда &raquo;</div>') ?>
    </div>

		<?php else : // if no posts were found give the warning below ?>

		<div class="post sys error">
			<p>Ничего не найдено! Проверь не ошибки, попробуй еще:</p>
			<?php get_search_form(); ?>
		</div>
		
	<?php endif; //END: The Loop ?>

  </section>

</div>
<!--END: Content-->

<?php get_footer(); ?>