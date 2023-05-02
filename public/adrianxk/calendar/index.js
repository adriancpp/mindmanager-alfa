
function fastcheck(mode)
{
    //var clickval = $(".week").attr("onclick");
    //$(".week").attr("onclick", clickval.replace('clickDate', 'clicked'));

    if( mode == 1)
    {
        var parent = $('#dataMoreInfo');

        parent.empty();

        $(".clickableDay").each(function() {
            var clickval = $(this).attr("onclick");
            $(this).attr("onclick", clickval.replace('clickDate', 'clicked'));
        });
    }
    else
    {
        $(".clickableDay").each(function() {
            var clickval = $(this).attr("onclick");
            $(this).attr("onclick", clickval.replace('clicked', 'clickDate'));
        });
    }
}

function clickDate(id, userId)
{
    var parent = $('#dataMoreInfo');

    parent.empty();

    let note = '';
    _allData.forEach((element, index, array) => {

        if(element.data == id && element.userId == userId)
        {
            note = element.note;
        }
    });

    parent.append(
        $('<button style="padding: 30px; margin: 30px;" onclick="clicked(\''+id+'\','+userId+')">Zmień</button>')
    );

    parent.append(
        $('<textarea id="note" rows="4" cols="50">'+note+'</textarea><br>')
    );

    parent.append(
        $('<div>'+id+'</div><br>')
    );

    var passed = [];

    _allData.forEach((element, index, array) => {

        if(element.data == id)
        {
            const obj = {
                user: element.user,
                note: element.note
            };
            passed.push(obj);
        }
    });

    passed.forEach((element, index, array) => {

        parent.append(
            $('<b>'+passed[index]['user']+'</b> - '+passed[index]['note']+'<br>')
        );
    });
}

function clicked(id, userId)
{
    var a = document.getElementById(id);
    //a.style.backgroundColor="#ceff88";

    let note = '';

    var noteTextArea =  document.getElementById('note');
    if (typeof(noteTextArea) != 'undefined' && noteTextArea != null)
    {
        note = noteTextArea.value;
    }
    else
        note = null;

    $.ajax({
        type: "POST",
        url: "updateDate.php",
        data: {
            'dateId': id,
            'userId': userId,
            'note': note
        },
        dataType: "json",

        success: function(data){

            var classes = a.className;

            if ( classes.match ( /counter-\d+/ ) ) {
                var classNum = classes.split('counter-')[1];
                classNum = classNum.match(/^\d+/)

                var classNumUp = parseInt(classNum)+1;
                var classNumDown = parseInt(classNum)-1;


                if(data=="added")
                {
                    var toggleString = 'counter-'+classNum+' counter-'+classNumUp;
                    $('#' + id).toggleClass(toggleString );

                    $('#' + id).addClass('clickedByMe');
                }
                else if(data=="removed")
                {
                    if(classNum>1)
                    {
                        var toggleString = 'counter-'+classNum+' counter-'+classNumDown;
                        $('#' + id).toggleClass(toggleString );
                    }
                    else
                    {
                        $('#' + id).removeClass('counter-1');
                    }
                    $('#' + id).removeClass('clickedByMe');
                }
            }
            else
            {
                $('#' + id).addClass('counter-1 clickedByMe');
            }
        },
    });
}

