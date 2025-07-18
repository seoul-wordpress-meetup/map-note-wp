<?php
/**
 * Plugin Name: Map Note for WP
 * Description: Add descriptions to your favorite locations.
 * Plugin URI: https://github.com/seoul-wordpress-meetup/map-note-wp
 * Author: Seoul WordPress Meetup
 * Author URI: https://www.meetup.com/ko-KR/wordpress-meetup-seoul/
 * Version: 0.1.0
 * Requires PHP: 8.0
 * Requires at least:
 * License: GPLv2-or-later
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

const MAP_NOTE_MAIN = __FILE__;
const MAP_NOTE_VERSION = '0.1.0';

mapNoteWp();
