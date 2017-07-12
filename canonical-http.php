<?php
/*
 * Plugin Name: Make ancient canon insecure
 */

// TODO: Option: date

$modify_before_date = '2017-07-14';


function canon_modify_canonical_url($canonical_url) {
    global $modify_before_date;

    $date = get_the_date('Y-m-d');

    if ($date < $modify_before_date) {
        return str_replace('https://', 'http://', $canonical_url);
    } else {
        return str_replace('http://', 'https://', $canonical_url);
    }
}

add_filter('get_canonical_url', 'canon_modify_canonical_url');

// AddThis uses the permalink
add_filter('post_link', 'canon_modify_canonical_url');
add_filter('page_link', 'canon_modify_canonical_url');

// Yoast SEO has its own canonical URL
add_filter('wpseo_canonical', 'canon_modify_canonical_url');
