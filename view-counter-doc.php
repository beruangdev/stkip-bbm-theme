<script>
    let chartData = <?= json_encode(get_transient('apvc_get_visit_stats')) ?>;
    console.log("🚀 ~ file: header.php:18 ~ chartData:", chartData)
</script>

<script>
    fetch("http://stkipbbm.local/wp-json/wp-statistics/v2/metabox?from=2023-07-20&to=2023-07-27&name=hits&_=1690462826490", {
        "headers": {
            "accept": "application/json, text/javascript, */*; q=0.01",
            "accept-language": "en-US,en;q=0.9,id;q=0.8",
            "access-control-allow-origin": "*",
            "x-wp-nonce": "d41ee4d28a"
        },
        "referrer": "http://stkipbbm.local/wp-admin/admin.php?page=wps_hits_page&from=2023-07-20&to=2023-07-27",
        "referrerPolicy": "strict-origin-when-cross-origin",
        "body": null,
        "method": "GET",
        "mode": "cors",
        "credentials": "include"
    }).then(res => res.json()).then(data => {
        console.log("🚀 data:", data)
    })
</script>

// Advanced Page Visit Counter

<?php
wp_send_json([
    "apvc_get_visit_stats" => get_transient('apvc_get_visit_stats'),
    "apvc_yearly_data" => get_transient('apvc_yearly_data'),
    "apvc_monthly_data" => get_transient('apvc_monthly_data'),
    "apvc_weekly_data" => get_transient('apvc_weekly_data'),
    "apvc_daily_data" => get_transient('apvc_daily_data'),
]);
$transients = array(
    'apvc_yearly_data',
    'apvc_monthly_data',
    'apvc_weekly_data',
    'apvc_daily_data',
    'apvc_browser_traffic_stats_data',
    'apvc_browser_traffic_data',
    'apvc_ref_traffic_data',
    'apvc_os_data',
    'apvc_orders_total',
    'apvc_total_orders_data',
    'apvc_total_products_sales',
    'apvc_mvp_month_data',
    'apvc_mvp_daily_data',
    'apvc_fv_30_td',
    'apvc_fv_30_past',
    'apvc_fv_td',
    'apvc_fv_past',
    'apvc_get_visitors_mn_data',
    'apvc_get_visitors_data',
    'apvc_pvp_30_data',
    'apvc_pvp_ip_30_data',
    'apvc_pvp_daily_data',
    'apvc_pvp_ip_daily_data',
    'apvc_get_visit_stats'
);
