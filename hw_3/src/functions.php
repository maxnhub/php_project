<?php

/*  Задание 1
    Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:
    id - уникальный идентификатор, равен номеру эл-та в массиве
    name - случайное имя из 5-ти возможных (сами придумайте каких)
    age - случайное число от 18 до 45
    Преобразуйте массив в json и сохраните в файл users.json
    Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.
    Посчитайте количество пользователей с каждым именем в массиве
    Посчитайте средний возраст пользователей
*/

$users = [];
const QUANTITY_OF_USERS = 50;
const LEGAL_AGE = 18;
const ADULT_AGE = 45;

function task1()
{
    $names = [
        [
            'name' => 'Geralt',
            'count' => 0
        ],
        [
            'name' => 'Yennifer',
            'count' => 0
        ],
        [
            'name' => 'Triss',
            'count' => 0
        ],
        [
            'name' => 'Lutik',
            'count' => 0
        ],
        [
            'name' => 'Roach',
            'count' => 0
        ],
    ];
    $usersMiddleAge = 0;
    for ($i = 0; $i <= QUANTITY_OF_USERS; $i++) {
        $users[$i]['id'] = $i;
        $randomName = mt_rand(0, count($names)-1);
        $users[$i]['name'] = $names[$randomName]['name'];
        $names[$randomName]['count'] += 1;
        $users[$i]['age'] = mt_rand(LEGAL_AGE, ADULT_AGE);
        $usersMiddleAge += $users[$i]['age'];
    }
    file_put_contents('users.json', json_encode($users));
    $usersData = file_get_contents('users.json');
    $assocUsers = json_decode($usersData, true);
    for ($i = 0; $i < count($names); $i++) {
        echo $names[$i]['count'] . ' users with name ' . $names[$i]['name'] . '<br>';
    }
    echo 'Middle age of users ' . $usersMiddleAge/count($users);
}

/*  Задание 2
    Проверить, существует ли уже пользователь с таким email, если нет - создать его, если да - увеличить число заказов по этому email. Двух пользователей с одинаковым email быть не может.
    Сохранить данные заказа - id пользователя, сделавшего заказ, дату заказа, полный адрес клиента.
    Скрипт должен вывести пользователю:
    Спасибо, ваш заказ будет доставлен по адресу: “тут адрес клиента”
    Номер вашего заказа: #ID
    Это ваш n-й заказ!
    Где ID - уникальный идентификатор только что созданного заказа n - общий кол-во заказов, который сделал пользователь с этим email включая текущий
*/

//function task2()
//{
//
//}

/*  Задание 3
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

class Tarif
{
    public $name = '';
    public $oneKmPrice = 0;
    public $distance = 0;
    public $oneMinutePrice = 0;
    public $time = 0;
    public $priceForDistance = 0;
    public $priceForTime = 0;
    public $gps = false;
    public $driver = false;
    private $oneHourForGps = 15;
    private $priceForGps = 0;
    private $priceForDriver = 0;
    private $gpsDesc = '';
    private $gpsTime = 0;
    private $driverDesc = '';
    private $hourTime = 0;
    private $hourTimeDesc = '';
    private $finalPrice = 0;

    public function __construct($rideDistance, $rideTime, $extraGps = false, $extraDriver = false)
    {
        $this->distance = $rideDistance;
        $this->time = $rideTime;
        $this->gps = $extraGps;
        $this->driver = $extraDriver;
    }

    public function count()
    {
        $this->priceForDistance = $this->oneKmPrice * $this->distance;
        $this->priceForTime = $this->oneMinutePrice * $this->time;
        if($this->gps) {
            $this->priceForGps = $this->oneHourForGps * ceil($this->time / 60);
        }
        if($this->driver) {
            $this->priceForDriver = 100;
        }

    }

    public function getInfo()
    {
        $this->count();
        if($this->name == 'Тариф Почасовой') {
            $this->hourTime = ceil($this->time / 60);
            $this->hourTimeDesc = $this->hourTime . ' час(а) * ' . $this->oneMinutePrice . ' руб / час';
            $this->priceForTime = $this->hourTime * $this->oneMinutePrice;
        }
        echo $this->name . '(' . $this->distance . 'км, ' . $this->time . ' мин)' . '<br>';
        if($this->gps) {
            echo ' - добавить услугу GPS' . '<br>';
            $this->gpsTime = ceil($this->time / 60);
            $this->gpsDesc = ' + 15 руб / час * ' . $this->gpsTime . ' час(а)';
        }
        if($this->driver) {
            echo ' - добавить услугу водителя' . '<br>';
            $this->driverDesc = ' + 100 руб';
        }
        $this->finalPrice = $this->priceForDistance + $this->priceForTime + $this->priceForGps + $this->priceForDriver;
        echo '= ' . $this->distance . 'км * ' . $this->oneKmPrice . ' руб / км + ' . ($this->name == 'Тариф Почасовой' ? $this->hourTimeDesc : $this->time . ' мин * ' . $this->oneMinutePrice . ' руб / мин') . $this->gpsDesc . $this->driverDesc . ' = ' . $this->priceForDistance . ' + ' . $this->priceForTime . ($this->priceForGps ? ' + ' . $this->priceForGps : '') . ($this->priceForDriver ? ' + ' . $this->priceForDriver : '') . ' = ' . $this->finalPrice;
        echo '<br>';
    }

}

class BasicTarif extends Tarif
{
    public $name = 'Тариф Базовый';
    public $oneKmPrice = 10;
    public $oneMinutePrice = 3;
}

class HourTarif extends Tarif
{
    public $name = 'Тариф Почасовой';
    public $oneKmPrice = 0;
    public $oneMinutePrice = 200;
}

class StudentTarif extends Tarif
{
    public $name = 'Тариф Студенческий';
    public $oneKmPrice = 4;
    public $oneMinutePrice = 1;
}

$gordon = new BasicTarif(12,70, true, false);
$gordon->getInfo();
echo '<br>';

$alyx = new HourTarif(78,45, false, false);
$alyx->getInfo();
echo '<br>';

$eli = new StudentTarif(89,21, false, true);
$eli->getInfo();
echo '<br>';


//function task3()
//{
//
//}
