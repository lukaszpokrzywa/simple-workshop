<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class CarTest extends PHPUnit_Framework_TestCase {
    
    protected $car;
    protected static $logger;
    
    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
        self::$logger = new Logger('carTestLogger');
        self::$logger->pushHandler(new StreamHandler(__DIR__ . '/../log/tests/car.log', Logger::DEBUG));
        self::$logger->addInfo('CarTest started');
    }
    
    public static function tearDownAfterClass() {
        self::$logger->addInfo('CarTest finished');
        self::$logger = null;
        parent::tearDownAfterClass();
    }
    
    protected function setUp() {
        parent::setUp();
        $this->car = new Car('Nissan GT-R', 1100, 2000);
    }
    
    protected function tearDown() {
        $this->car = null;
        parent::tearDown();
    }
    
    public function testIfGoReturnsCorrectType() {
        $this->assertInternalType('string', $this->car->go());
    }
    
    public function testIfGoReturnsCorrectValue() {
        $this->assertEquals('Car Nissan GT-R is going', $this->car->go());
    }
    
    public function testIfBrakeReturnsCorrectType() {
        $this->assertInternalType('string', $this->car->brake());
    }
    
    public function testIfBrakeReturnsCorrectValue() {
        $this->assertEquals('Car Nissan GT-R is slowing down', $this->car->brake());
    }
    
    public function testIfNameIsSetCorrectlyWithCorrectParam() {
        $this->car->setName('Fiat 126p');
        $this->assertAttributeEquals('Fiat 126p', 'name', $this->car);
    }
    
    /**
     * @expectedException InvalidCarNameException
     */
    public function testIfSetNameThrowsExceptionWithIncorrectParam() {
        $this->car->setName(546);
    }
    
    public function setIfSetNameReturnCorrectTypeWithCorrecParam() {
        $this->assertInstanceOf(Car::class, $this->setName('Fiat 126p'));
    }
    
    public function testIfWeightIsSetCorrectlyWithCorrectParam() {
        $this->car->setWeight(900);
        $this->assertAttributeEquals(900, 'weight', $this->car);
    }
    
    /**
     * @expectedException InvalidCarWeightException
     */
    public function testIfSetWeightThrowsExceptionWithIncorrectParam() {
        $this->car->setWeight(-5);
    }
    
    public function testIfYearOfProductionIsSetCorrectlyWithCorrectParam() {
        $this->car->setYearOfProduction(2009);
        $this->assertAttributeEquals(2009, 'yearOfProduction', $this->car);
    }
    
    /**
     * @expectedException InvalidCarYearOfProductionException
     */
    public function testIfSetYearOfProductionThrowsExceptionWithIncorrectParam() {
        $this->car->setYearOfProduction('gdgfgdfs');
    }

    public function testIfWheelsNumberIsSetCorrectlyWithCorrectParam() {
        $this->car->setWheelsNumber(6);
        $this->assertAttributeEquals(6, 'wheelsNumber', $this->car);
    }
    
    /**
     * @expectedException InvalidCarWheelsNumberException
     */
    public function testIfSetWheelsNumberThrowsExceptionWithIncorrectParam() {
        $this->car->setWheelsNumber(-54);
    }
    
    public function testIfRegistrationNumberIsSetCorrectlyWithCorrectParam() {
        $this->car->setRegistrationNumber('LU 1236');
        $this->assertAttributeEquals('LU 1236', 'registrationNumber', $this->car);
    }
    
    /**
     * @expectedException InvalidCarRegistrationNumberException
     */
    public function testIfSetRegitrationNumberThrowsExceptionWithIncorrectParam() {
        $this->car->setRegistrationNumber('13 5334');
    }
    
    /**
     * @dataProvider sampleDataProvider
     */
    public function testIfCalculateThePressureOnEachWheelReturnsCorrectValues($weight, $wheelsNumber, $pressure) {
        $this->car->setWeight($weight);
        $this->car->setWheelsNumber($wheelsNumber);
        $this->assertEquals($pressure, $this->car->calculateThePressureOnEachWheel());
    }
    
    public function sampleDataProvider() {
        return [
            [900, 4, 225],
            [1000, 4, 250],
            [300, 3, 100]
        ];
    }
    
    public function testIfOutputNameProducesCorrectOutput() {
        $this->expectOutputString('Nissan GT-R');
        $this->car->outputName();
    }
}

