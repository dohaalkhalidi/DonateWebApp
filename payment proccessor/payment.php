<?php
require_once('config.php');
require_once('../Config.php');


function iset( $value ){
    
    return isset($_POST[$value]) && $_POST[$value] != "";
    
}


if (iset("fname") && iset("lname") && iset("country") && iset("city") && iset("id") && iset("email") && iset("regaddress") && iset("amount")) {
    
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $id = $_POST["id"];
    $email = $_POST["email"];
    $regaddress = $_POST["regaddress"];
    $amount = $_POST["amount"];
    
    $itemId = "id" . time();
    if (isset( $_COOKIE[$itemId]) ) {

        unset( $_COOKIE[$itemId]);
        
    }
    $path =  get_directory_url()."/payment%20proccessor/";
    setcookie($itemId, json_encode($_POST), time() + (86400 * 30), $path);
    
    
    // we later retrieve the buyer by fetching this unique id sent in the itemId


    # create request class
    $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
    $request->setLocale(\Iyzipay\Model\Locale::EN);
    $request->setConversationId(123456);
    $request->setPrice($amount);
    $request->setPaidPrice($amount);
    $request->setCurrency(\Iyzipay\Model\Currency::TL);
    $request->setBasketId("B67832");
    $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
    $request->setCallbackUrl(get_directory_url()."/payment proccessor/payment.php");
    $request->setEnabledInstallments(array(2, 3, 6, 9));

    $buyer = new \Iyzipay\Model\Buyer();
    $buyer->setId("B".time());
    $buyer->setName($fname);
    $buyer->setSurname($lname);
    $buyer->setEmail($email);
    $buyer->setIdentityNumber($id);
    $buyer->setRegistrationAddress($regaddress);
    $buyer->setIp("85.34.78.112");
    $buyer->setCity($city);
    $buyer->setCountry($country);
    $request->setBuyer($buyer);

    $shippingAddress = new \Iyzipay\Model\Address();
    $shippingAddress->setContactName("Jane Doe");
    $shippingAddress->setCity("Istanbul");
    $shippingAddress->setCountry("Turkey");
    $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
    $shippingAddress->setZipCode("34742");
    $request->setShippingAddress($shippingAddress);

    $billingAddress = new \Iyzipay\Model\Address();
    $billingAddress->setContactName("Jane Doe");
    $billingAddress->setCity("Istanbul");
    $billingAddress->setCountry("Turkey");
    $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
    $billingAddress->setZipCode("34742");
    $request->setBillingAddress($billingAddress);

    $basketItems = array();
    $firstBasketItem = new \Iyzipay\Model\BasketItem();
    $firstBasketItem->setId($itemId);
    $firstBasketItem->setName("Donation");  
    $firstBasketItem->setCategory1("$amount");
    $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
    $firstBasketItem->setPrice($amount);
    $basketItems[0] = $firstBasketItem;

    $request->setBasketItems($basketItems);

    # make request
    $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());

    # print result
    // var_dump($checkoutFormInitialize);
    header("location: ".json_decode($checkoutFormInitialize->getrawResult())->paymentPageUrl);

}else if( iset("token") ){

    # create request class
    $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
    $request->setLocale(\Iyzipay\Model\Locale::EN);
    $request->setToken($_POST['token']);

    # make request
    $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());

    # print result
    // echo ;
    $data = json_decode($_COOKIE[json_decode($checkoutForm->getrawResult())->itemTransactions[0]->itemId]);

        // the message
    $fname = $data->fname;
    $lname = $data->lname;
    $amount = $data->amount;
    $email = $data->email;


    $db->query("INSERT INTO donators ( fname, lname, email, amount )  VALUES( '$fname', '$lname', '$email', '$amount' ) ");

    // $msg = "A payment was recieved From:  $fname $lname with the amount of $amount TL.";

    // use wordwrap() if lines are longer than 70 characters
    // $msg = wordwrap($msg,70);

    // send email
    // mail( PAYMENT_NOTIFICATION_EMAIL, "new payments", $msg);
    // echo $msg;
    header("location: ../index.php");
   
}else{

    header("location:../index.php");

}



function get_directory_url(){
        
    return "http://$_SERVER[HTTP_HOST]". substr($_SERVER["REQUEST_URI"], 0, strpos($_SERVER["REQUEST_URI"], "/", 1));

}

