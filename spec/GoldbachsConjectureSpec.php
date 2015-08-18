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
        $this->isPair(8)->shouldReturn(true);
        $this->isPair(5)->shouldReturn(false);
    }

    function it_is_prime()
    {
        $this->isPrime(2)->shouldReturn(true);
        $this->isPrime(3)->shouldReturn(true);
        $this->isPrime(9)->shouldReturn(false);
        $this->isPrime(37)->shouldReturn(true);
        $this->isPrime(10007)->shouldReturn(true);
        $this->isPrime(300)->shouldReturn(false);
    }

    function it_is_goldbach_right()
    {
        $exception = new \InvalidArgumentException("The argument must be a natural positive number greater than 4");

        $this->returnPairs(8)->shouldReturn([
            [3,5]
        ]);
        $this->returnPairs(20)->shouldReturn([
            [3,17],
            [7,13],
        ]);
        $this->shouldThrow($exception)->duringReturnPairs(5);
        $this->shouldThrow($exception)->duringReturnPairs("foo");
        $this->shouldThrow($exception)->duringReturnPairs(3.14);
        $this->shouldThrow($exception)->duringReturnPairs(-35);
    }
}
