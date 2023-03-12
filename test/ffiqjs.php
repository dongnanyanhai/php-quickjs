<?php

$host_callback = function ($fun_name, $json_data, $is_json) {
    $str = "";
    if (function_exists($fun_name)) {
        if ($is_json) {
            $str = (string) call_user_func($fun_name, ...json_decode($json_data, true));
        } else {
            $str = (string) call_user_func($fun_name, $json_data);
        }
        $len    = strlen($str);
        $result = FFI::new ('char[' . ($len + 1) . ']', 0);
        FFI::memcpy($result, $str, $len);
        return $result;
    }
    // 函数不存在时，直接返回空字符串
    $len    = strlen($str);
    $result = FFI::new ('char[' . ($len + 1) . ']', 0);
    FFI::memcpy($result, $str, $len);

    return $result;
};
$ffi = FFI::cdef('typedef char *(*callback)(const char *fun_name,const char *json_data,int is_json);
int quickjs_run(const char *filename, callback host_callback, int trace_memory, size_t stack_size, size_t memory_limit);
', '../build/libffiqjs.dll');

$result = $ffi->quickjs_run(__DIR__ . '/test.js', $host_callback, 0, 0, 0);

// var_dump($result);
