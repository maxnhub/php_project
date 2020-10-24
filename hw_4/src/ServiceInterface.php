<?php
interface ServiceInterface
{
    public function apply(RateInterface $rate, &$price);
}