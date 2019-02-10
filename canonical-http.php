<?php
/*
 * Plugin Name: Canonical URL is http:
 */

function canon_modify_canonical_url($canonical_url) {
    return str_replace('https://', 'http://', $canonical_url);
}

add_filter('get_canonical_url', 'canon_modify_canonical_url');

// AddThis uses the permalink
add_filter('post_link', 'canon_modify_canonical_url');
add_filter('page_link', 'canon_modify_canonical_url');

// Yoast SEO has its own canonical URL
add_filter('wpseo_canonical', 'canon_modify_canonical_url');
