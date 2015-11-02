<?php namespace LaraBank;

class Account {
	protected $accountNumber;
	protected $userName;
	protected $dogecoins;
	protected $converter;

	public function __construct($userName, $amount, Converter $converter = null)
	{
		$this->userName = $userName;
		$this->dogecoins = $amount;
		if (! is_null($converter)) {
			$this->converter = $converter;
		}
	}

	// public function setConverter(Converter $converter)
	// {
	// 	$this->converter = $converter;
	// }

	public function getDogecoinsAmount()
	{
		return $this->dogecoins;
	}

	public function displayAmount($type = 'dogecoins')
	{
		if (is_numeric($this->dogecoins)) 
			return $this->dogecoins > 0 ? $this->dogecoins : "Sorry, you do not have any dogecoins";
		return "HI";
	}

	public function deposit($amount)
	{
		/**
		 * Write Code Here for Exercise 1 Extra Credit
		 */

		$this->dogecoins = $this->dogecoins + $amount;
	}

	public function canConvert($type) {
		/**
		 * Write Code Here for Exercise 2
		 */
	}

}

/************************
 * Copy and Paste Code
 ************************/
// if ($type === 'USD') {
// 	$usd = $this->converter->convert($this->dogecoins);
// 	return "You have $usd USD";
// }