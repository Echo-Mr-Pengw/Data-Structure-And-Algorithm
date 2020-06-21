<?php
/**
 * 顺序栈之两栈共享空间
 * @author new1024kb
 */

class Stack {

	public $stackSpace;
	public $stackElement;
	public $top1;
	public $top2;

	public function __construct(int $stackSpace = 0) {

		$this->top1 = -1;
		$this->top2 = $stackSpace;
		$this->stackSpace = $stackSpace;
		$this->stackElement = array_fill(0, $stackSpace, NULL);
	}

	public function push(string $element, int $stackType = 1) {

		if(empty($this->stackSpace)) {
			return '未分配栈空间';
		}

		if(!in_array($stackType, [1, 2])) {
			return '栈选择有误';
		}

		// 栈满
		if(($top1 + 1) == $top2) {
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

	public function pop(int $stackType = 1) {

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

	public function showStackElement(int $stackType = 0) {

		if($stackType == 0) {
			return $this->stackElement;
		}

		if($stackType == 1) {
			return array_slice($this->stackElement, 0, $this->top1 + 1);
		}

		if($stackType == 2) {
			return array_slice($this->stackElement, $this->top2);
		}

		return 'error';
	}
}

$s = new Stack(6);
var_dump($s->push(9, 1));
var_dump($s->push(9, 1));
var_dump($s->push(9, 1));
var_dump($s->push(9, 1));
var_dump($s->push(9, 1));
var_dump($s->push(9, 1));
var_dump($s->showStackElement(0));

