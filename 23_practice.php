<?php
//абстрактный класс для всех типов машин
abstract class Vehicle {
    //метод для описания движения
    abstract public function move();
    //метод для использования сигнала
    protected function useSignal()
    {
        echo $this->signal;
    }
    //сеттер для установки цвета машин
    public function setColor($color)
    {
        $this->color = $color;
        echo "Цвет ", get_class($this), " был установлен на $color\n";
    }
}
//интерфейс для активации способностей машин
interface SpecialAbilities{
    public function useSpecialAbility();    //вызов метода специальной способности
    public function useWipers();            //вызов метода использования дворников

}
//класс легковых автомобилей
class Car extends Vehicle implements SpecialAbilities {
    
    protected $signal = "Ka-Chow!\n";       //свойство сигнала
    protected $color = "Черный";            //свойство для цвета

    //вызов метода движения и отображения сигнала
    public function move(){
        echo "{$this->color} Легковой автомобиль движется ";
        $this->useSignal();
    }
    public function useSpecialAbility(){
        echo "Легковой автомобиль применяет закись азота!\n";
    }
    public function useWipers(){
        echo "Легковой автомобиль использует дворники\n";
    }
    
}
class Tank extends Vehicle implements SpecialAbilities{

    protected $signal = "Honk!\n";          //свойство сигнала
    protected $color = "Серый";             //свойство для цвета

    //вызов метода движения и отображения сигнала
    public function move(){
        echo "{$this->color} Танк движется ";
        $this->useSignal();
    }
    public function useSpecialAbility(){
        echo "Танк стреляет!\n";
    }
    public function useWipers(){
        echo "Водитель протирает стёкла.\n";
    }

}
class Bulldozer extends Vehicle implements SpecialAbilities {

    protected $signal = "Beep!\n";          //свойство сигнала
    protected $color = "Красный";           //свойство для цвета

    //вызов метода движения и отображения сигнала
    public function move(){
        echo "{$this->color} Бульдозер движется ";
        $this->useSignal();                 
    }
    public function useSpecialAbility(){
        echo "Бульдозер использует ковш\n";
    }
    public function useWipers(){
        echo "Бульдозер использует дворники\n";
    }

}
//принимающая объект функция, которая активирует методы
function vehicleController(Vehicle $vehicle){

    $vehicle->move();                       //метод движения
    $vehicle->useSpecialAbility();          //метод специальной способности
    
}
//Пример работы

$car = new Car();                           //создаем объект car
$car->setColor ('Фиолетовый');              //изменяем цвет объекта car

$tank = new Tank();                         //создаем объект tank

$bulldozer = new Bulldozer();               //создаем объект bulldozer

vehicleController($car);
vehicleController($tank);
vehicleController($bulldozer);