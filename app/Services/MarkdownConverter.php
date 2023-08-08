<?php

namespace App\Services;

use Parsedown;

class MarkdownConverter
{
    protected $parser;

    public function __construct(Parsedown $parser)
    {
        $this->parser = $parser;
    }

    public function convertToHtml($markdown)
    {
        return $this->parser->text($markdown);
    }
}