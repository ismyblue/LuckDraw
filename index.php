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
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .response{
            text-align: center;
            margin-top: 100px;
            margin-bottom: 10px;
            height: 40px;
            line-height: 40px;
        }
        .num_box{
            overflow: hidden;
            align-content: center;
        }
        .num_box>div{
            float: left;
            width: 180px;
            height: 265px;
            margin: 0px 10px ;
            background: url("img/num.png") top center repeat-y #ccc;  /*repeat-y来实现轮播*/
        }
        .num_btn{
            width: 200px;
            height: 50px;
            line-height: 50px;
            background: greenyellow;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px auto;
            text-align: center;
            font-size: 22px;
        }
    </style>
    
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
            <select class="form-control input-lg" name="luckyName">
                <option>afd</option>
                <option>afd</option>
            </select>
        </div>
    </header>

    <div class="widewrapper main">
        <div class="container">
            <div class="row" >

                <h1 class="response " style="color: red" >
                    一等奖还剩2个！
                </h1>
                <div class="col-md-12 blog-main" >
                    <div class="main">
                        <div class="num_box" style="margin:  0 auto;">
                            <!--抽奖盒子-->
                        </div>
                        <div class="num_btn">开始摇奖</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script>

        //conf.json设置背景
        var imgurl = "";
        var width = "";
        var height = "";
        var luckySet = new Array();
        $.getJSON("json/conf.json",function (data) {
            $.each(data,function(index, item){
                if(index == "background"){
                    imgurl = item.url;
                    width = item.width;
                    height = item.height;
                    var  s = "url("+imgurl+") " + width+"%"+ " " + height+"%;";
                    $("div.row").attr("style","background: "+  s);
                }
                else{
                    for(var i = 0 ;i < item.length;i++){
                        luckySet[i] = new Array();
                        luckySet[i]["luckyName"] = item[i].luckyName;
                        luckySet[i]["prizeName"] = item[i].prizeName;
                        luckySet[i]["luckyNumber"] = item[i].luckyNumber;
                    }
                    var select = $("select");
                    for(var i = 0 ;i < item.length;i++){
                        var option = document.createElement("option");
                        option.name = luckySet[i]["luckyName"];
                        option.innerHTML = luckySet[i]["luckyName"];
                        select.appendChild(option);
                        alert("fasdf");
                    }
                }
            });
        });

        //获得抽奖人员id信息
        var user = new Array();
        $.getJSON("json/user.json",function (data) {
            $.each(data,function (index, item) {
                if(index == "userIdLength")
                    user["userIdLength"] = item;
                else {
                    user["id"] = new Array();
                    for (var i = 0; i < item.length; i++) {
                        user["id"][i] = item[i];
                    }
                }
            });
            //添加盒子
            $(".num_box").css("width",(parseInt(user["userIdLength"])*200).toString());
            for(var i = 0;i < parseInt(user["userIdLength"]);i++) {
                $(".num_box").append("<div></div>");
            }
            var select = $("[name='luckyName']");
        });

        //点击抽奖
        var flag=false;
        $('.num_btn').on('click',function(){
            if(!$('.num_box>div').is(':animated')){
                if(flag==true){
                    return false;  //放置多次点击
                }
                flag=true;
                var imgH=265;
                var number=getRandomNumber()+'';
                $('.num_box>div').css('background-position-y',0);  //将所有背景图重置为0
                var numArr=number.split('');
                $('.num_box>div').each(function(index){
                    var This=$(this);  //This必须写在外面，不能卸载setTimeout里面
                    setTimeout(function(){
                        This.animate({'background-position-y':imgH*50-imgH*numArr[index]},6000,'swing');
                        if(parseInt(index)== parseInt(user["userIdLength"])-1){
                            flag=false;
                        }
                    },1000*index);
                });
            }
        });

        //得到抽中的id
        function getRandomNumber(){
            var numRandom=parseInt(Math.random()*user["id"].length);
            var str=user["id"][numRandom];
            return str;
        }


    </script>
</body>
</html>