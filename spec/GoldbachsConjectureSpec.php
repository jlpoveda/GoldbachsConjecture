<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GoldbachsConjectureSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('GoldbachsConjecture');
    }

    function it_is_pair()
    {
        $this->isPair(2)->shouldReturn(true);
        $this->isPair(3)->shouldReturn(false);
    }

    function it_is_prime()
    {
        $this->isPrime(100)->shouldReturn(false);
        $this->isPrime(1)->shouldReturn(false);
        $this->isPrime(13)->shouldReturn(true);
        $this->isPrime(2)->shouldReturn(true);
        $this->isPrime(37)->shouldReturn(true);
    }

    function it_returns_prime_pairs_ading_to_the_number()
    {
        $this->returnPairs(5)->shouldreturn([
            [2, 3],
        ]);
        $this->returnPairs(20)->shouldreturn([
            [3, 17],
            [7, 13],
        ]);
    }

    function it_is_a_valid_argument()
    {
        $exception = new \InvalidArgumentException("The argument must be a positive pair natural goldbachsNumber");

        $this->shouldThrow($exception)->duringValidate(1);
        $this->shouldThrow($exception)->duringValidate(-5);
        $this->shouldThrow($exception)->duringValidate(3.14);
        $this->shouldThrow($exception)->duringValidate("foo");
        $this->shouldThrow($exception)->duringValidate(9);
        $this->shouldNotThrow($exception)->duringValidate(2);
        $this->shouldNotThrow($exception)->duringValidate(100);
    }
}
