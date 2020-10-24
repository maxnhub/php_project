
<?php
interface RateInterface
{
    public function countPrice(): int;
    public function addService(ServiceInterface $service): self;
    public function getMinutes(): int;
    public function getDistance(): int;
    public function getName(): string;
}