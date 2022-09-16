<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/app/');

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@Symfony' => true,
    'no_empty_comment' => false,
    'yoda_style' => false,
])->setFinder($finder);
