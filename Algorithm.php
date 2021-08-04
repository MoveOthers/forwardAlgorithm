<?php


class Algorithm
{
    //自己写的1  官方的2
    /**
     * 删除数组中的重复项 1
     * @param $nums
     * @return int
     */
    public function removeDuplicates(array &$nums)
    {
        $newArr = [];
        $numsCount = count($nums);
        $value = '';
        $number = 0;

        if ($numsCount == 0) {
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
    public function removeDuplicates2(array &$nums)
    {
        $numsCount = count($nums);
        if ($numsCount == 0) {
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
    public function maxProfit(array &$prices)
    {
        $count = count($prices);
        if (empty($prices)) {
            return 0;
        }
        $price = 0;
        foreach ($prices as $k => $v) {
            if ($k + 1 < $count && $prices[$k + 1] > $v) {
                $price += $prices[$k + 1] - $v;
            }
        }
        return $price;
    }

    /**
     * 旋转数组  1
     * @param $nums
     * @param $k
     * @return array
     */
    public function rotate(array &$nums, $k) {
        $count = count($nums);

        //数据为空 返回空数组
        if(empty($nums)){
            return [];
        }

        //数据只有一个 直接返回数据
        if($count == 1){
            return $nums;
        }

        //数据有多个 走的步数超过下标 去余
        if ($count < $k) {
            $k = $k % $count;
        }

        $newNum = [];

        foreach ($nums as $kk => $vv){
            if ($kk + 1 + $k <= $count) {
                $newNum[$kk + $k] = $vv;
            }else{
                $index = $kk + $k - $count;
                $newNum[$index] = $vv;
            }
        }

        foreach ($nums as $kk => $vv){
            $nums[$kk] = $newNum[$kk];
        }

        return $nums;
    }

    /**
     * 查出数组中只出现一次的数字  1
     * @param $nums
     * @return int|mixed
     */
    function singleNumber1($nums)
    {
        if (empty($nums)) {
            return [];
        }

        $if_there = '';
        $index = '';
        foreach ($nums as $k => $v) {
            $pointer = 1;
            $count = count($nums);
            foreach ($nums as $kk => $vv) {
                if ($k != $kk && $vv == $v) {
                    $if_there = true;
                    $index = $kk;
                    break;
                } elseif ($k != $kk) {
                    $pointer++;
                    $if_there = false;
                }
            }

            if ($count == $pointer) {
                return $nums[$k];
            }
            if ($if_there) {
                unset($nums[$k], $nums[$index]);
            } elseif (count($nums) == 1) {
                sort($nums);
                return $nums[0];
            }
        }
    }


    /**
     * 查出数组中只出现一次的数字 位运算  2
     * @param $nums
     * @return int|mixed
     */
    function singleNumber2($nums) {
        $single = 0;
        foreach ($nums as $k => $v){
            $single ^= $v;
        }
        return $single;
    }

    /**
     * 是否存在重复元素 1
     * @param $nums
     * @return bool
     */
    function containsDuplicate($nums)
    {
        if (empty($nums)) {
            return false;
        }
        $count = count($nums);
        if ($count == 1) {
            return false;
        }
        sort($nums);
        foreach ($nums as $k => $v) {
            if ($v == $nums[$k + 1]) {
                return true;
            }
        }
        return false;
    }
}