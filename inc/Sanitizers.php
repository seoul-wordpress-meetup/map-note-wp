<?php

namespace SWP\MapNoteWP;

function sanitizeCoord(mixed $coord): string
{
    if (!is_string($coord)) {
        return '';
    }

    $exploded = explode(',', $coord, 2);
    if (count($exploded) !== 2) {
        return '';
    }

    $lat = sanitize_text_field($exploded[0]);
    if (!filter_var($lat, FILTER_VALIDATE_FLOAT)) {
        $lat = '';
    }

    $lng = sanitize_text_field($exploded[1]);
    if (!filter_var($lng, FILTER_VALIDATE_FLOAT)) {
        $lng = '';
    }

    return $lat && $lng ? "{$lat},{$lng}" : '';
}
