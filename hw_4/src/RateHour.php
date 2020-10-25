<?php

const HOUR_RATE_NAME = 'Тариф Почасовой';

class RateHour extends RateAbstract
{
    protected $pricePerKilometer = 0;
    protected $pricePerMinute = 200 / 60;

    public function __construct(int $distance, int $minutes)
    {
        parent::__construct($distance, $minutes);
        $this->minutes = $this->minutes - $this->minutes % 60 + 60;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return HOUR_RATE_NAME;
    }
}

