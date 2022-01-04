<?php

$sites = [
    'boulanger' => [
        'url' => 'https://www.boulange.com/ref/1147567',
        'xpath' => '//*[@id="product_1649641"]/div[2]/div[2]/div/div[1]/div[3]/div[3]/div/div/p[2]',
        'xpath2' => '//*[@id="product_1649641"]/div[2]/div[2]/div/div[1]/div[3]/div[2]/div/div[3]',
        'stringToSearch' => 'Retrait magasin ou drive indisponible',
    ],
    'amazonFr' => [
        'url' => 'https://www.amazon.fr/Playstation-Sony-PlayStation-5/dp/B08H93ZRK9',
        'xpath' => '//*[@id="availability"]/span/text()',
        'stringToSearch' => 'Actuellement indisponible.',
    ]
];
