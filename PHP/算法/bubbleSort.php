<?php
/**
 * 冒泡排序（升序）
 * @link   https://github.com/Echo-Mr-Pengw/
 * @author pengw
 * @since  2019-10-31 20:37
 */

function bubbleSort($array) {

	if(!is_array($array)) {  //不是数组 直接返回
		return $array;
	}

	$len = count($array);    //元素个数小于2 直接返回
	if($len < 2) {
		return $array;
	}

	for($i = 0; $i < $len; $i++) {
		$mark = false;        //标记数据是否交换,默认为false(没有交换) 没有交换数据，表示数据以及排序完成，退出循环
		for($j = 0; $j < $len-$i-1; $j++) {
			if($array[$j] > $array[$j+1]) {
				$mark        = true; //有数据交换，数据还未有序
				$temp        = $array[$j];
				$array[$j]   = $array[$j+1];
				$array[$j+1] = $temp;
			}
		}

		//如果mark=false ,数据有序 则退出循环
		if(!$mark) {
			break;
		}
	}

	return $array;
}

var_dump(bubbleSort([9,3,6,4,0,1]));