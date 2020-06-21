<?php
/**
 * 链栈
 * @author new1024kb
 */

// 栈节点
class stackNode {

	/**
	 * [$data 元素]
	 * @var [type]
	 */
	public $data;

	/**
	 * [$next 指向下一个栈元素]
	 * @var [type]
	 */
	public $next;

	/**
	 * [__construct 栈节点初始化]
	 * @Author   pengw
	 * @DateTime 2020-06-22T00:08:24+0800
	 */
	public function __construct() {
		$this->data = NULL;
		$this->next = NULL;
	}
}

// 链栈
class linkStack {

	/**
	 * [$top 指向栈顶（链栈的头）]
	 * @var [type]
	 */
	public $top;

	/**
	 * [$count 链栈节点总个数]
	 * @var [type]
	 */
	public $count;

	public function __construct() {
		$this->top = NULL;
		$this->count = 0;
	}

	/**
	* [push 入栈]
	 * @Author   pengw
	 * @DateTime 2020-06-22T00:10:11+0800
	 * @param    string                   $element [入栈元素]
	 * @return   [string]                          [description]
	 */
	public function push(string $element): string {

		if(empty($element)) {
			return '入栈元素为空';
		}

		// 创建节点
		$stack_node = new stackNode();
		$stack_node->data = $element;
		$stack_node->next = $this->top;

		$this->top = $stack_node;
		++$this->count;

		return '入栈成功';
	}

	/**
	 * [pop 出栈操作]
	 * @Author   pengw
	 * @DateTime 2020-06-22T00:11:10+0800
	 * @return   [string]                   [description]
	 */
	public function pop(): string {

		if($this->top == NULL) {
			return '空链栈';
		}

		$e = $this->top->data;
		$this->top = $this->top->next;
		--$this->count;
		return $e;
	}

	/**
	 * [showLinkStackElement 展示链栈中所有元素节点]
	 * @Author   pengw
	 * @DateTime 2020-06-22T00:11:56+0800
	 * @return   []                   [description]
	 */
	public function showLinkStackElement() {
		return $this;
	}
}

$l = new linkStack;
var_dump($l->push(1));  // 入栈成功
var_dump($l->push(2));  // 入栈成功
var_dump($l->push(3));  // 入栈成功
var_dump($l->push(4));  // 入栈成功
var_dump($l->showLinkStackElement());

/**
object(linkStack)#1 (2) {
  ["top"]=>
  object(stackNode)#5 (2) {
    ["data"]=>
    string(1) "4"
    ["next"]=>
    object(stackNode)#4 (2) {
      ["data"]=>
      string(1) "3"
      ["next"]=>
      object(stackNode)#3 (2) {
        ["data"]=>
        string(1) "2"
        ["next"]=>
        object(stackNode)#2 (2) {
          ["data"]=>
          string(1) "1"
          ["next"]=>
          NULL
        }
      }
    }
  }
  ["count"]=>
  int(4)
}
*/

// 出栈
var_dump($l->pop());  // 4

var_dump($l->showLinkStackElement());
/**
object(linkStack)#1 (2) {
  ["top"]=>
  object(stackNode)#4 (2) {
    ["data"]=>
    string(1) "3"
    ["next"]=>
    object(stackNode)#3 (2) {
      ["data"]=>
      string(1) "2"
      ["next"]=>
      object(stackNode)#2 (2) {
        ["data"]=>
        string(1) "1"
        ["next"]=>
        NULL
      }
    }
  }
  ["count"]=>
  int(3)
}
 */