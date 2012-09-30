<?php get_header(); ?>

<div id="container">

  <header id="header">

  </header>

  <div id="content" class="clear-fix" role="main">

    <section class="sidebar well">
      <h2 class="pagination-centered">Sidebar</h2>
      <?php // look to see if we've disabled sidebar in a custom field, if not show it
	$disableSidebarRight = get_post_meta($post->ID, 'disableSidebarRight', $single = true);
      if ($disableSidebarRight !== 'true') { get_sidebar('SidebarRight'); }
      ?>
    </section>

    <section class="posts">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <!--BEGIN: Single Post-->
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

          <header>
            <h1><?php the_title(); ?></h1>
            <time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time('F jS, Y'); ?></time>
            <p>by <?php the_author() ?></p>
          </header>

          <div class="entry">
            <?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
            <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
          </div>

          <!--BEGIN: Post Meta Data-->
          <footer class="post-meta-data">
            <ul class="no-bullet">
              <li>Posted in <?php the_category(', ') ?></li>
              <li><?php edit_post_link('[Edit]', '<small>', '</small>'); ?></li>
              <li>Tags: <?php the_tags('Tags: ', ', ', '<br />'); ?></li>
            </ul>
          </footer>
          <!--END: Post Meta Data-->

          <h2><?php comments_popup_link('Share your comments', '1 Comment', '% Comments'); ?></h2>
          <?php comments_template( '', true ); ?>

        </article>
        <!--END: Single Post-->

        <?php wp_link_pages(); //this allows for multi-page posts ?>

      <?php endwhile; ?>

      <?php else: //ERROR: Nothing Found ?>

        <h2>No posts were found :(</h2>

      <?php endif; ?>

    </section>

  </div>
<!--END: Content-->
		
<?php get_footer(); ?>