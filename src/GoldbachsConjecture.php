<?php

class GoldbachNumber
{
    public function returnPairs($number)
    {
        if (!$this->validate($number)) {
            throw new InvalidArgumentException("The argument must be a natural positive number greater than 4");
        }

        $pairs = [];
        for ($i = 2; $i < $number / 2; $i++) {
            if ($this->isPrime($i) && $this->isPrime($number - $i)) {
                $pairs[] = [$i, $number - $i];
            }
        }

        return $pairs;
    }

    public function isPair($number)
    {
        return ($number % 2 === 0) ? true : false;
    }

    public function isPrime($number)
    {
        if ($this->isPair($number)
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

    private function validate($number)
    {
        if (is_integer($number)
            && $this->isPair($number)
            &&
            $number > 4
        ) {
            return true;
        }
    }
}
