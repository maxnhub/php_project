<?php
abstract class RateAbstract implements RateInterface
{
    protected $pricePerKilometer;
    protected $pricePerMinute;
    protected $distance;
    protected $minutes;
    protected $name;
    /** @var ServiceInterface[] */
    protected $services = [];

    public function __construct(int $distance, int $minutes)
    {
        $this->distance = $distance;
        $this->minutes = $minutes;
    }

    public function countPrice(): int
    {
        $price = $this->distance * $this->pricePerKilometer + $this->minutes * $this->pricePerMinute;

        if ($this->services) {
            foreach ($this->services as $service) {
                $service->apply($this, $price);
            }
        }

        return $price;
    }

    public function addService(ServiceInterface $service): RateInterface
    {
        array_push($this->services, $service);
        return $this;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }

    public function getDistance(): int
    {
        return $this->distance;
    }

    public function getName(): string
    {
        return $this->name;
    }
}