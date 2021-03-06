<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../header.php');
include_once(dirname(__FILE__).'/zarinpalwebgatepayment.php');

	if (!$cookie->isLogged())
		Tools::redirect('authentication.php?back=order.php');
                
        $currency_default = Currency::getCurrency(intval(Configuration::get('PS_CURRENCY_DEFAULT')));        
        $zarinpalwebgatepayment= new zarinpalwebgatepayment(); // Create an object for order validation and language translations
		
		$order_cart = new Cart(intval($_COOKIE["OrderId"]));
		
		$PurchaseAmount=number_format(Tools::convertPrice(intval($_COOKIE["PurchaseAmount"]), $currency_default), 0, '', '');
		$OrderAmount=number_format(Tools::convertPrice($order_cart->getOrderTotal(true, 3), $currency_default), 0, '', '');
	
        $result = $zarinpalwebgatepayment->confirmPayment($PurchaseAmount);
	
	// We now think that the response is valid, so we can look at the result      
	$result = $zarinpalwebgatepayment->showMessages($result);

	// if we have a valid completed order, validate it

	$hash_data = 'o='.$_COOKIE["OrderId"].$_COOKIE["PurchaseAmount"];
	$hash = crypt($hash_data, Configuration::get('ZARINPAL_HASHKEY'));
	
	if (($result==1) and ($hash==$_COOKIE["ZARINPAL_HASH"]))
	{
		if($PurchaseAmount==$OrderAmount)
			 $zarinpalwebgatepayment->validateOrder(intval($_COOKIE["OrderId"]), _PS_OS_PAYMENT_,$order_cart->getOrderTotal(true, 3), $zarinpalwebgatepayment->displayName, $zarinpalwebgatepayment->l('Payment Accepted'), array(), $cookie->id_currency);
		else
			 $zarinpalwebgatepayment->validateOrder(intval($_COOKIE["OrderId"]), _PS_OS_PAYMENT_,$PurchaseAmount, $zarinpalwebgatepayment->displayName, $zarinpalwebgatepayment->l('Payment Accepted'), array(), $cookie->id_currency);


        setcookie("ZARINPAL_HASH", "", -1);
        setcookie("OrderId", "", -1);
        setcookie("PurchaseAmount","", -1);
 		
        Tools::redirect('history.php');
	}else{
		'ERR: '.$redult;
	}


include_once(dirname(__FILE__).'/../../footer.php');		

?>
