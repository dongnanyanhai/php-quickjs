import * as std from "std";

console.log = function(msg) {
	if(typeof msg === 'object'){
		msg = JSON.stringify(msg);
	}
    bridge('printf', JSON.stringify(["%s\n", msg]), true);
}
// var re = bridge('var_dump','by test.js',false);
// var re =  bridge('file_put_contents','["aaasdfasd.txt","asdfkhsdasdfasdf"]',true);
// var re = bridge('print','by test.js',false);
console.log('test console.log');
// console.log([1,2,4]);
console.log(globalThis);
var re = bridge('test_arr_return','',false);
console.log(re);