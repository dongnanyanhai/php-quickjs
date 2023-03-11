<?php


$callback = function($name,$num){
	var_dump(FFI::string($name));
	var_dump($num);
};
// int *callback(char *funname, ...)
$ffi = FFI::cdef('typedef void(*callback)(char *funname,int num);
int php_js_run(char *filename, callback fn, int trace_memory, size_t stack_size, size_t memory_limit);
', './libffiqjs.dll');

$result = $ffi->php_js_run(__DIR__ . '/test.js',$callback, 0, 0, 0);

var_dump($result);
