<!DOCTYPE html>
<html>
        <head>
                <title>Bootstrap 3</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href = "css/bootstrap.min.css" rel = "stylesheet">
                <link href = "css/style.css" rel = "stylesheet">


                <link href='http://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
        </head>
        <body>
 
                <div class = "navbar navbar-default navbar-static-top">
                        <div class = "container">
                               
                                <a href = "#" class = "navbar-brand" style="font-family:'Century Gothic', sans-serif; font-color:#0000">AIM</a>
                               
                                <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                                        <span class = "icon-bar"></span>
                                        <span class = "icon-bar"></span>
                                        <span class = "icon-bar"></span>
                                </button>
                               
                                <div class = "collapse navbar-collapse navHeaderCollapse">
                               
                                         <ul class = "nav navbar-nav navbar-right" style="font-family:'Josefin Sans', sans-serif;; font-size:12px;">
                                       
                                                <li class = "active" style="text-align:center;"><a href = "#">HOME</a></li>
                                               
                                                </li>
                                                <li style="text-align:center;"><a href = "#">ABOUT</a></li>
                                                <li style="text-align:center;"><a href = "#">CONTACT</a></li>
                                       
                                        </ul>
                               
                                </div>
                               
                        </div>
                </div>



                <div class="location">
                    <img src="images/marketing.png">
                    <h3>MARKET AUDIENCE<h3>

                </div><div class="bottomicons">

                    <ul>

                    <li><a href="place.html"><img src="images/location.png"</a></li>
                    <li><a href="people.html"><img src="images/people.png"</a></li>
                    <li><a href="product.html"><img src="images/product.png"</a></li>
                    <li><a href="price.html"><img src="images/price.png"</a></li>
                    <li><a href="advertising.html"><img src="images/marketing.png"</a></li>

                    </ul>    

                </div>

 
                <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script src = "js/bootstrap.js"></script>
               
        </body>


         <script>

            $('div.ui-page').live("swipeleft", function(){
            $.mobile.changePage( "people.html", {      
            transition: "slide", 
             reverse: false, 
            changeHash: false,
            reloadPage: true      
                });
            });

            </script>
</html>