<?php 
/**
 * 插入排序
 * @author  new1024kb
 * @since  2020-01-10
 */

/**
 * [insertSort 插入排序]
 * @param  array  $arr [待排序数组]
 * @return [array]
 */
function insertSort(array $arr): array {

	$len = count($arr);

	for($i = 1; $i < $len; $i++) {
		$currentVal = $arr[$i];    //当前元素
		$preIndex = $i - 1;        //前一个元素索引

		//当前值大于前面的值，并且前元素索引大于等于0
		while($preIndex >= 0 && $currentVal < $arr[$preIndex]) {
			$arr[$preIndex+1] = $arr[$preIndex];
			$preIndex--;
		}
		$arr[$preIndex+1] = $currentVal;
	}

	return $arr;
}

//测试
var_dump(insertSort([1,6,0,2,3,5]));