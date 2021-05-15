<?php 
/**
 * 插入排序
 * @author  new1024kb
 * @since  2020-06-28
 */

class insertSort {

	public function __construct(){}

	public function __destruct(){}

	/**
	 * [sort 升序]
	 * @Author   pengw
	 * @DateTime 2020-06-28T15:08:52+0800
	 * @param    array                    $data [description]
	 * @return   [type]                         [description]
	 */
	public function sort(array $data) {

		if(!is_array($data) || empty($data)) {
			return '排序的数据有误';
		}

		$count = count($data);

		for($i = 1; $i < $count; $i++) {
			// 标识是否有移动
			$flag = false;
			$index = $i - 1;
			$val = $data[$i];
			while($index >= 0 && $data[$index] > $val) {
				$flag = true;
				$data[$index + 1] = $data[$index];
				--$index;
			}

			if (!$flag) break;
			
			$data[$index + 1] = $val;
		}
		return $data;
	}
}

$b = new insertSort();
var_dump($b->sort([6,1,0,2,3,5]));