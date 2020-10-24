<?php
class ServiceGPS implements ServiceInterface
{
    private $pricePerHour;

    public function __construct(int $pricePerHour)
    {
        $this->pricePerHour = $pricePerHour;
    }

    public function apply(RateInterface $tariff, &$price)
    {
        $hours = ceil($tariff->getMinutes() / 60);
        $price += $this->pricePerHour * $hours;
    }
}