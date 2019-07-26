let ele = document.querySelectorAll('.question'),
    tab = [],
    string = '';

    ele.forEach(function(el,i){
        let nodes = el.querySelectorAll(".answer");
        let title = el.querySelector(".title").innerText
        let reg = /\d{1,3}\. /;
        title = title.replace(reg,'');

        tab[i] = [title,nodes[0].innerText.substr(3),nodes[1].innerText.substr(3),nodes[2].innerText.substr(3),nodes[3].innerText.substr(3)];
        let clone = [nodes[0],nodes[1],nodes[2],nodes[3]];
        let odp = '';
        for(let i=0;i<clone.length;i++){
            if(clone[i].classList.contains('correct')) {
                switch (i)
                {
                        case 0:
                        odp = 'a';
                        break;

                        case 1:
                        odp = 'b';
                        break;

                        case 2:
                        odp = 'c';
                        break;

                        case 3:
                        odp = 'd';
                        break;         
                }
            }
        }
        tab[i].push(odp);

        if(el.querySelector("img")) {
            let source = el.querySelector("img").src;
            let elsrc = source.indexOf("/egzamin/e14/")+13; //Nazyw plików
            source = source.substr(elsrc);
            tab[i].push(source+'\n');
        }
        else {
            tab[i].push('\n');
        }

        string += tab[i].join('\n');
    });

let a = document.createElement("a");
a.href = 'data:application/csv;charset=utf-8,' + encodeURIComponent(string);
a.download = "Baza.txt";
a.click();