<?php
    interface Fruit
    {
        const MAX_WEIGHT = 5;    //静态常量
        function setName($name);
        function getName();
    }
    Class Apple implements Fruit
    {
        private $Name;
        function getName()
        {
            // TODO: Implement getName() method.
            return $this->Name;
        }
        function setName($_name)
        {
            // TODO: Implement setName() method.
            $this->Name = $_name;
        }
    }
    $apple = new Apple();//创建对象
    $apple->setName('苹果');
