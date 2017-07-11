<?php
/*
 * Plugin Name: Make ancient canon insecure
 */

// TODO: Option: date

$modify_before_date = '2017-07-10';

function canon_modify_canonical_url($canonical_url) {
    global $modify_before_date;

	if(is_single() || is_page() ){
        while (have_posts()) {
            the_post();

            $date = get_the_date('Y-m-d');

            if ($date < $modify_before_date) {
                // return $canonical_url ."#$modify_before_date";
                return str_replace('https', 'http', $canonical_url);
            }
        }
    }
    return $canonical_url;
}

add_filter('get_canonical_url', 'canon_modify_canonical_url');
