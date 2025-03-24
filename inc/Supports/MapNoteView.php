<?php

namespace SWM\MapNoteWP\Supports;

use Bojaghi\ViteScripts\ViteScript;
use SWM\MapNoteWP\Modules\NaverMapScripts;
use SWM\MapNoteWP\Modules\TemplateRedirect;

class MapNoteView implements View
{
    public function __construct(
        private TemplateRedirect $templateRedirect,
    )
    {
    }

    public function display(): void
    {
        $this->templateRedirect->prepareBlankTemplate();
        $this->templateRedirect->enqueueNaverMaps();

        echo mapNoteTmpl('app-template'); // TODO: KSES
    }
}
