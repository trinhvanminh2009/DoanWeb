/**
 * Created by azaudio on 4/25/2017.
 */
$(document).ready(function () {
    $('#formcomment').click(function () {
        $.post("submit.php",{comments:$('#comments').val()},
            function (data) {
                {
                    $('#AXC').html(data);
                }
            });
    });
});