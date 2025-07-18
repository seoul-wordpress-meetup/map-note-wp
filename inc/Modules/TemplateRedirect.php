<?php

namespace SWM\MapNoteWP\Modules;

use Bojaghi\Contract\Module;
use Bojaghi\ViteScripts\ViteScript;
use SWM\MapNoteWP\Supports\MapNoteView;

class TemplateRedirect implements Module
{
    private int $mapPage;

    public function __construct(
        Options                 $options,
        private NaverMapScripts $naverMapScripts,
        private ViteScript      $viteScript,
    )
    {
        add_action('template_redirect', [$this, 'templateRedirect'], 9999);

        $this->mapPage = (int)$options->map_note_wp->get()['map_page'] ?? '';
    }

    public function templateRedirect(): void
    {
        if (($post = get_post()) && $this->mapPage === $post->ID) {
            mapNoteWpGet(MapNoteView::class)->display();
            exit;
        }
    }

    public function prepareBlankTemplate(): void
    {
        if (has_action('wp_footer', 'the_block_template_skip_link')) {
            remove_action('wp_footer', 'the_block_template_skip_link');
        }

        wp_deregister_script('hoverintent-js');
        wp_deregister_style('dashicons');
    }

    public function enqueueNaverMaps(): void
    {
        $this->naverMapScripts->enqueueNaverMap();

        $this->viteScript->add(
            handle: 'map-note',
            relPath: 'src/map-note.tsx',
        );
    }
}
