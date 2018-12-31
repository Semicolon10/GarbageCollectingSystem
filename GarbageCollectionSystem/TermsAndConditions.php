<?php
echo "Sorry. We haven't published our Terms and Conditions yet. Feel free to have a look later.";
header("refresh:5;url=SignUpPage.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<p>Redirecting..................<span id="counter">5</span> second(s).</p>
    <script type="text/javascript">
    function countdown() 
    {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML)<=0) 
        {
            //location.href = 'LogInPage.php';
        }
            i.innerHTML = parseInt(i.innerHTML)-1;
    }
        setInterval(function(){ countdown(); },1000);
    </script>
</body>
</html>