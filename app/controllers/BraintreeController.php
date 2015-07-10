<?php

class BraintreeController extends BaseController {

	protected $braintree;

	public function __construct(BrainTree $braintree) {
		$this->braintree = $braintree;
	}

	public function purchase() {
		$braintree = $this->braintree;
		
		
	}
}