<?php

// Fungsi untuk menambahkan custom meta box pada post type "Event"
function add_event_meta_box()
{
  add_meta_box(
    'event_details',
    'Event Details',
    'event_details_callback',
    'event',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'add_event_meta_box');

// Callback function untuk menampilkan custom meta box pada post type "Event"
function event_details_callback($post)
{
  // Retrieve saved values for location, start datetime, and end datetime
  $event_location = get_post_meta($post->ID, 'event_location', true);
  $event_start_datetime = get_post_meta($post->ID, 'event_start_datetime', true);
  $event_end_datetime = get_post_meta($post->ID, 'event_end_datetime', true);
  if (empty($event_start_datetime)) {
    $event_start_datetime = current_time('Y-m-d\TH:i');
  }
  if (empty($event_end_datetime)) {
    $event_end_datetime = current_time('Y-m-d\TH:i');
  }
  // Output fields for location, start datetime, and end datetime
?>
  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="event_location">Location:</label>
    <input type="text" id="event_location" name="event_location" value="<?php echo esc_attr($event_location); ?>" class="w-full border border-gray-300 px-3 py-2 rounded-sm focus:outline-none focus:border-blue-500">
  </div>

  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="event_start_datetime">Start Datetime:</label>
    <input type="datetime-local" id="event_start_datetime" name="event_start_datetime" value="<?php echo esc_attr($event_start_datetime); ?>" class="w-full border border-gray-300 px-3 py-2 rounded-sm focus:outline-none focus:border-blue-500">
  </div>

  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="event_end_datetime">End Datetime:</label>
    <input type="datetime-local" id="event_end_datetime" name="event_end_datetime" value="<?php echo esc_attr($event_end_datetime); ?>" class="w-full border border-gray-300 px-3 py-2 rounded-sm focus:outline-none focus:border-blue-500">
  </div>
<?php
}

// Fungsi untuk menyimpan nilai field pada post type "Event"
function save_event_meta($post_id)
{
  if (isset($_POST['event_location'])) {
    update_post_meta($post_id, 'event_location', sanitize_text_field($_POST['event_location']));
  }
  if (isset($_POST['event_start_datetime'])) {
    update_post_meta($post_id, 'event_start_datetime', sanitize_text_field($_POST['event_start_datetime']));
  }
  if (isset($_POST['event_end_datetime'])) {
    update_post_meta($post_id, 'event_end_datetime', sanitize_text_field($_POST['event_end_datetime']));
  }
}
add_action('save_post_event', 'save_event_meta');
