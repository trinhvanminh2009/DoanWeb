<!DOCTYPE html>
<html>
<head>
</head>
<body>
<input type="button"  value="Login Google" onclick="loginGoogle()" />
<form method="post" action="HandleGoogleLogin.php"  hidden>
    <input type="text" id="txtEmail" name="txtEmail">
    <input type="text" id="txtFirst_name" name="txtFirst_name">
    <input type="text" id="txtLast_name"  name="txtLast_name" >
    <input type="text" id="txtUrlImage"  name="txtUrlImage">
    <input type="text" id="txtGender" name="txtGender">
    <input type="submit" id="btnSubmit">
</form>

<script type="text/javascript">

    function logout()
    {
        gapi.auth.signOut();
        location.reload();
    }
    function loginGoogle()
    {
        var myParams = {
            'clientid' : '450400562302-pqsvm8mll7q5f9ik4vbtebj4e440ok40.apps.googleusercontent.com',
            'cookiepolicy' : 'single_host_origin',
            'callback' : 'loginCallback',
            'approvalprompt':'force',
            'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
        };
        gapi.auth.signIn(myParams);
    }

    function loginCallback(result)
    {
        if(result['status']['signed_in'])
        {
            var request = gapi.client.plus.people.get(
                {
                    'userId': 'me'
                });
            request.execute(function (resp)
            {
                var email = '';
                if(resp['emails'])
                {
                    for(i = 0; i < resp['emails'].length; i++)
                    {
                        if(resp['emails'][i]['type'] == 'account')
                        {
                            email = resp['emails'][i]['value'];
                        }
                    }
                }
                document.getElementById("txtEmail").value = email;
                document.getElementById("txtFirst_name").value = resp['name']['familyName'];
                document.getElementById("txtLast_name").value = resp['name']['givenName'];
                document.getElementById("txtUrlImage").value = resp['image']['url'];
                document.getElementById("txtGender").value = resp['gender'];
                sleep(500).then(() => {
                    document.getElementById("btnSubmit").click();
                });
            });

        }

    }

    function sleep (time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }

    function onLoadCallback()
    {
        gapi.client.setApiKey('AIzaSyB1exM-sEOla1IK4ZR7nYF_1xqouc9py50');
        gapi.client.load('plus', 'v1',function(){});
    }

</script>

<script type="text/javascript">
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
</script>

</body>
</html>