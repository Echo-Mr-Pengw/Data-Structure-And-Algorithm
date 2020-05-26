<?php
/**
 * 线性表的顺序存储
 * @author new1024kb
 * @since  2020-05-25
 */

header("content-type:text/html;charset=utf8");

class Sequence {

	/**
	 * [$seq 保存线性表的数据]
	 * @var array
	 */
	public $seq = [];

	/**
	 * [$seqLen 线性表的长度]
	 * @var integer
	 */
	public $seqLen = 0;

	/**
	 * [__construct 初始化]
	 * @Author   pengw
	 * @DateTime 2020-05-25T17:42:04+0800
	 * @param    array                    $seq [description]
	 */
	public function __construct(array $seq) {
		$this->seq = $seq;
		$this->seqLen = count($seq);
	}

	public function __destruct() {}

	/**
	 * [getSeqenceLength 获取线性表的长度]
	 * @Author   pengw
	 * @DateTime 2020-05-25T17:42:55+0800
	 * @return   [type]                   [description]
	 */
	public function getSequenceLength() {

		return $this->seqLen;
	}

	/**
	 * [getSeqenceElem 通过下标获取线性表中某个元素]
	 * @Author   pengw
	 * @DateTime 2020-05-25T17:45:40+0800
	 * @param    int                      $index [下标]
	 * @return   [type]                          [description]
	 */
	public function getSequenceElem(int $index) {

		// 判断下标的合法性
		if($index <= 0 || $index >= $this->seqLen) {
			return 'error';
		}

		return $this->seq[$index - 1];
	}

	/**
	 * [delSeqenceElem 通过下标删除线性表中某个元素]
	 * @Author   pengw
	 * @DateTime 2020-05-25T17:52:35+0800
	 * @param    int                      $index [下标]
	 * @return   [type]                          [description]
	 */
	public function delSequenceElem(int $index) {

		// 判断下标的合法性
		if($index <= 0 || $index >= $this->seqLen) {
			return 'error';
		}

		// 数据向后迁移
		for($i = $index - 1; $i < $this->seqLen; $i++) {
			$this->seq[$i] = $this->seq[$i + 1];
		}

		// 存储空间和长度都-1
		unset($this->seq[--$this->seqLen]);

		return $this->seq;
	}

	/**
	 * [addSequenceElem 在某个下标元素之后添加某个元素]
	 * @Author   pengw
	 * @DateTime 2020-05-25T19:35:21+0800
	 * @param    int                      $index [description]
	 * @param    string                   $data  [description]
	 */
	public function afterAddSequenceElem(int $index, string $data) {

		// 判断下标的合法性
		if($index <= 0 || $index > $this->seqLen) {
			return 'error';
		}

		// 模拟扩容
		$this->seq[$this->seqLen] = 0;
		// 线性表长度+1
		++$this->seqLen;

		// 如果在最后一个元素后新加一个元素
		if($index == ($this->seqLen - 1)) {
			$this->seq[$this->seqLen] = $data;
			return $this->seq;
		}

		for($i = ($this->seqLen - 2); $i >= $index; $i--) {
			$this->seq[$i + 1] = $this->seq[$i];
		}

		$this->seq[$index] = $data;

		return $this->seq;
	}

	/**
	 * [beforeAddSequenceElem 在某个下标元素之前添加某个元素]
	 * @Author   pengw
	 * @DateTime 2020-05-25T19:37:18+0800
	 * @param    int                      $index [description]
	 * @param    string                   $data  [description]
	 * @return   [type]                          [description]
	 */
	public function beforeAddSequenceElem(int $index, string $data) {

		// 判断下标的合法性
		if($index <= 0 || $index > $this->seqLen) {
			return 'error';
		}

		// 模拟扩容
		$this->seq[$this->seqLen] = 0;
		// 线性表长度+1
		++$this->seqLen;
		// 小标-1
		--$index;

		for($i = ($this->seqLen - 1); $i >= $index; $i--) {
			$this->seq[$i] = $this->seq[$i - 1];
		}

		$this->seq[$index] = $data;

		return $this->seq;
	}

}

// 测试
// $s = new Sequence(range(1, 10));
// var_dump($s->getSequenceLength());   // 线性表的长度 10
// var_dump($s->getSequenceElem(3));    // 通过下标获取线性表中某个元素： 3
// var_dump($s->delSequenceElem(1));    // 通过下标删除线性表中某个元素
// var_dump($s->afterAddSequenceElem(2, 'b'));  // 在某个下标元素之后添加某个元素
// var_dump($s->beforeAddSequenceElem(2, 'a')); // 在某个下标元素之前添加某个元素