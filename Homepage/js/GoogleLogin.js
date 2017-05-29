/**
 * Created by Minh on 5/29/2017.
 */
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
