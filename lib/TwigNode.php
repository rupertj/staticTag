<?php

namespace loque\staticTag;

use \Twig_Node;
use \Twig_Compiler;

class TwigNode extends Twig_Node {

    public function __construct($asset, $line, $tag = null) {
        parent::__construct(array(), array('asset' => $asset), $line, $tag);
    }

    public function compile(Twig_Compiler $compiler) {
        $compiler
            ->addDebugInfo($this)
            ->write('echo ')
            ->string($this->getAsset())
            ->raw(";\n")
        ;
    }

    protected function getAsset() {
      $asset = $this->getAttribute('asset');

      // @todo: Change the asset arg into what we actually want to put in the template here.

      return $asset;
    }
}