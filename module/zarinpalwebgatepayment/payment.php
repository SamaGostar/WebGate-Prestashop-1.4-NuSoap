<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../header.php');
include_once(dirname(__FILE__).'/zarinpalwebgatepayment.php');

if (!$cookie->isLogged())
    Tools::redirect('authentication.php?back=order.php');
	
$zarinpalwebgatepayment= new zarinpalwebgatepayment();
echo $zarinpalwebgatepayment->execPayment($cart);

include_once(dirname(__FILE__).'/../../footer.php');

?>
