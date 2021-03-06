<?php
include "src/RateInterface.php";
include "src/ServiceInterface.php";
include "src/RateAbstract.php";
include "src/RateBasic.php";
include "src/ServiceGPS.php";
include "src/ServiceDriver.php";
include "src/RateHour.php";
include "src/RateStudent.php";

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

/** @var RateInterface $rate */
$rate = new RateBasic(5, 10);
$rate->addService($service = new ServiceGPS(15));
echo $rate->getName() . '(' . $rate->getDistance() . 'км, ' . $rate->getMinutes() . 'мин)' . '<br>';
echo $rate->countPrice();
echo '<br>';

$rate = new RateHour(31, 78);
$rate->addService(new ServiceDriver(100));
echo $rate->getName() . '(' . $rate->getDistance() . 'км, ' . $rate->getMinutes() . 'мин)' . '<br>';
echo $rate->countPrice();
echo '<br>';

$rate = new RateStudent(5, 10);
$rate->addService(new ServiceGPS(15));
echo $rate->getName() . '(' . $rate->getDistance() . 'км, ' . $rate->getMinutes() . 'мин)' . '<br>';
echo $rate->countPrice();
echo '<br>';