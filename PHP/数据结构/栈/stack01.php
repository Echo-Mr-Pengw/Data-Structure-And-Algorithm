<?php
/**
 * 顺序栈
 * 用数组模拟栈的入栈以及出栈
 * author  new2014kb
 */

header("content-type:text/html; charset=utf8");

class Stack {

	/**
	 * [$top 指向栈顶，空栈=-1]
	 * @var integer
	 */
	public $top = -1;

	/**
	 * [$stackSpace 栈空间]
	 * @var [type]
	 */
	public $stackSpace;

	/**
	 * [$stackElement 栈中元素]
	 * @var array
	 */
	public $stackElement = [];

	/**
	 * [__construct 初始化操作]
	 * @Author   pengw
	 * @DateTime 2020-06-21T20:41:32+0800
	 * @param    int|integer              $stackSpace [栈空间]
	 */
	public function __construct(int $stackSpace = 0) {
		$this->stackSpace = $stackSpace;
		// 初始化并分配栈空间
		$this->stackElement = array_fill(0, $stackSpace, NULL);
	}

	/**
	 * [push 入栈操作]
	 * @Author   pengw
	 * @DateTime 2020-06-21T20:42:39+0800
	 * @param    string                   $element [入栈元素]
	 * @return   [type]                            [description]
	 */
	public function push(string $element) {

		// 栈空间判断
		if(empty($this->stackSpace)) {
			return '未声明栈空间';
		}

		// 栈满
		if($this->top == ($this->stackSpace - 1)) {
			return '栈满';
		}

		// 入栈操作
		++$this->top;
		$this->stackElement[$this->top] = $element;

		return '入栈成功';
	}

	/**
	 * [pop 出栈操作]
	 * @Author   pengw
	 * @DateTime 2020-06-21T20:43:01+0800
	 * @return   [type]                   [description]
	 */
	public function pop() {

		// 判断栈空间
		if(empty($this->stackSpace)) {
			return '未声明栈空间'; 
		}

		// 空栈
		if($this->top == -1) {
			return '空栈';
		}	

		// 出栈操作
		$e = $this->stackElement[$this->top];
		$this->stackElement[$this->top] = NULL;
		--$this->top;
		return $e;
	}

	/**
	 * [showStackElement 输出栈中的元素]
	 * @Author   pengw
	 * @DateTime 2020-06-21T20:43:24+0800
	 * @return   [type]                   [description]
	 */
	public function showStackElement() {

		// 判断栈空间
		if(empty($this->stackSpace)) {
			return '未声明栈空间'; 
		}

		// 空栈
		if($this->top == -1) {
			return '空栈';
		}

		return $this->stackElement;
	}
}

$s = new Stack(5);
//  入栈
var_dump($s->push(9));    // 入栈成功
var_dump($s->push(8));    // 入栈成功
var_dump($s->push(7));    // 入栈成功
var_dump($s->push(6));    // 入栈成功
var_dump($s->push(5));    // 入栈成功
var_dump($s->push(4));    // 栈满
// 出栈之前栈中元素
var_dump($s->showStackElement());   // 9 8 7 6 5

// 出栈
var_dump($s->pop());    // 5
var_dump($s->pop());    // 6
// 出栈后栈中元素
var_dump($s->showStackElement());   // 9 8 7 null null