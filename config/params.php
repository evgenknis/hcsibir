<?php
use kartik\datecontrol\Module;

class Constants
{
  const GROUP_A = 1;
  const GROUP_B = 2;
  
  const PLACE_SKA = 1;
  const PLACE_RODNIK = 2;
  const PLACE_SMALLARENA = 3;
}

return [
    'adminEmail' => 'admin@example.com',   
     // format settings for displaying each date attribute (ICU format example)
    'dateControlDisplay' => [
        Module::FORMAT_DATE => 'dd-MM-yyyy',
        Module::FORMAT_TIME => 'hh:mm',
        Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm', 
    ],   
    // format settings for saving each date attribute (PHP format example)
    'dateControlSave' => [
        Module::FORMAT_DATE => 'php:Y-m-d', // saves as unix timestamp
        Module::FORMAT_TIME => 'php:H:i:s',
        Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
    ]
];
