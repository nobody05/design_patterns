<?php

interface Drinks
{
    public function getName();

}


class Tea implements Drinks
{
    public function getName()
    {
        return "this is tea";
    }


}

#region 装饰器
// 通过增加 装饰器  来丰富原有功能，
// 对扩展开放  对修改关闭

/**
 * Class TeaSugar
 */

class TeaSugar implements Drinks
{
    protected $tea;
    public function __construct(Drinks $tea)
    {
        $this->tea = $tea;
    }

    public function getName()
    {
        return $this->tea->getName(). ' add sugar';
    }
}

class TeaMilk implements Drinks
{
    protected $tea;
    public function __construct(Drinks $tea)
    {
        $this->tea = $tea;
    }

    public function getName()
    {
        return $this->tea->getName(). ' add milk';
    }
}

$tea = new Tea();
echo $tea->getName(). PHP_EOL;
$teaSugar = new TeaSugar($tea);

echo $teaSugar->getName(). PHP_EOL;
$teaMilk = new TeaMilk($teaSugar);


echo $teaMilk->getName(). PHP_EOL;

echo "---------------". PHP_EOL;
#endregion


#region 传统做法
/**
 *
 * 通过增加类的方法 来完成功能
 * 当是依赖的外部无法修改的类时 则无法使用
 *
 */

class Tea2 implements Drinks
{
    public function getName()
    {
        return "this is tea";
    }

    public function addSugar()
    {
        return $this->getName(). " add sugar";
    }

    public function addMilk()
    {
        return $this->getName(). " add milk";
    }

}


$tea = new Tea2();
echo $tea->getName(). PHP_EOL;

echo $tea->addSugar(). PHP_EOL;

#endregion



