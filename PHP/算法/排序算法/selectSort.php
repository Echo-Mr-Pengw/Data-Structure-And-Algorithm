<?php 
/**
 * 选择排序
 * @link   https://github.com/Echo-Mr-Pengw/
 * @author new1024kb
 */

class selectSort {

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
			$min = $i;
			for($j = $i + 1; $j < $count; $j++) {
				if($data[$j] < $data[$min]) {    //  替换成 $data[$j] > $data[$min] 变成降序
					$min = $j;
				}
			}

			// 交换
			if($i !== $min) {
				$tmp        = $data[$i];
				$data[$i]   = $data[$min];
				$data[$min] = $tmp;
			}
		}

		return $data;
	}
}

$b = new selectSort();
var_dump($b->sort([6,3,9,1,0]));

// array(5) {
//   [0]=>
//   int(0)
//   [1]=>
//   int(1)
//   [2]=>
//   int(3)
//   [3]=>
//   int(6)
//   [4]=>
//   int(9)
// }