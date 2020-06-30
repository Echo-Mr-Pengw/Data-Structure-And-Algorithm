<?php 
/**
 * 快速排序
 * @author  new1024kb
 * @since  2020-06-29
 */

class quictSort {

	public function __construct(){}

	public function __destruct(){}

	public function sort(array $data) {

		$len = count($data);
		if($len <= 1) {
			return $data;
		}

		$left_arr  = [];
		$right_arr = [];

		// 基准值
		$pivot = $data[0];
		for($i = 1; $i < $len; $i++) {
			if($data[$i] > $pivot) {
				$right_arr[] = $data[$i];
			}else{
				$left_arr[] = $data[$i];
			}
		}

		$left_arr = $this->sort($left_arr);    // 左边进行递归排序
		$left_arr[] = $pivot;
		$right_arr = $this->sort($right_arr);  // 右边进行递归排序

		return array_merge($left_arr, $right_arr);  // 合并数组
	}
}

$q = new quictSort;
var_dump($q->sort([7,4,1,8]));
