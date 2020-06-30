<?php
/**
 * 冒泡排序
 * @link   https://github.com/Echo-Mr-Pengw
 * @author new1024kb
 */

class bubbleSort {

	public function __construct(){}

	public function __destruct(){}

	/**
	 * [sort 升序]
	 * @Author   pengw
	 * @DateTime 2020-06-23T14:13:37+0800
	 * @param    array                    $data [待排序的数据]
	 * @return   [type]                         [description]
	 */
	public function sort(array $data) {

		if(!is_array($data) || empty($data)) {
			return '排序的数据有误';
		}

		$count = count($data);

		for($i = 0; $i < $count; $i++) {
			//标记数据是否交换,默认为false(没有交换) 没有交换数据，表示数据以及排序完成，退出循环
			$falg = false;
			for($j = 0; $j < $count - $i - 1; $j++) {
				if($data[$j] > $data[$j + 1]) {
					$tmp          = $data[$j];
					$data[$j]     = $data[$j + 1];
					$data[$j + 1] = $tmp;
					$falg         = true;
				}
			}

			if(!$falg) {
				break;
			}
		}

		// 降序
		// for($i = 0; $i < $count; $i++) {
		// 	for($j = 0; $j < $count - $i - 1; $j++) {
		// 		if($data[$j] < $data[$j + 1]) {
		// 			$tmp          = $data[$j];
		// 			$data[$j]     = $data[$j + 1];
		// 			$data[$j + 1] = $tmp;
		// 		}
		// 	}
		// }

		return $data;
	}
}

$b = new bubbleSort();
var_dump($b->sort([1,2,0,4,5,6]));
// array(6) {
//   [0]=>
//   int(0)
//   [1]=>
//   int(1)
//   [2]=>
//   int(2)
//   [3]=>
//   int(4)
//   [4]=>
//   int(5)
//   [5]=>
//   int(6)
// }