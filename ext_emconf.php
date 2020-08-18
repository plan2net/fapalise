<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Fapalise — Faster page link service',
    'description' => 'Performant link service for TYPO3 for numeric page links',
    'category' => 'be',
    'author' => 'Wolfgang Klinger',
    'author_email' => 'wk@plan2.net',
    'state' => 'beta',
    'clearCacheOnLoad' => 1,
    'author_company' => 'plan2net GmbH',
    'version' => '0.1.1',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99'
        ]
    ]
];
