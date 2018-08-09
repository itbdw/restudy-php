package main

import "fmt"

type People struct {
	name string
	age string
	gender string
}

func main() {
	var a = 0.01
	var b = 0.57
	var zl People

	fmt.Println((a+b) * 0.1 * 10)

	zl.name = "hello"

	fmt.Println(zl.name)

}