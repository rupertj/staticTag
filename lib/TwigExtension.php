<?php

namespace loque\staticTag;

use \Twig_Extension;

class TwigExtension extends Twig_Extension {

  public function getTokenParsers() {
    return array(
      new TokenParser(),
    );
  }

  public function getName() {
    return 'staticTag';
  }
}