<?php 
/**
 * 选择排序(升序)
 * @link   https://github.com/Echo-Mr-Pengw/
 * @author pengw
 * @since  2019-10-31 21:23
 */

function selectSort($array) {

	if(!is_array($array)) {
		return $array;
	}

	$len = count($array);
	if($len < 2) {
		return $array;
	}

	for($i = 0; $i < $len; $i++) {
		$minIndex = $i;
		for($j = $i+1; $j < $len; $j++) {
			if($array[$j] < $array[$minIndex]) {
				$minIndex = $j;
			}
		}

		//交换
		if($i != $minIndex) {
			$tmp = $array[$minIndex];
			$array[$minIndex] = $array[$i];
			$array[$i] = $tmp;
		}
	}

	return $array;
}

var_dump(selectSort([2,4,6,1,0]));