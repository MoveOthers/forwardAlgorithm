<?php
//约瑟夫环
echo '<pre>';
/**
 * @param $arr 入参的数组
 * @param $m    每次被点名的下标
 * @param int $count 上次被点名的下标 0除外
 */
function student($arr,$m,$count = 0)
{
    //获取数组的数量
    $number = count($arr);
    //当数量为1的时候 表示最后一位
    if($number == 1)
    {
        //递归出口
        echo $arr[0].'是最后同学';
        return;
    }else{
//        $num = 1;
        //以上次被点名的下标 寻找本次被点名的下标
        $count = $count + $m;

        //循环下标
        $count = ($count-1)%$number;
//        while($num++ < $m)
//        {
//            $count++;
//            $count = $count%$number;
//        }
        echo "被叫到的同学$arr[$count]<br>";
        //去除数组中被点名的下标 并且对数组重新排序
        array_splice($arr,$count,1);
        //递归调用
        student($arr,$m,$count);
    }
}

$student_arr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
$m = 2;
student($student_arr,$m);
