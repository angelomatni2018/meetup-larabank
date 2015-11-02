<?php

use LaraBank\Account;
use LaraBank\Converter;
use Mockery as m;

class AccountTest extends PHPUnit_Framework_TestCase {
	
	public function tearDown() 
	{
		m::close();
	}
	
	public function testCreatedInstanceIsInstanceOfAccount() 
	{
		$account = new Account('Hao', 30);
		$this->assertInstanceOf('LaraBank\Account', $account);
	}

	 public function testDepositSuccessfullyAddsToAccount() 
	 {
	 	$account = new Account('Hao', 20);
	 	$account->deposit(30);
	 	$this->assertEquals(50, $account->getDogecoinsAmount());
	 }

	public function testDisplayAmountIfUserHasNoAmount()
	{
		$account = new Account('Hao', 0);
		$this->assertEquals("Sorry, you do not have any dogecoins", $account->displayAmount());
	}

	public function xtestDisplayAmountIfUserHasSomeAmount()
	{
		/**
		 * Write Test for Exercise 1 Here
		 */
	}

	public function xtestDepositIfAmountIsLessThanZero()
	{
		/**
		 * Write Test for Exercise 1 Extra Credit Here
		 */
	}

	
	public function xtestDepositIfAmountIsNotANumber()
	{
		/**
		 * Write Test for Exercise 1 Extra Credit Here
		 * Don't know how to assert Exceptions?
		 * check out http://bit.ly/1ACZsAE
		 */
	}

	// public function testDisplayAmountToUSD()
	// {
	// 	$account = new Account('Hao', 10);
	// 	$converter = new Converter();
	// 	$account->setConverter($converter);
	// 	$msg = $account->displayAmount('USD');
	// 	$this->assertContains('You have 25 USD', $msg);
	// }

	// public function testDisplayAmountToUSDMocked()
	// {
	// 	$account = new Account('Hao', 10);
	// 	$converter = m::mock('\LaraBank\Converter');
	// 	$converter->shouldReceive('convert')->times(1)->andReturn(1000);
	// 	$account->setConverter($converter);
	// 	$msg = $account->displayAmount('USD');
	// 	$this->assertContains('You have 1000 USD', $msg);
	// }
	
	public function xtestCanConvertSuccessfulIfConverterSet()
	{
		/**
		 * Write Code Here for Exercise 2
		 */
	}
}