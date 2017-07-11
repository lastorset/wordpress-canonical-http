<?php
/*
 * Plugin Name: Make ancient canon insecure
 */

// TODO: Option: date

$modify_before_date = '2017-07-10';

function canon_should_modify() {
    global $modify_before_date;

    try {
        if ((is_single() || is_page()) && have_posts()) {
            while (have_posts()) {
                the_post();

                $date = get_the_date('Y-m-d');

                if ($date < $modify_before_date) {
                    return true;
                }
            }
        }
        return false;
    } finally {
        rewind_posts();
    }
}

function canon_modify_url($original_url) {
    return str_replace('https', 'http', $original_url);
}

function canon_modify_canonical_url($canonical_url) {
    if (canon_should_modify()) {
        return canon_modify_url($canonical_url);
    }
    return $canonical_url;
}

add_filter('get_canonical_url', 'canon_modify_canonical_url');
