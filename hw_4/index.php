<?php

/*  Задание 4
Представьте, что вы создаете сайт для компании сдающих автомобили поминутно (каршеринг). У компании есть ряд тарифов. Вам необходимо реализовать каждый тариф в своем классе. У каждого тарифа две основные характеристики - цена за 1 км, цена за 1 минуту. Каждый тариф обязан иметь метод для подсчета цены поездки. В некоторых тарифах возможно использование дополнительных услуг. Ваша задача - посчитать цену, которую получит пользователь, если проедет Х км и Y минут по тарифу Z.

Тариф базовый
Цена за 1 км = 10 рублей
Цена за 1 минуту = 3 рубля

Тариф почасовой
Цена за 1 км = 0
Цена за 60 минут = 200 рублей
Округление до 60 минут в большую сторону

Тариф студенческий
Цена за 1 км = 4 рубля
Цена за 1 минуту = 1 рубль

Дополнительные услуги (трейты):
Gps в салон - 15 рублей в час, минимум 1 час. Округление в большую сторону
Дополнительный водитель - 100 рублей единоразово
Ожидаемая реализация:

Создать интерфейс, который будет содержать описание метода подсчета цены, метода добавления услуги (принимает на вход интерфейс услуги)
Описать интерфейс доп. услуги, который содержит метод применения услуги к тарифу, который пересчитывает цену в зависимости от особенностей услуги
Реализовать абстрактный класс тарифа, который будет описывать основные методы и имплементировать описанный в п.1 интерфейс
Все тарифы должны наследоваться от абстрактного тарифа из п.2
Описать 2 услуги реализовав интерфейс услуг
*/

interface CalculateInterface
{
public function getTotalPrice();

}

trait Gps
{
protected $statusGps = false;

public function onGps()
{
$this->statusGps = true;
}
public function offGps()
{
$this->statusGps = false;
}
public function getStatusGps()
{
return $this->statusGps;
}
}

trait Driver
{
protected $statusDriver = false;

public function onDriver()
{
$this->statusDriver = true;
}
public function offDriver()
{
$this->statusDriver = false;
}
public function getDriver()
{
return $this->statusDriver;
}
}

abstract class Rate
{
use Gps;
use Driver;

private $oneHourForGps = 15;
private $priceForGps = 0;
protected $priceForDriver = 0;
private $gpsDesc = '';
private $gpsTime = 0;
private $hourTime = 0;

/**
* @param int $oneMinutePrice
*/
public function setOneMinutePrice(int $oneMinutePrice)
{
$this->oneMinutePrice = $oneMinutePrice;
}

/**
* @return int
*/
public function getPriceForDriver(): int
{
return $this->priceForDriver;
}

/**
* @return int
*/
public function getPriceForGps(): int
{
return $this->priceForGps;
}


public function __construct($rideDistance, $rideTime, $extraGps = false, $extraDriver = false)
{
$this->distance = $rideDistance;
$this->time = $rideTime;
if($extraGps) {
$this->onGps();
}
if($extraDriver) {
$this->onGps();
}
}

public function getInfo()
{

if($this->statusGps) {
$this->priceForGps = $this->oneHourForGps * ceil($this->time / 60);
}
if($this->statusDriver) {
$this->priceForDriver = 100;
}

//        if($this->gps) {
//            echo ' - добавить услугу GPS' . '<br>';
//            $this->gpsTime = ceil($this->time / 60);
//            $this->gpsDesc = ' + 15 руб / час * ' . $this->gpsTime . ' час(а)';
//        }
//        if($this->driver) {
//            echo ' - добавить услугу водителя' . '<br>';
//            $this->driverDesc = ' + 100 руб';
//        }
}


}



class BasicRate extends Rate implements CalculateInterface
{
const BASIC_RATE_NAME = 'Тариф Базовый';
public $distance = 0;
public $time = 0;
public $priceForDistance = 0;
public $priceForTime = 0;
public $oneKmPrice = 10;
public $oneMinutePrice = 3;

public function getTotalPrice()
{
$this->priceForDistance = $this->oneKmPrice * $this->distance;
$this->priceForTime = $this->oneMinutePrice * $this->time;
return $result = $this->priceForDistance + $this->priceForTime + $this->getPriceForDriver() + $this->getPriceForGps();
}
}

class HourRate extends Rate implements CalculateInterface
{
const HOUR_RATE_NAME = 'Тариф Почасовой';
public $oneMinutePrice = 200;
public $time = 0;

public function getTotalPrice()
{
$hourTime = ceil($this->time / 60);
//        $hourTimeDesc = $hourTime . ' час(а) * ' . $this->oneMinutePrice . ' руб / час';
$priceForTime = $hourTime * $this->oneMinutePrice;
return $result = $priceForTime + $this->getPriceForDriver() + $this->getPriceForGps();
}
}

class StudentRate extends Rate implements CalculateInterface
{
const HOUR_RATE_NAME = 'Тариф Студенческий';
public $distance = 0;
public $time = 0;
public $priceForDistance = 0;
public $priceForTime = 0;
public $oneKmPrice = 4;
public $oneMinutePrice = 1;

public function getTotalPrice()
{
$this->priceForDistance = $this->oneKmPrice * $this->distance;
$this->priceForTime = $this->oneMinutePrice * $this->time;
return $result = $this->priceForDistance + $this->priceForTime + $this->getPriceForDriver() + $this->getPriceForGps();
}
}

$gordon = new BasicRate(12,70, true, false);
var_dump($gordon->getTotalPrice());
echo '<br>';

$alyx = new HourRate(78,45, false, true);
var_dump($alyx->getTotalPrice());
echo '<br>';

$eli = new StudentRate(89,21, false, true);
var_dump($eli->getTotalPrice());
echo '<br>';

// echo $this->name . '(' . $this->distance . 'км, ' . $this->time . ' мин)' . '<br>';
// там где объявляем, там текст, вынести всё наружу
//$this->finalPrice = $this->priceForDistance + $this->priceForTime + $this->priceForGps + $this->priceForDriver;
//echo '= ' . $this->distance . 'км * ' . $this->oneKmPrice . ' руб / км + ' . ($this->name == 'Тариф Почасовой' ? $this->hourTimeDesc : $this->time . ' мин * ' . $this->oneMinutePrice . ' руб / мин') . $this->gpsDesc . $this->driverDesc . ' = ' . $this->priceForDistance . ' + ' . $this->priceForTime . ($this->priceForGps ? ' + ' . $this->priceForGps : '') . ($this->priceForDriver ? ' + ' . $this->priceForDriver : '') . ' = ' . $this->finalPrice;
//echo '<br>';

//function task3()
//{
//
//}