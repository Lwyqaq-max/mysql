<?php
    class cat {
        public $Color = "white";
        protected $name = "猫";
        private $sex = "Male";
        private $weight;

        //构造函数
        public function __construct($name,$sex,$weight,$color)
        {
            echo "小猫的颜色是". $color; echo "<br>";
            echo "name:". $name;echo "<br>";
            echo "sex:".$sex;echo "<br>";
            echo "weight:".$weight;echo "<br>";
            $this->weight=$weight;//给属性赋值
        }
        //析构函数


        public function showWeight()
        {
            echo "重量:".$this->weight;echo "<br>";
        }
        public  function color()
        {
            echo "颜色：".$this->Color;echo "<br>";
        }
    }
class _Dog {
    public $Color = "white";
    protected $name = "猫";
    private $sex = "Male";
    private $weight;

    //构造函数
    public function __construct($name,$sex,$weight,$color)
    {
        echo "小狗的颜色是". $color; echo "<br>";
        echo "name:". $name;echo "<br>";
        echo "sex:".$sex;echo "<br>";
        echo "weight:".$weight;echo "<br>";
        $this->weight=$weight;//给属性赋值
    }
    //析构函数


    public function showWeight()
    {
        echo "重量:".$this->weight;echo "<br>";
    }
    public  function color()
    {
        echo "颜色：".$this->Color;echo "<br>";
    }
}


$cat1 = new Cat("大橘猫","Male","5kg","白色");
        $cat1->showWeight();
        $cat1->color();
        echo "<hr>";
        $cat2 = new Cat("小橘猫","Female","3kg","黑色");
        $cat2->showWeight();
        $cat2->color();
        echo "<hr>";
        $dog = new _Dog("金毛","male","10kg","white");
        $dog->showWeight();
        $dog->color();
        echo "<hr>";
        $dog2 = new _Dog("二哈","Female","5kg",'红色');
        $dog2->showWeight();
        $dog2->color();
        echo "<hr>";


