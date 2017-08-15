<?php
session_start();

if(isset($_SESSION['user'])) {
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="store">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Make up webshop</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

  </head>
  <body ng-controller ="StoreController as store">

    <div ng-include="'navbar.html'"></div>
    
    <div ng-include="'carousel.html'"></div>

    <div ng-include="'loginModal.html'"></div>

    <div ng-include="'registerModal.html'"></div>

    <div ng-include="'navbarCategories.html'"></div>
             <div class= "container" id="products">
                
                    <div class="col-lg-6" ng-repeat="product in products | filter:filters | limitTo : 10" >
                        <img src='{{product.image}}' alt="" width="200" height="200">
                        <button class="addToCartBtn">
                        Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </button>

                        <h2>{{product.name}}</h2>
                        <h3 class="pull-right display-3">{{product.price | currency}}</h3>

                        <p>{{product.short_desc}}</p>

              
                      <section ng-controller="PanelController as panel">
                        <ul class="nav nav-pills">
                            <li ng-class="{active: panel.isSelected(1)}">
                            <a href class="pinkLink" ng-click="panel.selectTab(1)">Description</a></li>
                            <!-- <li ng-class="{active: panel.isSelected(2)}"><a href ng-click="panel.selectTab(2)">Specifications</a></li> -->
                            <li ng-class="{active: panel.isSelected(3)}"><a class="pinkLink" href ng-click="panel.selectTab(3)">Reviews</a></li>
                        </ul>

                        <div class="panel" ng-show="panel.isSelected(1)">
                            <h4>Description</h4>
                            <p>{{product.long_desc}}</p>
                        </div>
                         <!-- <div class="panel" ng-show="panel.isSelected(2)">
                            <h4>Specification</h4>
                            <blockquote>None yet</blockquote>
                        </div> -->
                        <div class="panel reviewPanel" ng-show="panel.isSelected(3)">
                            <h4>Reviews</h4>
                            <blockquote ng-repeat="review in product.reviews | limitTo: 5">
                                <b>Stars: {{review.stars}}</b>
                                {{review.body}}
                                <cite>by: {{review.author}}</cite>
                        

                              </blockquote>

                        <form name = "reviewForm" ng-controller="ReviewController as reviewCtrl" ng-submit="reviewForm.$valid && reviewCtrl.addReview(product)" novalidate>
                        <blockquote>
                            <b>Stars: {{reviewCtrl.review.stars}}</b>
                            {{reviewCtrl.review.body}}
                            <cite>by: {{reviewCtrl.review.author}}</cite>
                        </blockquote>
                            <select ng-model="reviewCtrl.review.stars" required>
                            
                            <option value="1">1 star</option>
                            <option value="2">2 star</option>
                            <option value="3">3 star</option>
                            <option value="4">4 star</option>
                            <option value="5">5 star</option>
                        </select>
                        <textarea ng-model="reviewCtrl.review.body" required></textarea>
                        <label>by:</label>
                        <input ng-model="reviewCtrl.review.author" type="email" name="" required>

<!--                         <div>reviewForm is {{reviewForm.$valid}}</div>
 -->                        <input type="submit" value="Submit">

                    </form>
                </div>
            </section>

                </div> 
                 &nbsp; &nbsp;  
                </div>       
            </div>


<!--             pokusaj da setujem usera
 -->            <input type="hidden" ng-model="user" name="user" value=<?php if(isset($_SESSION['user'])) {
  echo $_SESSION['user'];}?>>


    <div ng-include="'footer.html'"></div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js"></script>
    <script src="app.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>


  </body>
</html>
