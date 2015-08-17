<?php

/**
 * Class GoldbachsConjecture
 */
class GoldbachsConjecture
{
    /**
     * @param $number
     * @return array
     */
    public function returnPairs($number)
    {
        $pairs = [];

        for ($i = 2; $i < $number/2; $i++) {
            if ($this->isPrime($i) && $this->isPrime($number - $i)) {
                $pairs[] = [
                    $i,
                    $number - $i
                ];
            }
        }

        return $pairs;
    }

    /**
     * @param $number
     * @return bool
     */
    public function isPair($number)
    {
        return ($number % 2 === 0) ? true : false;
    }

    /**
     * @param $number
     * @return bool
     */
    public function isPrime($number)
    {

        if (($this->isPair($number) && $number !== 2)
            || $number === 1
        ) {
            return false;
        }

        for ($i = 2; $i < $number; $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param $number
     */
    public function validate($number)
    {
        if ($number < 1
            || !is_integer($number)
            || !$this->isPair($number)
        ) {
            throw new InvalidArgumentException("The argument must be a positive pair natural goldbachsNumber");
        }
    }
}
