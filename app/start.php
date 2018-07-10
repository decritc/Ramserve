<?php
require '../vendor/autoload.php';

define('SITE_URL', 'http://ramserve.hopto.org');

$paypal = new \PayPal\Rest\ApiContext(
    new \Paypal\Auth\OAuthTokenCredential(
    'AS7WS-sjpI6nXEMEPSdDeZh816AP3L2m4spZ9AKND_ENwAFWP3tdwjrFJt-JHc324IxBA6zzTtAKXlnt',
    'EGkPkfBy22FfEA2hOkDBeaRFTrbAGpc4oMxHO2-4r5yVHhexBIcpgmtkNsK4QE467QZh2_DqleiS8BrB'
    )

);
 ?>
