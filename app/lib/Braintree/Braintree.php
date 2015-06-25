<?php

class BrainTree {
	public function submit($billing_information, $amount) {

		$cardinformation = $billing_information['credit_card'];

		$result = Braintree_Transaction::sale(array(
		  'amount' => $amount,
		  'creditCard' => array(
	          'number' => $cardinformation['card_number'],
	          'expirationDate' => $cardinformation['expiration_date'],
	          'cvv' => $cardinformation['cvv'],
	     ), 
		  'billing' => array(
		    'firstName' => $billing_information['first_name'],
		    'lastName' => $billing_information['last_name'],
		    'streetAddress' => $billing_information['address'],
		    'extendedAddress' => $billing_information['address'],
		    'locality' => $billing_information['city'],
		    'region' => $billing_information['state'],
		    'postalCode' => $billing_information['zip'],
		    'countryCodeAlpha2' => 'US'
		  ),
		  'options' => array(
		    'submitForSettlement' => true,
		    'storeInVaultOnSuccess' => true
		  )
		));

		return $result;
	}

	public function generate() {
		$clientToken = Braintree_ClientToken::generate();
		return $clientToken;
	}
}