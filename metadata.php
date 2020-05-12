<?php

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'vouchignore',
    'title'        => '<span style="font-family:monospace;background-color:#000000;color:#FFFFFF;">&nbsp;pflaesterer&nbsp;</span> - vouchignore',
    'thumbnail'    => 'logo.png',
    'email'        => 'oxid@pflaesterer.org',
    'url'          => 'https://github.com/pflaesterer/vouchignore',
    'description'  => array(
        'en' => 'If acitive, it ignores vouchers on check if basket is below minimum order price.',
        'de' => 'Ist das Modul aktiv, werden Gutscheine bei der Prüfung auf den Mindestbestellwert nicht berücksichtigt.',
    ),
    'version'      => '1.0.2',
    'author'       => 'Philip Pflästerer',
    
    /*
        Don't forget "composer dump-autoload" when creating new controllers or extending functionality.
        Also see the "autoload"-section in composer.json in root-dir.
    */
    'extend' => [
        \OxidEsales\Eshop\Application\Model\Basket::class => \Pflaesterer\VouchIgnore\Application\Model\Basket::class,
      ],

);

