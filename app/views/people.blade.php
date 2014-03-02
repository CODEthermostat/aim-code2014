<!DOCTYPE html>
<html>
        <head>
                <title>Customers</title>
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
                                       
                                                <li class = "active" style="text-align:center;"><a href = "place">HOME</a></li>
                                               
                                                </li>
                                                <li style="text-align:center; "><a href = "explain">EXPLAIN</a></li>
                                                <li style="text-align:center;"><a href = "about">ABOUT</a></li>
                                                <li style="text-align:center;"><a href = "contact">CONTACT</a></li>
                                       
                                        </ul>
                               
                                </div>
                               
                        </div>
                </div>



                <div class="location">
                    <img src="images/people.png">
                    <h3>AUDIENCE<h3>
                </div>
                <table class="table table-data">
                	<thead>
                	<tr>
	                	<th class="people-data">GENDER</th>
	                	<th class="people-data">AGE</th>
	                	<th class="people-data">TOTAL</th>
                	</tr>
                	</thead>
                	@foreach($people as $person)
                	<tr>
                		<td class="people-data">{{ $person['gender'] }}</td>
						<td class="people-data">{{ $person['age'] }}</td>
						<td class="people-data">{{ $person['value'] }}</td>
                	</tr>
                	@endforeach
                </table>

                <div class="bottomicons">

                    <ul>
                    <li><a href="place"><img src="images/location.png"</a></li>
                    <li>
                    	@if ($location != null)
                    		<a href="people?location={{$location}}">
                    	@else
                    		<a href="people/">
                    	@endif
                    	<img src="images/people.png"</a></li>
                    <li>
                    	@if (count($people) > 0)
                    		<a href="product?location={{$location}}">
                    	@else
                    		<a href="product?location=all">
                    	@endif
                    <img src="images/product.png"</a></li>
                    <li><a href="price"><img src="images/price.png"</a></li>
                    <li><a href="advertising"><img src="images/marketing.png"</a></li>

                    </ul>    

                </div>




                <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script src = "js/bootstrap.js"></script>
               
        </body>


</html>