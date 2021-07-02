<?php

//基数排序
$arr = [
    12,22,12,35,14,57,10,1555556,48,71,15,63,4,24,124,18,44
];
echo '<pre>';
//sort($arr);
//print_r($arr);exit;
function baseSort($arr, $max = null)
{
    //获取数组中的最大数据
    if ($max === null) {
        $max = max($arr);
    }
    //获取最大数据的长度
    $strlen = strlen($max);

    $newArr = [];
    //根据最大数量的长度进行循环
    for($i = 0 ; $i < $strlen; $i++ ){
        //循环数组
        foreach ($arr as $k => $v){
            //将当前下标的数据 拆分成数组
            preg_match_all('/\d/', (string) $v, $matches);
            //数值拆分数组倒叙
            $matches = array_reverse($matches[0]);

            //判断数组下标是否存在 存在将数据存入对应下标 不存在则放到下标为0的数组中
            if(isset($matches[$i]) || !empty($matches[$i])){
                $newArr[$matches[$i]][] = $v;
            }else{
                $newArr[0][] = $v;
            }

        }
        //返回数组置空
        $arr = [];
        //拆分数组按照key下标排序
        ksort($newArr);
        //循环最新排序数组 将对应的排序塞入到 返回数组中
        foreach ($newArr as $k => $v){
            foreach ($v as $kk => $vv){
                $arr[] = $vv;
            }
        }
        //排序数组置空
        $newArr = [];

    }
    return $arr;
}
print_r(baseSort($arr));exit;
