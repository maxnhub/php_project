<?php

const STUDENT_RATE_NAME = 'Тариф Студенческий';

class RateStudent extends RateAbstract
{
    protected $pricePerKilometer = 4;
    protected $pricePerMinute = 1;
    /**
     * @return string
     */
    public function getName(): string
    {
        return STUDENT_RATE_NAME;
    }
}
