<?php

use SimpleSoftwareIO\QrCode\Facades\QrCode;

function generateQR(string $url)
{
  $from = [255, 0, 0];
  $to = [0, 0, 255];

  return QrCode::size(200)
    ->style('dot')
    ->eye('circle')
    ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
    ->margin(1)
    ->generate(
      $url
    );
}
