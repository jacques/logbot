<?php
$message = $_SERVER['argv']['1'];

log_value('localhost', 8675, $message);

function log_value ($server, $port, $value) {
  $sock = fsockopen("udp://$server", $port, $errno, $errstr);
  if (!$sock) {
    die("Could not connect: " . $errstr);
  } else {
    fwrite($sock, "$value");
    fclose($sock);
  }
}
