<?php

namespace loque\staticTag;

use \Twig_TokenParser;
use \Twig_Token;

class TokenParser extends Twig_TokenParser {

    public function parse(Twig_Token $token) {
        $parser = $this->parser;
        $stream = $parser->getStream();

        $asset = $stream->expect(Twig_Token::STRING_TYPE)->getValue();

        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new TwigNode($asset, $token->getLine(), $this->getTag());
    }

    public function getTag() {
        return 'static';
    }
}