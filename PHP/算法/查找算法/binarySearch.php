<?php
/**
 * 二分查找
 * @author new1024kb
 * @since 2020-06-30
 */

class binarySearch {

	public $data;

	public function __construct(array $data) {
		$this->data = $data;
	}

	public function __destruct() {}

	/**
	 * [search 查找]
	 * @Author   pengw
	 * @param    string                   $key [查找的元素]
	 * @return   [type]                        [description]
	 */
	public function search(string $key) {

		if(empty($this->data) || !is_array($this->data)) {
			return false;
		}


		$l = 0;
		$r = count($this->data) - 1;

		while($l <= $r) {
			$m = floor(($l + $r) / 2);   // 3
			if($this->data[$m] == $key) {
				return $m;
			}elseif($key > $this->data[$m]) {
				$l = $m + 1;
			}else{
				$r = $m - 1;
			}
		}
		return -1;
	}

	public function searchRecursion(int $l, int $r, string $key) {

		if($l > $r) {
			return -1;
		}

		$m = floor(($l + $r) / 2);
		echo $m;
		sleep(1);
		if($this->data[$m] == $key) {
			return $m;
		}elseif($key > $this->data[$m]) {
			$this->searchRecursion($m + 1, $r, $key);
		}else{
			$this->searchRecursion($l, $m + 1, $key);
		}
	}
}
	
// 有序的值
$data = [4, 8, 9, 23, 68, 100];
$b = new binarySearch($data);
//var_dump($b->search(100));
var_dump($b->searchRecursion(0, count($data) - 1, 100));
