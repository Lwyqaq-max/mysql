<?php
    //定义一个类  类是由 属性（变量）  和方法（函数）组成

    class Cat {
        //颜色
        public $color = "white";   //成员属性（变量）
        //定义一个行为（方法）
        public  function  climbTree(){  //成员方法（函数）
          echo "爬树" ;
        }
        public function catchMouse(){
          echo "抓老鼠";
        }
    }

    //将类实例化     得到一个对象
    $cat1 = new Cat();
    var_dump($cat1);
    $c = $cat1->color;
    echo "<hr>";
    $cat1->climbTree();
    echo "<hr>";
    $cat1->catchMouse();
    echo "<hr>";


    class Humen {
        public $color = "yellow,white,black";

        public function homework(){
            echo "写作业";
        }

        public function language(){
            echo "English,Chinese";
        }

        public function HighIQ(){
            echo "智商高";
        }
    }
    $Humen = new Humen();
    var_dump($Humen);
    echo "<hr>";
    $Humen->homework();
    echo "<hr>";
    $Humen->language();
    echo "<hr>";
    $Humen->HighIQ();

