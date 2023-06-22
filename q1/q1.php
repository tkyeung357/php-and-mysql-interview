<?php
/*
Reference: https://en.wikipedia.org/wiki/99_Bottles_of_Beer# 
The song's lyrics are as follows, with mathematical values substituted:[1][2]
(n) bottles of beer on the wall. (n) bottles of beer. 
Take one down, pass it around, (n-1) bottles of beer on the wall. 
(caution: this mathematical formula ends with n=1, the song does not use negative numbers). 
*/

namespace Q1;
class Wall
{
	private $bottles = 0;

	public function __construct()
	{
		$this->bottles = 99;
	}

	public function take_one()
	{
		$this->bottles -= 1;
		
		return $this;
	}

	public function get_bottles()
	{
		return $this->bottles;
	}
}

class NNBottlesSong
{
	private $wall = null;

	public function __construct(Wall $wall)
	{
		$this->wall = $wall;
	}

	public function sing()
	{

		while($this->wall->get_bottles() > 0) {
			$tmp = $this->wall->get_bottles();
			print_r("{$tmp} bottles of beer on the wall, {$tmp} bottles of beer\n");
			$tmp = $this->wall->take_one()->get_bottles();
			print_r("take one down pass it around, {$tmp} bottles of beer\n\n");
		}

		print_r("No more bottles of beer on the wall, no more bottles of beer.\n");
		print_r("We've taken them down and passed them around; now we're drunk and passed out!\n");
	}
}

$song = new NNBottlesSong(new Wall());
$song->sing();
