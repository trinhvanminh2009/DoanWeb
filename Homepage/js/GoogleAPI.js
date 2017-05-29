/**
 * Created by Minh on 5/28/2017.
 */
    function start() {
        // 2. Initialize the JavaScript client library.
        gapi.client.init({
            'apiKey': 'AIzaSyB1exM-sEOla1IK4ZR7nYF_1xqouc9py50',
            // Your API key will be automatically added to the Discovery Document URLs.
            'discoveryDocs': ['https://people.googleapis.com/$discovery/rest'],
            // clientId and scope are optional if auth is not required.
            'clientId': '450400562302-pqsvm8mll7q5f9ik4vbtebj4e440ok40.apps.googleusercontent.com',
            'scope': 'profile',
        }).then(function() {
            // 3. Initialize and make the API request.
            return gapi.client.people.people.get({
                'resourceName': 'people/me',
                'requestMask.includeField': 'person.names'
            });
        }).then(function(response) {
            console.log(response.result);
        }, function(reason) {
            console.log('Error: ' + reason.result.error.message);
        });
    };
// 1. Load the JavaScript client library.
gapi.load('client', start);
