/**
 * Created by Minh on 4/24/2017.
 *
 */

function checkPassword() {
     var pass= document.getElementById('pass');
     var confirmPass = document.getElementById('confirmPass');
     var btnCheck = document.getElementById('btnNextStep1');
     var message = document.getElementById('message');
     if(pass.value != confirmPass.value)
     {
         btnCheck.disabled = true;
         message.innerHTML = "The confirm password not Matching .Please make sure password similar confirm password!";
     }
      if (pass.value == confirmPass.value)
     {
         message.innerHTML = "";
         btnCheck.disabled = false;
     }
}

function checkInput() {
    var username= document.getElementById('username');
    var pass= document.getElementById('pass');
    var confirmPass = document.getElementById('confirmPass');
    var btnCheck = document.getElementById('btnNextStep1');


    btnCheck.disabled = true;
    if(username.value != '' && pass.value != '' && confirmPass.value != '')
    {
        btnCheck.disabled = false;
    }


}



function checkUserName() {
     var username = $('#username').val();
     $('#status').html('<img src = "img/loader.gif"')
    if(username != '')
    {
        $.post('CheckUsername.php',{username:username},
        function (data) {
            $('#status').html(data)
        });
    }
    else {
         $('#status').html('');
    }

    
}

function checkPreviewAndSize() {
    PreviewImage();
    checkSize();

}

function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("avatar").src = oFREvent.target.result;
    };
};

function checkSize() {
    var fileInput  = $('#image');
    var btnNext = document.getElementById("btnNext");
    btnNext.disabled = true;
    var messageSize = document.getElementById("messageSize");
    if(fileInput.get(0).files.length)
    {

        var fileSize = fileInput.get(0).files[0].size;
        if(fileSize > 12582912)
        {

            btnNext.disabled = true;
            messageSize.innerHTML = "File size more then 12MB, Please Choose another picture";
            return false;
        }
        else
        {
            messageSize.innerHTML = "";
            btnNext.disabled = false;
        }


    }


}