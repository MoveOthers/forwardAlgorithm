<?php

//有一母牛，到4岁可生育，每年一头，所生均是一样的母牛，到15岁绝育，不再能生，20岁死亡，问n年后有多少头牛
function crazyCow($years){
    static $num = 1; //牛的数量 静态变量 只会被初始化一次
    for($i=1; $i<=$years; $i++){
        if($i>=4 & $i<15){
            $num++;
            crazyCow($years - $i);
        }elseif ($i == 20){
            $num--;

        }
    }
    return $num;
}

function countcows($years) {
    $cows[] = 0;//$cows 牛栏  所有的牛都放置在该数组中  值对应的是该牛是第几年出生的
    if($years < 4) return 1;
    for($i=4; $i <= $years; $i++) {
        foreach($cows as $k => $v){
            $age = $i - $v;
            if($age >=4 && $age <15){
                $cows[] = $i;
            }elseif ($age == 20){
                unset($cows[$k]);
            }
        }
    }

    return count($cows);//返回牛栏中有多少只牛
}

$num = countcows(20);
echo $num;