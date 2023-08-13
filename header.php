<?php
// wp_send_json([
//     // 'range' => wp_statistics_visitor(["start" => date("Y-m-d"), "end" => date("Y-m-d", strtotime("-20 day"))]),
//     // 'date("Y-m-d", strtotime("-1 day"))' => wp_statistics_visitor(date("Y-m-d", strtotime("-1 day")), true),
//     // "date('Y-m-d H:i:s')" => wp_statistics_visitor(date('Y-m-d H:i:s')),
//     // 'date("Y-m-d")' => wp_statistics_visitor(date("Y-m-d")),
//     '0' => wp_statistics_visitor('0', true),
//     '1' => wp_statistics_visitor('-1', true),
//     '2' => wp_statistics_visitor('-2', true),
//     '3' => wp_statistics_visitor('-3', true),
//     '4' => wp_statistics_visitor('-4', true),
//     '5' => wp_statistics_visitor('-5', true),
//     // 'today' => wp_statistics_visitor('today'),
//     // 'yesterday' => wp_statistics_visitor('yesterday'),
//     "date('Y-m-d')" => date('Y-m-d'),
//     "date('Y-m-d')-today" => wp_statistics_visitor(date('Y-m-d')),
// ])
// wp_statistics_visitor('today');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul Halaman -->
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <!-- Deskripsi Situs -->
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- Meta Tag untuk Penelusuran -->
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">

    <!-- Canonical URL -->
    <?php if (is_singular()) : ?>
        <link rel="canonical" href="<?php the_permalink(); ?>">
    <?php endif; ?>

    <?php wp_head() ?>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>
</head>


<body <?php body_class('flex flex-col') ?> x-data x-cloak>
    <?php wp_body_open(); ?>

    <?php if (wp_is_mobile()) : ?>
        <?= get_template_part('template-parts/component/navbar/navbar-mobile') ?>
    <?php else : ?>
        <?= get_template_part('template-parts/component/navbar/navbar-desktop') ?>
    <?php endif; ?>

    <main class="flex-grow w-full">