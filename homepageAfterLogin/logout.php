<!DOCTYPE html>
<html >
 <head>
  <meta charset="UTF-8">
  <title>Welcome to Moments!!! </title>
  
  
  <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Macondo">
    <style>
      body {
        font-family: 'Macondo', cursive;
        font-size: 15px;
      }
	  #Head{
			   		 text-align:center;
					 font-family:'Orange Juice';
					 font-size:40px;
					 color:white;

    </style>
   <link rel="stylesheet" href="logoutCss.css">
     <style type="text/css">
        body, input {
            font-family: Calibri, Arial;
        }
    </style>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
</head>

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="" >
  <header id="Head"><a href="../homePage/home.html">Dilly</a></header>
  <div class="forgot-wrap">
		<div class="forgot-form">
			<br>
			<br>
			<font size="6"> You've been logged out.</font>
			<br>
			<br>
			<br>
			<br>

			<form action="../homePage/home.html	" method="post">
					<div class="group">
					<input type="submit" class="button" value="Home" >
				</div>
			</form>
			</div>		
	</div>
	<footer align="center">&copy; 2017 Dilly, All rights reserved</footer>
</body>
</html>

