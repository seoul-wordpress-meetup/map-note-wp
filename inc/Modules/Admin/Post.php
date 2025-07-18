<?php

namespace SWM\MapNoteWP\Modules\Admin;

use Bojaghi\Contract\Module;

class Post implements Module
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'addMetaBoxes'], 10, 2);
    }

    public function addMetaBoxes(string $postType, \WP_Post $_): void
    {
        if (CPT_MAP_PLACE === $postType) {
            add_meta_box(
                id: 'swm-edit-map-place',
                title: __('Place Map', 'map-note-wp'),
                callback: function () {
                    mapNoteWpGet(\SWM\MapNoteWP\Supports\Admin\MetaBox\Place::class)->displayMetaBox();
                },
            );
        }
    }
}
