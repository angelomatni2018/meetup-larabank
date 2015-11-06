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

	public function testDisplayAmountIfUserHasSomeAmount()
	{
		$account = new Account('Hao', 20);
		$this->assertEquals("You have 20", $account->displayAmount());
	}

	public function testDepositIfAmountIsLessThanZero()
	{
		$account = new Account('Hao',50);
		$account->deposit(-1);
		$this->assertEquals(50, $account->getDogecoinsAmount());
	}

	
	public function testDepositIfAmountIsNotANumber()
	{
		$acc = new Account('Hao', 10);
		$acc->deposit('Not a number');
		$this->assertEquals(10, $acc->getDogecoinsAmount());
	}

	public function testDisplayAmountToUSD()
	{
	 	$account = new Account('Hao', 10);
	 	$converter = new Converter();
	 	$account->setConverter($converter);
	 	$msg = $account->displayAmount('USD');
	 	$this->assertContains('You have 25 USD', $msg);
	}

	public function testDisplayAmountToUSDMocked()
	{
	 	$account = new Account('Hao', 10);
	 	$converter = m::mock('\LaraBank\Converter');
	 	$converter->shouldReceive('convert')->times(1)->andReturn(1000);
	 	$account->setConverter($converter);
	 	$msg = $account->displayAmount('USD');
	 	$this->assertContains('You have 1000 USD', $msg);
	}
	
	public function xtestCanConvertSuccessfulIfConverterSet()
	{
		$acc = new Account('Hao', 10);
		$converter = m::mock('\LaraBank\Converter');
		$converter->shouldReceive('getCurrencyName')->times(1)->andReturn('USD');
		$account->setConverter($converter);
		$this->assertTrue($account->canConvert('USD'));
	}
}