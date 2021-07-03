<?php

$vendorDir = dirname(__DIR__);
$rootDir = dirname(dirname(__DIR__));

return array (
  'cstudios/embed-boards' => 
  array (
    'class' => 'cstudios\\embedboards\\Plugin',
    'basePath' => $vendorDir . '/cstudios/embed-boards/src',
    'handle' => 'embed-boards',
    'aliases' => 
    array (
      '@cstudios/embedboards' => $vendorDir . '/cstudios/embed-boards/src',
    ),
    'name' => 'Embed Boards',
    'version' => 'v1.0.1',
    'description' => 'Embed any HTML code into a separate menu.',
    'developer' => 'Cstudios s.r.o',
    'developerUrl' => 'https://cstudios.sk',
    'developerEmail' => 'gergely@cstudios.ninja',
  ),
  'labyrintoom/labyrintoom-custom' => 
  array (
    'class' => 'labyrintoom\\labyrintoomcustom\\LabyrintoomCustom',
    'basePath' => $vendorDir . '/labyrintoom/labyrintoom-custom/src',
    'handle' => 'labyrintoom-custom',
    'aliases' => 
    array (
      '@labyrintoom/labyrintoomcustom' => $vendorDir . '/labyrintoom/labyrintoom-custom/src',
    ),
    'name' => 'Labyrintoom Custom',
    'version' => '1.0.0',
    'description' => 'Custom Craft 3 plugin for Labyrintoom',
    'developer' => 'Samiullah Mahjoor',
    'developerUrl' => 'https://samiullahmahjoor.info',
    'documentationUrl' => 'https://github.com/SamiullahMahjoor/labyrintoom-custom/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/SamiullahMahjoor/labyrintoom-custom/master/CHANGELOG.md',
    'components' => 
    array (
      'labyrintoomCustomService' => 'labyrintoom\\labyrintoomcustom\\services\\LabyrintoomCustomService',
    ),
  ),
);
