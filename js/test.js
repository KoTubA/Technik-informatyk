function loadquestion(w,i)
{
    $("#loader").stop(true, true).fadeIn(100);
    $.ajax({
    url: "loadquestion.php",
    type: "POST",
    data: {value: w, var: i},
    success: function(response){ $("#one-question").html(response);},
    complete: function(){
    $('#loader').fadeOut(100);
    }
    });
}

function loadanswer(idp, odp)
{
    $("#loader").stop(true, true).fadeIn(100);
    $.ajax({
    url: "loadanswer.php",
    type: "POST",
    data: {idp: idp, odp: odp},
    success: function(response){
    $("#one-question").html(response);
        },
    complete: function(){
    $('#loader').fadeOut(100);
    }
    });
}


function getCookieValue(a) {
    var b = document.cookie.match('(^|[^;]+)\\s*' + a + '\\s*=\\s*([^;]+)');
    return b ? b.pop() : '';
}

let v = "";

if(v=getCookieValue('question')) loadquestion(v,0);
else loadquestion(1,0);

$('#search').on('click', function() {
    let v = $('#number').val();
    $("#prev, #next").unbind();
    loadquestion(v,0);
})