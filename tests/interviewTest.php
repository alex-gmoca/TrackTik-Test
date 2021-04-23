<?php
use PHPUnit\Framework\TestCase;
class interviewTest extends TestCase
{
    public function testQuestion1()
    {
        //create all elements and add them to an array which will be passed to ElectronicItems class
        $items = array();
        array_push($items, $console = new ElectronicItem());
        array_push($items, $television = new ElectronicItem());
        array_push($items, $television_2 = new ElectronicItem());
        array_push($items, $microwave = new ElectronicItem());
        array_push($items, $console_controller_1 = new ElectronicItem());
        array_push($items, $console_controller_2 = new ElectronicItem());
        array_push($items, $console_controller_3 = new ElectronicItem());
        array_push($items, $console_controller_4 = new ElectronicItem());
        array_push($items, $tv_controller_1 = new ElectronicItem());
        array_push($items, $tv_controller_2 = new ElectronicItem());
        array_push($items, $tv2_controller_1 = new ElectronicItem());

        //add item properties
        $console->setType('console');
        $console->setPrice(150.00);

        $television->setType('television');
        $television->setPrice(100.00);

        $television_2->setType('television');
        $television_2->setPrice(120.00);

        $microwave->setType('microwave');
        $microwave->setPrice(50.00);

        $console_controller_1->setType('controller');
        $console_controller_1->setPrice(50.00);
        $console_controller_1->setWired(TRUE);

        $console_controller_2->setType('controller');
        $console_controller_2->setPrice(50.00);
        $console_controller_2->setWired(TRUE);

        $console_controller_3->setType('controller');
        $console_controller_3->setPrice(80.00);
        $console_controller_3->setWired(False);

        $console_controller_4->setType('controller');
        $console_controller_4->setPrice(80.00);
        $console_controller_4->setWired(False);

        $tv_controller_1->setType('controller');
        $tv_controller_1->setPrice(50.00);
        $tv_controller_1->setWired(FALSE);

        $tv_controller_2->setType('controller');
        $tv_controller_2->setPrice(50.00);
        $tv_controller_2->setWired(FALSE);

        $tv2_controller_1->setType('controller');
        $tv2_controller_1->setPrice(50.00);
        $tv2_controller_1->setWired(FALSE);

        //adding extras 
        $console->addExtra($console_controller_1);
        $console->addExtra($console_controller_2);
        $console->addExtra($console_controller_3);
        $console->addExtra($console_controller_4);
        $television->addExtra($tv_controller_1);
        $television->addExtra($tv_controller_2);
        $television_2->addExtra($tv2_controller_1);

        //QUESTION 1: Sort items and get total of all products
        $electronicItems = new ElectronicItems($items);
        $electronicItems->getSortedItems('price');
        $this->assertEquals(
            $electronicItems->getTotal(),
            830
        );
    }
    public function testQuestion2()
    {
        $items = array();
        array_push($items, $console = new ElectronicItem());
        $console_controller_1 = new ElectronicItem();
        $console_controller_2 = new ElectronicItem();
        $console_controller_3 = new ElectronicItem();
        $console_controller_4 = new ElectronicItem();
        //add item properties
        $console->setType('console');
        $console->setPrice(150.00);
        $console_controller_1->setType('controller');
        $console_controller_1->setPrice(50.00);
        $console_controller_1->setWired(TRUE);

        $console_controller_2->setType('controller');
        $console_controller_2->setPrice(50.00);
        $console_controller_2->setWired(TRUE);

        $console_controller_3->setType('controller');
        $console_controller_3->setPrice(80.00);
        $console_controller_3->setWired(False);

        $console_controller_4->setType('controller');
        $console_controller_4->setPrice(80.00);
        $console_controller_4->setWired(False);
        //adding extras 
        $console->addExtra($console_controller_1);
        $console->addExtra($console_controller_2);
        $console->addExtra($console_controller_3);
        $console->addExtra($console_controller_4);

        foreach ($console->getExtras() as $controller)
            array_push($items, $controller);
        $consoleAndControllers = new ElectronicItems($items);
        //Question 2 get total of console and it's extras
        $this->assertEquals(
            $consoleAndControllers->getTotal(),
            410
        );
    }
}
?>