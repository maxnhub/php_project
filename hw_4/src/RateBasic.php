<?php

const BASIC_RATE_NAME = 'Тариф Базовый';

class RateBasic extends RateAbstract
{
    protected $pricePerKilometer = 10;
    protected $pricePerMinute = 3;

    /**
     * @return string
     */
    public function getName(): string
    {
        return BASIC_RATE_NAME;
    }
}