<?php
/*
thanks to:
http://themeshaper.com/2009/07/01/wordpress-theme-comments-template-tutorial/
http://ponderwell.net/2010/07/html5-forms-and-wp-3-0-comments/
*/
?>

<div id="comments">

<?php // Run some checks for bots and password protected posts
    $req = get_option('require_name_email'); // Checks if fields are required.
    if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
        die ( 'Please do not load this page directly. Thanks!' );
    if ( ! empty($post->post_password) ) :
        if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>

	<div class="nopassword"><?php _e('Эта заметка защищена паролем. Введите пароль, чтобы увидеть комментарии.', 'your-theme') ?></div>

	</div><!-- .comments -->

<?php
        return;
    endif;
endif;
?>
 
<?php if ( have_comments() ) : // See IF there are comments and do the comments stuff! ?>
 
<?php //Count the number of comments and trackbacks (or pings)
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
    get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>
 
<?php /* IF there are comments, show the comments */ ?>
<?php if ( ! empty($comments_by_type['comment']) ) : ?>
 
	<div id="comments-list" class="comments">
	<!--h3><?php printf($comment_count > 1 ? __('<span>%d</span> комментария (-ев)', 'your-theme') : __('<span>Один</span> комментарий', 'your-theme'), $comment_count) ?></h3-->
 
<?php /* If there are enough comments, build the comment navigation  */ ?>
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
	<div id="comments-nav-above" class="comments-navigation">
	<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
	</div><!-- #comments-nav-above -->
<?php endif; ?>                  
 
<?php /* An ordered list of our custom comments callback, custom_comments(), in functions.php   */ ?>

	<ol>
		<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
	</ol>
 
<?php /* If there are enough comments, build the comment navigation */ ?>
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
	<div id="comments-nav-below" class="comments-navigation">
		<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
	</div><!-- #comments-nav-below -->
<?php endif; ?>                
 
</div><!-- #comments-list .comments -->
 
<?php endif; // ($comment_count) ?>
 
<?php // If there are trackbacks(pings), show the trackbacks ?>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>
	
	<div id="trackbacks-list" class="comments">
		<h3><?php printf($ping_count > 1 ? __('<span>%d</span> Отклика (-ов)', 'your-theme') : __('<span>Один</span> отклик', 'your-theme'), $ping_count) ?></h3>
 
		<?php /* An ordered list of our custom trackbacks callback, custom_pings(), in functions.php   */ ?>
		<ol>
			<?php wp_list_comments('type=pings&callback=custom_pings'); ?>
		</ol>
	</div><!-- #trackbacks-list .comments -->
	
<?php endif // ($ping_count) ?>
<?php endif // ($comments) ?>
 
<?php /* If comments are open, build the respond form */ ?>
<?php if ( 'open' == $post->comment_status ) : ?>
                <div id="respond">
                    <div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                    <p id="login-req"><?php printf(__('Вы должны быть <a href="%s" title="Log in">авторизованы</a> для комментирования.', 'your-theme'),
                    get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>
 
<?php else : ?>
                    <div class="formcontainer">  
 
                        <form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
 
<?php if ( $user_ID ) : ?>
                            <p id="login"><?php printf(__('<span class="loggedin">Вы вошли как <a href="%1$s" title="Вы вошли как %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Выйти?">Выйти?</a></span>', 'your-theme'),
                                get_option('siteurl') . '/wp-admin/profile.php',
                                wp_specialchars($user_identity, true),
                                wp_logout_url(get_permalink()) ) ?></p>
 
<?php else : ?>
 
                            <p id="comment-notes"><?php _e('Ваша электропочта <em>никому</em> не будет видна.', 'your-theme') ?> <?php if ($req) _e('Обязательные поля помечены <span style="color: red;">*</span>', 'your-theme') ?></p>
 
              <div id="form-section-author" class="form-section">
                                <div class="form-label"><label for="author"><?php _e('Имя', 'your-theme') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'your-theme') ?></div>
                                <div class="form-input"><input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>
              </div><!-- #form-section-author .form-section -->
 
              <div id="form-section-email" class="form-section">
                                <div class="form-label"><label for="email"><?php _e('Почта', 'your-theme') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'your-theme') ?></div>
                                <div class="form-input"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>
              </div><!-- #form-section-email .form-section -->
 
              <div id="form-section-url" class="form-section">
                                <div class="form-label"><label for="url"><?php _e('Сайт', 'your-theme') ?></label></div>
                                <div class="form-input"><input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
              </div><!-- #form-section-url .form-section -->
 
<?php endif /* if ( $user_ID ) */ ?>
 
              <div id="form-section-comment" class="form-section">
                                <div class="form-label"><label for="comment"><?php _e('Коммент', 'your-theme') ?></label></div>
                                <div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea></div>
              </div><!-- #form-section-comment .form-section -->

 
<?php do_action('comment_form', $post->ID); ?>
 
                            <div class="form-submit"><input id="submit" name="submit" type="submit" value="<?php _e('Запилить коммент', 'your-theme') ?>" tabindex="7" class="btn btn-info" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>
 
<?php comment_id_fields(); ?> 
 
<?php /* Just … end everything. We're done here. Close it up. */ ?> 
 
                        </form><!-- #commentform -->
                    </div><!-- .formcontainer -->
<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>
                </div><!-- #respond -->
<?php endif /* if ( 'open' == $post->comment_status ) */ ?>

</div><!-- #comments -->