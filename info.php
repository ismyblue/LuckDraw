<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Info</title>
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
            <a href="index.php" id="logo">
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
        <div class="row">
            <div class="col-md-8 blog-main col-md-push-2">
                    <table class="table table-hover text-center label-success">

                    </table>
            </div>
        </div>
        <form action="updateLuckJson.php" method="post">
            <input type="hidden" name="update" value="clear">
            <button class="btn btn-danger center-block" style="margin-bottom: 100px">清除所有信息Clear all information</button>
        </form>
    </div>
</div>



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.js"></script>
<script>
    var luckId = new Array();
    $.getJSON("json/lucky.json",function (data) {
        $.each(data.result, function (index, item) {
            luckId[index] = new Array();
            luckId[index]["luckName"] = item.luckyName;
            //alert(luckId[index]["luckName"]);
            luckId[index]["id"] = new Array();
            for (var i = 0; i < item.id.length; i++) {
                luckId[index]["id"][i] = item.id[i];
            }
        });
        var tb = $(".table-hover");
        for(var i = 0 ;i < luckId.length;i++){
            //tb.append("<tr>");
            for(var j = 0 ;j < luckId[i]["id"].length;j++){
                var tr = document.createElement("tr");
                var td1 = document.createElement("td");
                var td2 = document.createElement("td");
                td1.innerHTML = luckId[i]["luckName"] ;
                td2.innerHTML = luckId[i]["id"][j] ;
                tr.appendChild(td1);
                tr.appendChild(td2);
                tb.append(tr);
            }
        }
    });
</script>
</body>
</html>