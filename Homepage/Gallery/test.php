<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <script language="JavaScript">
        function showInput() {
            var value =  document.getElementById("user_input").value;   // get value of message
            localStorage.setItem('val',value); // set value of message in local storage
        }
    </script>
</head>
<body>

<form action="test2.php" method="post">
    <label><b>Enter a Message</b></label>
    <input type="text" name="message" id="user_input" onkeyup="showInput()">
    <input type="submit" onclick="showInput();"><br />
</form>
</body>
</html>