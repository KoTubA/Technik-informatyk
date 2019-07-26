var $wrapper = $('.row');
$wrapper.find('.question').sort(function (a, b) {
    return +a.id - +b.id;
}).appendTo($wrapper)

$wrapper.find('.question').each(function(i,el){
el.removeAttribute("id");
});

let reg = / \s+[\r\n]+/;
let string = $wrapper.html().replace(reg,'');
let reg2 = /[\s]{4}<h1/;
string = string.replace(reg2,'<h1');

let a = document.createElement("a");
a.href = 'data:application/csv;charset=utf-8,' + encodeURIComponent(string);
a.download = "Pytania-sort.txt";
a.click();