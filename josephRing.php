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
        //以上次被点名的下标 寻找本次被点名的下标
        $count = $count + $m;

        //循环下标
        $count = ($count-1)%$number;

        echo "被叫到的同学$arr[$count]<br>";
        //去除数组中被点名的下标 并且对数组重新排序
        array_splice($arr,$count,1);
        //递归调用
        student($arr,$m,$count);
    }
}

//该方法 的效率更快
function student2($arr,$m){
    $i = 0;  //数组下标 从0开始
    while (count($arr)>1){
        if(($i+1)%$m == 0){ //余数为0 说明是被点到的同学 删除该数据
            echo "被叫到的同学$arr[$i]<br>";
            unset($arr[$i]);
        }else{
            //未被点到的同学 放入到数组的最后生成新的下标  删除当前下标的数据
            array_push($arr,$arr[$i]);
            unset($arr[$i]);
        }
        $i++; //下标+1
    }

    echo current($arr).'是最后同学'; //获取当前数组的元素
    return ;
}

$student_arr =range(1, 2000);
$m = 2;
student2($student_arr,$m);
