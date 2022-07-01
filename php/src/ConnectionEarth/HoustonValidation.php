<?php

namespace Kata\ConnectionEarth;

class HoustonValidation implements BaseValidator
{
    public function canLand(): bool
    {
        sleep(3);
        return true;
    }
}
