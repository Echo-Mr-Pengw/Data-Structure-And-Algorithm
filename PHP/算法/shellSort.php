<?php
/**
 * 希尔排序
 * @author  new1024kb
 * @since  2020-06-29
 */

class shellSort {

	public function __construct(){}

	public function __destruct(){}
    
    public function sort(array $data) {

		$len = count($data);

		/**
		 *  下面是推倒过程。模拟10个数据，3次分割
			// 10/2 = 5
			for($i = 5; $i < $len; $i++) {
				for($j = $i - 5; $j >= 0; $j -= 5) {
					if($data[$j] > $data[$j + 5]) {
						$temp = $data[$j];
						$data[$j] = $data[$j + 5];
						$data[$j + 5] = $temp;
					}
				}
			}

			var_dump($data);

			// 5 / 2 = 2
			for($i = 2; $i < $len; $i++) {
				for($j = $i - 2; $j >= 0; $j -= 2) {
					if($data[$j] > $data[$j + 2]) {
						$temp = $data[$j];
						$data[$j] = $data[$j + 2];
						$data[$j + 2] = $temp;
					}
				}
			}
			var_dump($data);

			for($i = 1; $i < $len; $i++) {
				for($j = $i - 1; $j >= 0; $j -= 1) {
					if($data[$j] > $data[$j + 1]) {
						$temp = $data[$j];
						$data[$j] = $data[$j + 1];
						$data[$j + 1] = $temp;
					}
				}
			}
			var_dump($data);
		*/
		
		// 实现
		for($gap = floor($len / 2); $gap >= 1; $gap = floor($gap / 2)) {
			for($i = $gap; $i < $len; $i++) {
				for($j = $i - $gap; $j >= 0; $j -= $gap) {
					if($data[$j] > $data[$j + $gap]) {
						$temp = $data[$j];
						$data[$j] = $data[$j + $gap];
						$data[$j + $gap] = $temp;
					}
				}
			}
		}
		return $data;
	}
}

$arr = [8, 9, 1, 7, 2, 3, 5, 4, 6, 0];
$s = new shellSort();
var_dump($s->sort($arr));