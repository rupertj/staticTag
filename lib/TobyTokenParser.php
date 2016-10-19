<?php

namespace loque\staticTag;

use \Twig_TokenParser;
use \Twig_Token;

class TobyTokenParser extends Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $parser = $this->parser;
        $stream = $parser->getStream();

        $name = $stream->expect(Twig_Token::NAME_TYPE)->getValue();
        $stream->expect(Twig_Token::OPERATOR_TYPE, '=');
        $value = $parser->getExpressionParser()->parseExpression();
        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new TobyNode($name, $value, $token->getLine(), $this->getTag());
    }

    public function getTag()
    {
        return 'toby';
    }
}