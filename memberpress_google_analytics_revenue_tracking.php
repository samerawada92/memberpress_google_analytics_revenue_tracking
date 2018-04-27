<?php
// Track Conversions Value in Analytics
function trackPurchase($txn){
	// Variables
	$product = $txn->product_id;
	$amount = $txn->amount;
	$amount = (int)$amount;
	
	// Google Analytics Event Parameters
	$x  =   [   
        'v'=>'1',
        't'=>'event',
        'tid'=>'UA-116959377-1', 
        'cid'=>'62f43561-72bd-438a-a16e-7b8e054e5c0c',
        'ec'=>'Revenue',
        'ea' => 'Transaction',
        'el' => $product,
        'ev' => $amount
    ];

    // Build Query
    $x  = http_build_query($x); 

    // Initiate HTTP Post Request
    $ch = curl_init();
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    curl_setopt($ch,CURLOPT_USERAGENT, $user_agent);
    curl_setopt($ch, CURLOPT_URL,"https://www.google-analytics.com/collect");
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-type: application/x-www-form-urlencoded'));
    curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
    curl_setopt($ch,CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$x);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec ($ch);
    curl_close ($ch);
	return($server_output);
}

add_action('mepr-txn-status-complete', 'trackPurchase', 1);
?>