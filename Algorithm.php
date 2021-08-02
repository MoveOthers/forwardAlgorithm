<?php


class Algorithm
{
    //自己写的1  官方的2
    /**
     * 删除数组中的重复项 1
     * @param $nums
     * @return int
     */
    function removeDuplicates($nums)
    {
        $newArr = [];
        $numsCount = count($nums);
        $value = '';
        $number = 0;

        if($numsCount == 0){
            return 0;
        }

        foreach ($nums as $k => $v) {
            if ($k == 0) {
                $newArr[] = $v;
                $number++;
            } else {
                if ($value != $v) {
                    $newArr[] = $v;
                    $number++;
                }
            }
        }
        $nums = $newArr;
        return $number;
    }

    /**
     * 删除数组中的重复项 2
     * @param $nums
     * @return int
     */
    function removeDuplicates2(&$nums) {
        $numsCount = count($nums);
        if($numsCount == 0){
            return 0;
        }

        $fast = $slow = 1;
        while ($fast < $numsCount) {
            if ($nums[$fast] !== $nums[$fast - 1]) {
                $nums[$slow] = $nums[$fast];
                ++$slow;
            }
            ++$fast;
        }
        return $slow;
    }

    /**
     * 卖股票的最佳时机  贪心 1
     * @param $nums
     * @return int
     */
    function maxProfit($prices) {
        $count = count($prices);
        if(empty($prices)){
            return 0;
        }
        $price = 0;
        foreach($prices as $k=>$v){
            if($k+1 < $count && $prices[$k+1] > $v){
                $price += $prices[$k+1] - $v;
            }
        }
        return $price;
    }
}