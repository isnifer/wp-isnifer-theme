<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://ogp.me/ns#">

<head>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow|Lobster&subset=cyrillic' rel='stylesheet'>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php
		global $page, $paged;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
		?></title>

	<!-- BEGIN: Open Graph meta tags for Facebook...  Add in your App ID and or Admins here -->
    <meta property="fb:app_id" content="your_app_id" />
    <meta property="fb:admins" content="your_admin_id" />

	<meta property="og:title" content="<?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' );/* Add a page number if necessary: */if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', '' ), max( $paged, $page ) ); ?>" />
    <meta property="og:url" content="<?php the_permalink() ?>"/>

	<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>

	<?php if (is_single() || is_page()): ?>
	    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
	    <meta property="og:type" content="article" />

		<?php if (function_exists('get_the_image')) $imgArray = get_the_image(array('format' => 'array')); //get the image array ?>
		<meta property="og:image" content="<?php if($imgArray != null) echo $imgArray[src]; else echo wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) ) ?>" />

	<?php else: ?>
	    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
	    <meta property="og:type" content="website" />
	    <meta property="og:image" content="<?php bloginfo('template_url') ?>/path/to-your/logo.jpg" />
	<?php endif; ?>

	<!--END: Open Graph facebook tags-->

	<!-- favicon & other link Tags -->
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="/images/custom_icon.png"/><!-- 114x114 icon for iphones and ipads -->
	<link rel="copyright" href="#copyright" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- CSS -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" media="screen" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox/jquery.fancybox.css" />
  <!--link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox/helpers/jquery.fancybox-buttons.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox/helpers/jquery.fancybox-thumbs.css" /-->


	<!--BEGIN: include iphone stylesheet-->
	<?php if ($iphone == true) : ?>
		<link href="<?php echo $templateURL; ?>/css/iphone.css" type="text/css" rel="stylesheet" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
	<?php endif; ?>

	<?php wp_head(); ?>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/functions.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/modernizr_2_0_6_dev.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/jquery-1.7.2.min.js"></script>

  <!-- Bootstrap -->
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/bootstrap-dropdown.js"></script>

  <!-- Fancybox -->
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/jquery.mousewheel-3.0.6.pack.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/jquery.fancybox.pack.js"></script>
  <!--script type="text/javascript" src="<?php bloginfo('template_url'); ?>/css/jquery.fancybox/helpers/jquery.fancybox-buttons.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/css/jquery.fancybox/helpers/jquery.fancybox-media.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/css/jquery.fancybox/helpers/jquery.fancybox-thumbs.js"></script-->

  <script type="text/javascript">
    $(document).ready(function(){
      $('.dropdown-toggle').dropdown();
      $("a[href$='.png'], a[href$='.jpg'], a[href$='.jpeg']").fancybox();
    })
  </script>

</head>

<body id="<?php $post_parent = get_post($post->post_parent); $parentSlug = $post_parent->post_name; if (is_category()) { echo "category-template"; } elseif (is_archive()) { echo "archive-template"; } elseif (is_search()) { echo "search-results"; } elseif (is_tag()) { echo "tag-template"; } else { echo $parentSlug; } ?>" class="<?php global $wp_query; $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true ); $tn = str_replace(".php", "", $template_name); echo "template-".$tn." "; ?><?php if (is_category()) { echo 'category'; } elseif (is_search()) { echo 'search'; } elseif (is_tag()) { echo "tag"; } elseif (is_home()) { echo "home"; } elseif (is_404()) { echo "page404"; } else { echo $post->post_name; } ?>">

	<div id="navbar-top">
    <div class="navbar-container">
      <a class="brand" href="/">
        Пространственно-временной континуум
      </a>
      <form class="navbar-search" method="get" id="search-form" action="<?php bloginfo('home'); ?>/">
        <input type="text" class="input-medium search-query" value="<?php the_search_query(); ?>" name="s" id="s" accesskey="s" tabindex="1" placeholder="Это поиск">
        <input class="button" type="submit" value="Go &gt;" tabindex="2" style="visibility: hidden;" />
      </form>
      <ul class="nav nav-pulls" id="top-header">
        <li class="dropdown" id="menu1">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
            Подкаст WhyBeKey
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="http://whybekey.podfm.ru">PodFM</a></li>
            <li><a href="http://vk.com/whybekey">VK</a></li>
            <li><a href="http://itunes.apple.com/us/podcast/ybk/id531116741">iTunes</a></li>
            <li><a href="/whybekey">LIVE</a></li>
          </ul>
        </li>
        <li class="divider-vertical"></li>
      </ul>
    </div>
  </div>
