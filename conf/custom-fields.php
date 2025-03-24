<?php

namespace SWM\MapNoteWP;

use function SWP\MapNoteWP\sanitizeCoord;

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('\\SWM\\MapNoteWP\\getPlaceSanitizer')) {
    function getPlaceSanitizer(string $key): callable
    {
        return match ($key) {
            'address',
            'mcid',
            'mcid_name',
            'rcode',
            'sid',
            'type'  => 'sanitize_text_field',
            'coord' => fn($value) => sanitizeCoord($value),
            default => null,
        };
    }
}

$post_subtype = 'map_note_place';

return [
    'post' => [
        'map_note_address'   => [
            'object_subtype'    => $post_subtype,
            'type'              => 'string',
            'description'       => 'Location address.',
            'single'            => true,
            'default'           => '',
            'sanitize_callback' => getPlaceSanitizer('address'),
            'show_in_rest'      => true,
            'get_filter'        => null,
        ],
        'map_note_coord'     => [
            'object_subtype'    => $post_subtype,
            'type'              => 'string',
            'description'       => 'Comma-separete: longitude, latitude',
            'single'            => true,
            'default'           => '',
            'sanitize_callback' => getPlaceSanitizer('coord'),
            'show_in_rest'      => true,
            'get_filter'        => null,
        ],
        'map_note_mcid'      => [
            'object_subtype'    => $post_subtype,
            'type'              => 'string',
            'description'       => 'Naver map\'s own location type code',
            'single'            => true,
            'default'           => '',
            'sanitize_callback' => getPlaceSanitizer('mcid'),
            'show_in_rest'      => true,
            'get_filter'        => null,
        ],
        'map_note_mcid_name' => [
            'object_subtype'    => $post_subtype,
            'type'              => 'string',
            'description'       => 'Naver map\'s own location type name ',
            'single'            => true,
            'default'           => '',
            'sanitize_callback' => getPlaceSanitizer('mcid_name'),
            'show_in_rest'      => true,
            'get_filter'        => null,
        ],
        'map_note_rcode'     => [
            'object_subtype'    => $post_subtype,
            'type'              => 'string',
            'description'       => 'Naver map\'s own unique code - unknown',
            'single'            => true,
            'default'           => '',
            'sanitize_callback' => getPlaceSanitizer('rcode'),
            'show_in_rest'      => true,
            'get_filter'        => null,
        ],
        'map_note_sid'       => [
            'object_subtype'    => $post_subtype,
            'type'              => 'string',
            'description'       => 'Maybe map\'s unique location id',
            'single'            => true,
            'default'           => '',
            'sanitize_callback' => getPlaceSanitizer('sid'),
            'show_in_rest'      => true,
            'get_filter'        => null,
        ],
        'map_note_type'      => [
            'object_subtype'    => $post_subtype,
            'type'              => 'string',
            'description'       => 'Fixed to "place", but some exceptions may be found',
            'single'            => true,
            'default'           => '',
            'sanitize_callback' => getPlaceSanitizer('type'),
            'show_in_rest'      => true,
            'get_filter'        => null,
        ],
    ],
];
