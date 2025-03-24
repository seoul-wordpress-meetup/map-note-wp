<?php

use Bojaghi\Continy\Continy;
use SWM\MapNoteWP\Modules;

if (!defined('ABSPATH')) {
    exit;
}

return [
    'main_file' => dirname(__DIR__) . '/map-note-wp.php',
    'version'   => '0.0.0',
    'hooks'     => [
        'admin_init' => 0,
        'init'       => 0,
    ],
    'arguments' => [
        'bojaghi/customFields'     => __DIR__ . '/custom-fields.php',
        'bojaghi/customPosts'      => __DIR__ . '/custom-posts.php',
        'bojaghi/customTaxonomies' => __DIR__ . '/custom-taxonomies.php',
        'bojaghi/template'         => [
            [
                'infix'  => 'tmpl',
                'scopes' => [
                    dirname(__DIR__) . '/inc/Templates',
                ],
            ],
        ],
        'bojaghi/viteScripts'      => fn(Continy $continy) => [
            [
                'distBaseUrl'  => plugins_url('dist', $continy->getMain()),
                'isProd'       => false,
                'manifestPath' => plugin_dir_path($continy->getMain()) . 'dist/.vite/manifest.json',
            ]
        ],
        'mapNote/naverMapScripts'  => function (Continy $continy) {
            $clientId = defined('NCLOUD_CLIENT_ID') ? NCLOUD_CLIENT_ID : '';
            if (!$clientId) {
                $setup    = $continy->get('mapNote/options')->map_note_wp->get();
                $clientId = $setup['client_id'] ?? '';
            }
            return $clientId;
        },
        'mapNote/options'          => __DIR__ . '/options.php',
    ],
    'bindings'  => [
        // Bojaghi vendors
        'bojaghi/customFields'     => Bojaghi\Fields\Modules\CustomFields::class,
        'bojaghi/customPosts'      => Bojaghi\Cpt\CustomPosts::class,
        'bojaghi/customTaxonomies' => Bojaghi\Tax\CustomTaxonomies::class,
        'bojaghi/template'         => Bojaghi\Template\Template::class,
        'bojaghi/viteScripts'      => Bojaghi\ViteScripts\ViteScript::class,
        // In-house modules
        'mapNote/admin/Post'       => Modules\Admin\Post::class,
        'mapNote/admin/Settings'   => Modules\Admin\Settings::class,
        'mapNote/kses'             => Modules\KSES::class,
        'mapNote/naverMapScripts'  => Modules\NaverMapScripts::class,
        'mapNote/options'          => Modules\Options::class,
        'mapNote/templateRedirect' => Modules\TemplateRedirect::class,
    ],
    'modules'   => [
        'admin_init' => [
            Continy::PR_DEFAULT => [
                'mapNote/admin/Post',
            ],
        ],
        'init'       => [
            Continy::PR_HIGH    => [
                'bojaghi/template',
                'bojaghi/viteScripts',
                'mapNote/naverMapScripts',
            ],
            Continy::PR_DEFAULT => [
                'bojaghi/customFields',
                'bojaghi/customPosts',
                'bojaghi/customTaxonomies',
                'mapNote/admin/Settings',
                'mapNote/kses',
                'mapNote/options',
                'mapNote/templateRedirect',
            ],
        ]
    ],
];
