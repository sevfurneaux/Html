<?php
declare(strict_types=1);

namespace Mammalia\Html\Ast;

use Mammalia\Html\Ast\Element;
use Mammalia\Html\Serializer\Text as TextSerializer;
use Mammalia\Html\Serializer\TextElement as Serializer;

class TextElement extends Element implements Serializer
{

    protected $text;

    public function __construct(string $localName, array $attributes, TextSerializer $text)
    {
        parent::__construct($localName, $attributes);
        $this->text = $text;
    }

    public function toHtml() : string
    {
        $htmlAttributes = $this->attributesToHtml();
        $htmlLocalName = $this->localName;
        $htmlText = $this->text->toHtml();
        return "<{$htmlLocalName}{$htmlAttributes}>$htmlText</$htmlLocalName>";
    }
}
