// 冒泡排序

package main 

import (
	"fmt"
)

func BubbleSort(arr *[6]int) {
	
	arrLen := len(*arr)
	for i := 0; i < arrLen; i++ {
		for j := 0; j <= arrLen - i -1; j++ {
			/*if (*arr)[i] > (*arr)[j] {
				(*arr)[i], (*arr)[j] = (*arr)[j], (*arr)[i]
			}*/
			fmt.Println((*arr)[i], (*arr)[j])
		}
	}

	fmt.Println(*arr)
}

func main() {
	
	arr := [6]int{4, 6, 8, 2, 0, 1}

	BubbleSort(&arr)
}