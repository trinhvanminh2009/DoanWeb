/**
 * Created by Minh on 4/28/2017.
 */

/*function search() {
    var query = document.getElementById("taskBarSearch").value;
    if(query != '')
    {
        $.ajax({
            url:"HandleAutoCompleteSearch.php",
            method :"POST",
            data:{query:query},
            success:function (data) {
                $('#displayListImages').fadeIn();
                $('#displayListImages').html(data);
            }
        });
    }

    $(document).on('click','li',function () {
        $('#taskBarSearch').val($(query).text());
        $('#displayListImages').fadeOut();
    })
}*/

function showTaskSearch() {

  /*  var query = document.getElementById("taskBarSearch").value;
    if(query != '')
    {
        $.ajax({
            url:"test.php",
            method :"POST",
            data:$('query').serialize(),
            success:function (data) {
                alert(data);
        }
        });
    }*/
    var searchValue = $('#taskBarSearch').val();
    if(searchValue != '')
    {
        $.post('Photostream.php', {searchValue:searchValue},
        function (data) {
          //  alert(data);

        })
    }

    

}
function search() {

}