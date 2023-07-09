<?php
if (post_password_required()) {
  return;
}

class TailwindCSS_Comment_Walker extends Walker_Comment
{
  public function start_lvl(&$output, $depth = 0, $args = array())
  {
    $output .= '<ul class="children">';
  }

  public function end_lvl(&$output, $depth = 0, $args = array())
  {
    $output .= '</ul>';
  }

  public function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0)
  {
    $depth++;
    $GLOBALS['comment'] = $comment;
    $comment_id = get_comment_ID();

    $output .= '<li ';
    $output .= comment_class(empty($args['has_children']) ? '' : 'parent', $comment);
    $output .= ' id="comment-' . $comment_id . '">';

    $output .= '<div id="div-comment-' . $comment_id . '" class="comment-body">';

    $output .= '<div class="comment-author vcard">';
    $output .= get_avatar($comment, $args['avatar_size']);
    $output .= '</div>';

    $output .= '<div class="comment-content">';
    $output .= '<div class="comment-meta">';
    $output .= '<h4 class="comment-author-name">' . get_comment_author_link() . '</h4>';
    $output .= '<time class="comment-time">' . get_comment_date() . ' at ' . get_comment_time() . '</time>';
    $output .= '</div>';

    if ('0' == $comment->comment_approved) {
      $output .= '<p class="comment-awaiting-moderation">' . __('Your comment is awaiting moderation.') . '</p>';
    }

    $output .= '<div class="comment-text">' . get_comment_text() . '</div>';

    $output .= '<div class="comment-reply">';
    $output .= '<span class="comment-reply-link">' . get_comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])), $comment_id) . '</span>';
    $output .= '</div>';

    $output .= '</div>';

    $output .= '</div>';
  }

  public function end_el(&$output, $comment, $depth = 0, $args = array())
  {
    $output .= '</li>';
  }
}

?>

<div id="comments" class="comments-area">
  <?php if (have_comments()) : ?>
    <h2 class="comments-title text-xl font-semibold text-gray-800 dark:text-white">
      <?php
      $comments_number = get_comments_number();
      if ($comments_number === 1) {
        echo '1 Comment';
      } else {
        echo $comments_number . ' Comments';
      }
      ?>
    </h2>

    <ul class="comment-list mt-4">
      <?php
      wp_list_comments(array(
        'style'      => 'ul',
        'short_ping' => true,
        'avatar_size' => 60,
        'walker'     => new TailwindCSS_Comment_Walker(),
      ));
      ?>
    </ul>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav class="comment-navigation" role="navigation">
        <div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
        <div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
      </nav>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
    <p class="no-comments"><?php _e('Comments are closed.'); ?></p>
  <?php endif; ?>

  <?php
  $commenter = wp_get_current_commenter();
  $req = get_option('require_name_email');
  $aria_req = ($req ? " aria-required='true'" : '');
  $fields = array(
    'author' => '<div class="flex flex-wrap mb-4"><div class="w-full md:w-1/2"><label for="author" class="block text-gray-800 dark:text-white">Name' . ($req ? ' <span class="required">*</span>' : '') . '</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' class="form-input w-full rounded-md"></div>',
    'email' => '<div class="w-full md:w-1/2"><label for="email" class="block text-gray-800 dark:text-white">Email' . ($req ? ' <span class="required">*</span>' : '') . '</label><input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' class="form-input w-full rounded-md"></div></div>',
  );
  $comment_field = '<div class="mb-4"><label for="comment" class="block text-gray-800 dark:text-white">Comment' . ($req ? ' <span class="required">*</span>' : '') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-textarea w-full rounded-md"></textarea></div>';
  $args = array(
    'fields' => apply_filters('comment_form_default_fields', $fields),
    'comment_field' => $comment_field,
    'class_submit' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded',
    'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
  );
  comment_form($args);
  ?>
</div>