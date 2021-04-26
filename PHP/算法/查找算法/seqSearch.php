<?php 
/**
 * 顺序查找
 * @author new1024kb
 * @since 2020-06-30
 */

class seqSearch {

	public $data;

	public function __construct(array $data) {
		$this->data = $data;
	}

	public function __destruct() {}

	/**
	 * [search description]
	 * @Author   pengw
	 * @DateTime 2020-06-30
	 * @param    string                   $key [查找元素]
	 * @return   [type]                        [description]
	 */
	public function search(string $key) {

		if(empty($this->data) || !is_array($this->data)) {
			return false;
		}

		$len = count($this->data);
		for($i = 0; $i < $len; $i++) {
			if($this->data[$i] == $key) {
				return $i;   // 查到返回该元素的下标，下标从0开始
			}
		}
		return -1;   // 未找到返回-1
	}

	/**
	 * 优化版
	 * @Author   pengwei
	 * @DateTime 2021-04-26
	 * @param    string     $key [description]
	 * @return   [type]          [description]
	 */
	public function search2(string $key)
	{	
		$i   = 0;
		$len = count($this->data);
		$this->data[$len] = $key;

		while ($this->data[$i] != $key) {
			++$i;
		}

		return ($i == $len) ? -1 : $i;
	}
}

$key  = 5;
$data = [5,3,1,9,7,0];

$s = new seqSearch($data);
var_dump($s->search($key));
var_dump($s->search2($key));