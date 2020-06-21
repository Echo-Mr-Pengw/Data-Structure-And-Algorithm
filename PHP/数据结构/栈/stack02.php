<?php
/**
 * 顺序栈之两栈共享空间
 * @author new1024kb
 */

class Stack {

	/**
	 * [$top1 指向栈1的栈顶(数组的首部)]
	 * @var [type]
	 */
	public $top1;

	/**
	 * [$top2 指向栈2的栈顶(数组的尾部)]
	 * @var [type]
	 */
	public $top2;

	/**
	 * [$stackSpace 栈空间大小]
	 * @var [type]
	 */
	public $stackSpace;

	/**
	 * [$stackElement 栈中元素]
	 * @var [type]
	 */
	public $stackElement;

	/**
	 * [__construct 初始化]
	 * @Author   pengw
	 * @DateTime 2020-06-22T00:47:06+0800
	 * @param    int|integer              $stackSpace [栈大小]
	 */
	public function __construct(int $stackSpace = 0) {

		$this->top1 = -1;
		$this->top2 = $stackSpace;
		$this->stackSpace = $stackSpace;
		$this->stackElement = array_fill(0, $stackSpace, NULL);
	}

	/**
	 * [push 入栈操作]
	 * @Author   pengw
	 * @DateTime 2020-06-22T00:47:19+0800
	 * @param    string                   $element   [入栈元素]
	 * @param    int|integer              $stackType [1表示1号栈 2表示2号栈]
	 * @return   [string]                            [description]
	 */
	public function push(string $element, int $stackType = 1): string {

		if(empty($this->stackSpace)) {
			return '未分配栈空间';
		}

		if(!in_array($stackType, [1, 2])) {
			return '栈选择有误';
		}

		// 栈满
		if(($this->top1 + 1) == $this->top2) {
			return '栈满';
		}

		// 向1栈插入数据
		if($stackType == 1) {
			++$this->top1;
			$this->stackElement[$this->top1] = $element;
		}

		// 向2栈插入数据
		if($stackType == 2) {
			--$this->top2;
			$this->stackElement[$this->top2] = $element;
		}

		return '入栈成功';
	}

	/**
	 * [pop 出栈操作]
	 * @Author   pengw
	 * @DateTime 2020-06-22T00:48:07+0800
	 * @param    int|integer              $stackType [1表示1号栈 2表示2号栈]
	 * @return   [string]                            [description]
	 */
	public function pop(int $stackType = 1): string {

		if(empty($this->stackSpace)) {
			return '未分配栈空间';
		}

		if(!in_array($stackType, [1, 2])) {
			return '栈选择有误';
		}

		// 栈1 空栈
		if($stackType == 1 && $this->top1 == -1) {
			return '栈1 空栈';
		}

		// 栈2 空栈
		if($stackType == 2 && $this->top2 == $this->stackSpace) {
			return '栈2 空栈';
		}

		if($stackType == 1) {
			$e = $this->stackElement[$this->top1];
			$this->stackElement[$this->top1] = NULL;
			--$this->top1;
		}

		if($stackType == 2) {
			$e = $this->stackType[$this->top2];
			$this->stackType[$this->top2] = NULL;
			++$this->top2;
		}

		return $e;
	}

	/**
	 * [showStackElement 显示栈中的元素]
	 * @Author   pengw
	 * @DateTime 2020-06-22T00:48:53+0800
	 * @param    int|integer              $stackType [0表示显示两个栈的元素 1表示显示1号栈 2表示显示2号栈]
	 * @return   [array]                             [description]
	 */
	public function showStackElement(int $stackType = 0): array {

		if($stackType == 0) {
			return $this->stackElement;
		}

		if($stackType == 1) {
			return array_slice($this->stackElement, 0, $this->top1 + 1);
		}

		if($stackType == 2) {
			return array_slice($this->stackElement, $this->top2);
		}

		return [];
	}
}

$s = new Stack(6);
var_dump($s->push(9, 1));
var_dump($s->push(8, 1));
var_dump($s->push(7, 1));
var_dump($s->push(6, 1));
var_dump($s->push(5, 1));
var_dump($s->push(4, 1));
var_dump($s->push(3, 1));
var_dump($s->showStackElement(0));
