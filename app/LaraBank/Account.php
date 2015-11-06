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

	public function setConverter(Converter $converter)
	{
	 	$this->converter = $converter;
	}

	public function getDogecoinsAmount()
	{
		return $this->dogecoins;
	}

	public function displayAmount($type = 'dogecoins')
	{
		if ($this->dogecoins === 0) {
			return "Sorry, you do not have any dogecoins";
		} else if ($type === 'USD') {
			$usd = $this->converter->convert($this->dogecoins);
			return "You have $usd USD";
		}
		
		return "You have ".$this->dogecoins; 
	}

	public function deposit($amount)
	{
		if (is_numeric($this->dogecoins)) 
			if ($amount > 0)
				$this->dogecoins = $this->dogecoins + $amount;
		else
			return new \InvalidArgumentException("Deposit a numerical amount.");
	}

	public function canConvert($type) {
		return $this->converter->getCurrencyName() === $type;
	}

}

/************************
 * Copy and Paste Code
 ************************/
// if ($type === 'USD') {
// 	$usd = $this->converter->convert($this->dogecoins);
// 	return "You have $usd USD";
// }