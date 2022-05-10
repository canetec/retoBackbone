<?php

return (new \PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP80Migration:risky' => true,
        '@PHP80Migration' => true,
        '@PHP81Migration' => true,
        '@PSR12' => true,
        '@PhpCsFixer' => true,
        '@PSR12:risky' => true,
        '@PhpCsFixer:risky' => true,
    ])
    ->setFinder(
        (new \PhpCsFixer\Finder())
            ->ignoreVCSIgnored(true)
            ->in(['app', 'config', 'database', 'lang', 'routes', 'tests'])
            ->name('*.php')
    );
