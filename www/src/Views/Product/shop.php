<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodpress | Nos produits</title>
    <!-- Icons CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--  JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- CSS  -->
    <link rel="stylesheet" href="../../../public/css/main.css">
</head>

<body>
    <!-- Header section begin -->
    <header>
        <a href="#" class="logo"><i class="fas fa-utensils"></i>Resto</a>
        <nav class="navbar">
            <a class="active" href="">Accueil</a>
            <a href="">Nos produits</a>
            <a href="">Qui sommes-nous ?</a>
            <a href="">Commander</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bar"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <i class="fas fa-shopping-cart"></i>
        </div>
    </header>
    <!-- Header section ends -->
    <!-- Search form -->
    <form action="" id="search-form">
        <input type="search" placeholder="search here..." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>
    <!-- Ends search form -->
    <!-- Home section -->
    <!-- <section class="home" id="home">
        <div class="home-slider">
            <div class="wrapper">
                <div class="slide">
                    <div class="content">
                        <span>Our special dishes</span>
                        <h3>Spicy noodles</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dicta ipsam earum esse animi fugiat mollitia suscipit distinctio laudantium numquam quasi repellat asperiores consequatur, facere dolor assumenda nisi error facilis?</p>
                        <a href="" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="https://img.freepik.com/free-photo/spaghetti-bolognese-plate-blue_119015-53.jpg?size=338&ext=jpg" alt="Noodles">
                    </div>
                </div>
                <div class="slide">
                    <div class="content">
                        <span>Our special dishes</span>
                        <h3>Fried chicken</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dicta ipsam earum esse animi fugiat mollitia suscipit distinctio laudantium numquam quasi repellat asperiores consequatur, facere dolor assumenda nisi error facilis?</p>
                        <a href="" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="https://img.freepik.com/free-photo/top-view-fried-chicken-drumstick-with-ketchup_23-2148682831.jpg?size=338&ext=jpg&ga=GA1.2.1548854029.1638122541" alt="Noodles">
                    </div>
                </div>
                <div class="slide">
                    <div class="content">
                        <span>Our special dishes</span>
                        <h3>Hot pizza</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dicta ipsam earum esse animi fugiat mollitia suscipit distinctio laudantium numquam quasi repellat asperiores consequatur, facere dolor assumenda nisi error facilis?</p>
                        <a href="" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="https://image.freepik.com/free-photo/pizza-pizza-filled-with-tomatoes-salami-olives_140725-1200.jpg" alt="Noodles">
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Home section ends -->
    <!-- Dishes section -->
    <section class="dishes" id="dishes">
        <h3 class="sub-heading">our dishes</h3>
        <h1 class="heading">popular dishes</h1>
        <div class="box-container">
            <div class="box">
                <img src="https://img.freepik.com/free-photo/front-view-tasty-meat-burger-with-cheese-salad-dark-background_140725-89597.jpg?size=338&ext=jpg" alt="">
                <h3>tasty food</h3>
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>15.99€</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="https://image.freepik.com/free-photo/decorating-delicious-homemade-eclairs-with-chocolate-peanuts_155003-1868.jpg" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>15.99€</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="https://img.freepik.com/free-photo/top-view-pepperoni-pizza-with-mushroom-sausages-bell-pepper-olive-corn-black-wooden_141793-2158.jpg?size=338&ext=jpg" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>15.99€</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="https://img.freepik.com/free-photo/high-angle-chicken-meal_23-2148825122.jpg?size=338&ext=jpg" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>15.99€</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="https://img.freepik.com/free-photo/beef-cotlet-burger-with-sauce-wooden-board_114579-2600.jpg?size=338&ext=jpg" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>15.99€</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <a href="" class="fas fa-heart"></a>
                <a href="" class="fas fa-eye"></a>
                <img src="https://img.freepik.com/free-photo/pizza-pepperoni-table_140725-5396.jpg?size=338&ext=jpg" alt="">
                <h3>tasty food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>15.99€</span>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>
    </section>
    <!-- Dishes section ends -->
</body>

</html>

<!-- Script JS -->
<script src="../../../public/js/script.js"></script>