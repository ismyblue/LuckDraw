<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
   
    <!-- Font-Awesome -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!-- Google Webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600|PT+Serif:400,400italic' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css" id="theme-styles">

    <!--[if lt IE 9]>      
        <script src="js/respond.js"></script>
    <![endif]-->
    
</head>
<body>
    <header>
        <div class="widewrapper masthead">
            <div class="container">
                <a href="index.html" id="logo">
                    <h1>Lucky</h1>
                </a>
        
                <div id="mobile-nav-toggle" class="pull-right">
                    <a href="#" data-toggle="collapse" data-target=".clean-nav .navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>

                <nav class="pull-right clean-nav">
                    <div class="collapse navbar-collapse">
                        <ul class="nav nav-pills navbar-nav">
                          
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="info.php">INFO</a>
                            </li>
                            <li>
                                <a href="set.php">SET</a>
                            </li>                        
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="widewrapper subheader">

        </div>
    </header>

    <div class="widewrapper main">
        <div class="container">
            <div class="row" >
                <div class="col-md-12 blog-main" >
                    <iframe src="lucky.html" width="100%" height="500px" style="border: none"></iframe>
                </div>
            </div>
        </div>
    </div>

    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script>

        var imgurl = "";
        var width = "";
        var height = "";
        $.getJSON("json/conf.json",function (data) {
            $.each(data,function(index, item){
                if(index == "background"){
                    imgurl = item.url;
                    width = item.width;
                    height = item.height;
                    var  s = "url("+imgurl+") " + width+"%"+ " " + height+"%;";
                    $("div.row").attr("style","background: "+  s);
                }
            });
        });

    </script>
</body>
</html>