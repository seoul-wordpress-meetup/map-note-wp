<?php

use SWM\MapNoteWP\Supports\Admin\SettingsView;

if (!defined('ABSPATH')) {
    exit;
}

/** @see Bojaghi\AdminMenus\AdminMenus */
return [
    'add_submenu' => [
        [
            'parent_slug' => 'options-general.php',                                                            // Required
            'page_title'  => _x('Map Note Settings', 'Settings page title', 'map-note-wp'), // Required
            'menu_title'  => _x('Map Note Settings', 'Settings menu title', 'map-note-wp'), // Required
            'capability'  => 'manage_options',                                              // Required
            'menu_slug'   => SettingsView::PAGE_SLUG,                                       // Required
            'callback'    => function () { echo 'okay'; },                                  // Optional, but almost required.
        ],
    ],
];
