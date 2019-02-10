<?php
/*
 * Plugin Name: Canonical URL is http:
 * Plugin URI: https://github.com/lastorset/wordpress-canonical-http
 * Description: Modify the canonical URL used by Facebook etc. to use HTTP instead of HTTPS. This is needed to preserve share counts when turning on TLS.
 * Version: 1.0
 * Author: Leif Arne Storset
 * Author URI: https//github.com/lastorset
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
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
