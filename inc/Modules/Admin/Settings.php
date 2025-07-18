<?php

namespace SWM\MapNoteWP\Modules\Admin;

use Bojaghi\Contract\Module;
use SWM\MapNoteWP\Supports\Admin\SettingsView;

class Settings implements Module
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addMenuPage']);
    }

    public function addMenuPage(): void
    {
        add_options_page(
            _x('Map Note Settings', 'Settings page title', 'map-note-wp'),
            _x('Map Note Settings', 'Settings menu title', 'map-note-wp'),
            'manage_options',
            SettingsView::PAGE_SLUG,

        );
    }

    public function outputSettings(): void
    {
        mapNoteWpGet(SettingsView::class)->display();
    }
}
