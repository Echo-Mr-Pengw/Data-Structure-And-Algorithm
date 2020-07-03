// 顺序查找

package main

import(
	"fmt"
)

func main() {

	// 目标值
	key := 8
	// 定义切片
	s := []int{2, 3, 6, 7, 8}
	
	for i, v := range s {
		if(v == key) {
			fmt.Printf("元素的 %d 的下标是%d：", v, i);  // 小标从0开始
			return;
		}
	}
	fmt.Println("没有发现目标元素");
}	