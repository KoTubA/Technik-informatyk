function loadquestion(w,i)
{
    $("#loader").stop(true, true).fadeIn(100);
    $.ajax({
    url: "loadquestion.php",
    type: "POST",
    data: {value: w, var: i},
    success: function(response){ $("#jednopytanie").html(response);},
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
    $("#jednopytanie").html(response);
        },
    complete: function(){
    $('#loader').fadeOut(100);
    }
    });
}

loadquestion(1,null);

$('#search').on('click', function() {
    let v = $('#number').val();
    loadquestion(v,null);
})