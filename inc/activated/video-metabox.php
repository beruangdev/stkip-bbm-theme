<?php

// Fungsi untuk menambahkan custom meta box pada post type "Video"
function add_video_meta_box()
{
  add_meta_box(
    'video_details',
    'Video Details',
    'video_details_callback',
    'video',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'add_video_meta_box');

// Callback function untuk menampilkan custom meta box pada post type "Video"
function video_details_callback($post)
{
  // Retrieve saved value for YouTube URL
  $video_youtube_url = get_post_meta($post->ID, 'video_youtube_url', true);

  // Output field for YouTube URL
?>
  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="video_youtube_url">YouTube URL:</label>
    <input type="text" id="video_youtube_url" name="video_youtube_url" value="<?php echo esc_attr($video_youtube_url); ?>" class="w-full border border-gray-300 px-3 py-2 rounded-sm focus:outline-none focus:border-blue-500">
    <p class="text-gray-600 text-sm mt-2">Enter the YouTube video URL.</p>
  </div>
<?php
}

// Fungsi untuk menyimpan nilai field pada post type "Video"
function save_video_meta($post_id)
{
  if (isset($_POST['video_youtube_url'])) {
    update_post_meta($post_id, 'video_youtube_url', sanitize_text_field($_POST['video_youtube_url']));
  }
}
add_action('save_post_video', 'save_video_meta');
