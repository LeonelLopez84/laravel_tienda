<?php 

namespace Ecommerce;

class PayPal
{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId="ARma-uTsryvQxG1UuVJz149AQ2WB9nrfY4cH1J4ZZ2W0Q6YxVT0taqN6jGRpGexvi-hLraWA0ulQY-MJ";
	private $_ClientSecret="EOiclqTXlRSOKCjoVE6FOO8p-h1GT1afEs56eJ3U6hEZg-GX-IG81BuaugK_8o15olB6EsKVqMop8g6p";
    /**
     * summary
     */
    public function __construct($shopping_cart)
    {
        $this->_apiContext= \Paypalpayment::ApiContext($this->_ClientId,$this->_ClientSecret);

        $config=config("paypal_payment");

        $flatConfig = array_dot($config);

        $this->_apiContext->setConfig($flatConfig);

        $this->shopping_cart =  $shopping_cart;
    }


 	public function generate()
 	{
 		$payment=\PaypalPayment::payment()->setIntent("sale")
 								->setPayer($this->payer())
 								->setTransactions([$this->transaction()])
 								->setRedirectUrls($this->redirectURLs());
 		try{
 		 	$payment->create($this->_apiContext);

 		 }catch(\Exception $ex){
 		 	dd($ex);
 		 	exit(1);
 		 }

 		 return $payment;
 	}

 	public function payer()
 	{
 		return \PaypalPayment::payer()->setPaymentMethod("paypal");
 	}

 	public function transaction()
 	{
 		return \PaypalPayment::transaction()
 							->setAmount($this->amount())
 							->setItemList($this->items())
 							->setDescription("Tu compra en esta tienda")
 							->setInvoiceNumber(uniqid());
 	}

 	public function amount()
 	{
 		return \PaypalPayment::amount()->setCurrency("USD")
 							->setTotal($this->shopping_cart->total());
 	}

 	public function items()
 	{
 		$items= [];

 		$products = $this->shopping_cart->products()->get();

 		foreach ($products as $product) {
 			array_push($items, $product->paypalItem());
 		}
 	}

 	public function redirectURLs()
 	{
 		$baseURL = url('/');

 		return \PaypalPayment::redirectURLs()
 							->setReturnUrl("$baseURL/payments/store")
 							->setCancelUrl("$baseURL/carrito");
 	}

 	public function execute($paymentId, $payerId)
 	{
 		$payment = \PaypalPayment::getById($paymentId,$this->_apiContext);
 		$execution  = \PaypalPayment::PaymentExecution()
 									->setPayerId($payerId);

 		return $payment->execute($execution,$this->_apiContext);

 	}
}
