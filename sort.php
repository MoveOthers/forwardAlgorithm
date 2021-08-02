<?php
//冒泡排序

$arr = [3,1,12,32,10,23,11,31,35,43,687,12,33,31,56,223,25,547,1215,751,12,48,184,2782,187120,1548,1184,21157,21546,1015488,21549879879846,12121,2148,12481,2187,71,481,20547,2181,17274,2487,2245,1001,481,047,157,12481,877777777777777777777777];

echo '<pre>';
function bubbleSort($arr)
{
    $count = count($arr);
    for ($i = 0; $i < $count; $i++) {
        $k = 0;
        for ($j = 0; $j < $count - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tmp;
                $k = 1;
            }
        }
        if (!$k) {
            return $arr;
        }
    }
    return $arr;
}

//选择排序
function selectionSort($arr){
    $count = count($arr);
    for($i = 0; $i < $count-1; $i++){
        $minIndex = $i;
        for ($j = $i+1 ; $j < $count; $j++){
            if($arr[$j] < $arr[$minIndex]){
                $minIndex  = $j;
            }
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $temp;
    }
    return $arr;

}


//插入排序
function insertionSort($arr){
    $count = count($arr);
    for($i = 0; $i < $count; $i++){

    }
}
var_dump(selectionSort($arr));exit;