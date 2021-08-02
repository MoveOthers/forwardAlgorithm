<?php

//二分法查找
class binary
{
    //递归 初版
    function search($nums, $target, $index_start = 0, $index_end = 0)
    {
        $count = count($nums);

        if ($index_start == 0 && $index_end == 0) {
            $index = intval(($count / 2) - 1);
            if ($nums[$index] > $target) {
                $this ->search($nums, $target, 0, $index);
            } elseif($nums[$index] < $target) {
               $this ->search($nums, $target, $index, 0);
            }else{
                echo  $index;
            }
        }elseif($index_start != 0 && $index_end == 0){

            if($count - $index_start - 1 == 0 && $nums[$index_start] != $target ){
                echo -1;
            }

            //下标不为0开始
            $index = intval(($count - $index_start - 1) / 2);


            if ($nums[$index+$index_start] > $target) {
                $this ->search($nums, $target, $index_start, $index_start+$index);
            } elseif($nums[$index+$index_start] < $target) {

                $this ->search($nums, $target, $index_start+$index, 0);
            }else{
                echo  $index+$index_start;
            }
        }elseif ($index_start == 0 && $index_end != 0){
            if($index_end = 1 && $nums[$index_end] != $target){
                echo -1;
            }
            //下标不为0开始
            $index = intval($index_end / 2);

            if ($index > $target) {
                $this ->search($nums, $target, 0, $index);
            } elseif($index < $target) {
                $this ->search($nums, $target, $index, $index_end);
            }else{
                echo  $index_end;
            }
        }else{
            $index = intval(($index_end - $index_start) / 2);
            if($index_end - $index_start = 1 && $nums[$index_end] != $target){
                echo -1;
            }

            if ($nums[$index+$index_start] > $target) {
                $this ->search($nums, $target, $index_start, $index_start+$index);
            } elseif($nums[$index+$index_start] < $target) {

                $this ->search($nums, $target, $index_start+$index, $index_end);
            }else{
                echo  $index+$index_start;
            }
        }

    }

    function searchSecond($nums, $target){
        $count = count($nums);
    }

}

$nums = [-1, 0, 3,4, 9, 10, 12];
$target = 9;
$binary = new binary();
$binary->search($nums, $target,0, 0);
