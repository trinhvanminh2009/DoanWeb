window.fbAsyncInit = function() {
    FB.init({
        cookie: true, // This is important, it's
        appId: '415135538841889',//not enabled by default
        version: 'v2.9'
    });
};
//$appId = '415135538841889';
//$appSecret = '62daf59fb534cb37d864ea99a432755d';


function login() {
    FB.login(function(response) {
        if (response.status == 'connected') {
            getInfo();
            sleep(500).then(() => {
                document.getElementById("btnSubmit").click();
            });

        } else {
            alert('User cancelled login or did not fully authorize.');
        }
    },{scope:'email'});

};

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function getInfo() {
    FB.api('/me', 'GET',{fields:'first_name,last_name,name,id,email,gender, picture.width(150).height(150)'},
        function (response) {
            document.getElementById("txtUserName").value = response.email;
            document.getElementById("first_name").value = response.first_name;
            document.getElementById("last_name").value = response.last_name;
            document.getElementById("gender").value = response.gender;
            document.getElementById("url").value = response.picture.data.url;
        });
};

