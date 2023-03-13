import * as std from "std";

console.log = function(msg) {
    bridge('printf', JSON.stringify(["%s\n", msg]), true);
}
// var re = bridge('var_dump','by test.js',false);
// var re =  bridge('file_put_contents','["aaasdfasd.txt","asdfkhsdasdfasdf"]',true);
// var re = bridge('print','by test.js',false);
console.log('test console.log');
// console.log(JSON.stringify);
var re = bridge('test_arr_return','',false);
console.log(re);