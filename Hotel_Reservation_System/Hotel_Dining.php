<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel Dining Service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lato', sans-serif;
    color: black;
  }
  
  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0px 5%;
    position: fixed;
    width: 100%;
    height: 100px;
    top: 0;
    z-index: 1;
    background-color: rgb(0, 0, 0);
  }
  
  nav {
    display: flex;
    align-items: center;
  }

  .nav-links {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 50%;
  }
  
  .nav-links li {
    list-style: none;
    font-size: 25px;
    color: lightgray;
  }
  
  .nav-links a {
    color: white;
    font-size: 16px;
    font-weight: 500;
    text-decoration: none;
    text-transform: uppercase;
    padding: 0 15px;
  }
  .nav-links a:hover{
    color: rgb(231, 218, 218);
    font-size: 20px;
    transition: all 0.4s ease;
  }
  .hamburger {
    display: none;
    cursor: pointer;
  }
  
  .hamburger div {
    width: 25px;
    height: 3px;
    background-color: white;
    margin: 5px;
    transition: all 0.3s ease;
  }
  
  
  @media screen and (max-width: 1000px) {
    header{
      padding: 0px 4%;
    }
    nav{
      width: 100%;
      display: grid;
      grid-template-columns: 1fr 1fr;
    }
    .nav-links {
      position: fixed;
      right: 0px;
      height: 80vh;
      top: 110px;
      background-color: white;
      display: grid;
      grid-template-columns: 1fr;
      padding: 0 20px;
      align-content: flex-start;
      width: 60%;
      transform: translateX(-200%);
      transition: transform 0.5s ease-in;
    }
  
    .nav-links li {
      margin-top: 50px;
      opacity: 0;
      width: 100%;
    }
    .nav-links #name{
      padding: 0px 10px;
      color: #587ae8;
      font-weight: 600;
      font-size: 25px;
    }
    .nav-links li a{
      color: black;
    }
    .nav-links a:active{
      color: #587ae8;
    }
  
    .hamburger {
      display: block;
      justify-self: flex-end;
    }
  
    .nav-active {
      transform: translateX(-67%);
    }
  
    .nav-links li {
      opacity: 1;
      transition: opacity 0.5s ease-in;
    }
    .logo{
      justify-self: flex-start;
    }
  }
  
  @media screen and (min-width: 1000px) {
    .hamburger {
      display: none;
    }
  
    .nav-links {
      width: auto;
    }
  
    .nav-links li {
      margin: 0 10px;
    }
  }
  @media screen and (max-width: 450px){
    .nav-links li a{
      font-size: 14px;
    }
  }
  .container{
    margin-top: 100px;
  }
  </style>
</head>
<body>
    <header>
        <nav>
            <ul class="nav-links">
                <li id="name">yaminisravanthiasowmyaPHP</li>
                <li><a href="Home.php">Home</a></li>
                <li><a href="local_attraction.php">Local Attraction</a></li>
                <li><a href="Hotel_Dining.php">Hotel Dining Service</a></li>
                <li><a href="Shopping.php">Shopping</a></li>
            </ul>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </nav>
    </header>
  <!-- Page Content -->
  <div class="container">
    <h1 class="my-4">Hotel Dining Service</h1>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="dining1.jpg" alt="Card image cap" width=350 height=200>
          <div class="card-body">
            <h5 class="card-title">Delish Diner</h5>
            <p class="card-text">Delish Diner is a cozy and welcoming restaurant that serves classic American diner dishes with a modern twist. The menu features burgers, sandwiches, salads, and milkshakes made from scratch using fresh and high-quality ingredients sourced from local suppliers. The staff is friendly and attentive, and the atmosphere is nostalgic and homey.</p>
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="dining3.jpg" alt="Card image cap" width=350 height=200>
          <div class="card-body">
            <h5 class="card-title">Flavorful Bites</h5>
            <p class="card-text">Flavorful Bites is a contemporary restaurant that offers a unique and diverse culinary experience. The menu features a range of international dishes that are carefully crafted to deliver bold and flavorful bites. From Asian-inspired stir-fry dishes to Mediterranean-style flatbreads, there's something for everyone.</p>
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="dining2.jpg" alt="Card image cap" width=350 height=200>
          <div class="card-body">
            <h5 class="card-title">Cuisine Carousel</h5>
            <p class="card-text">Cuisine Carousel is a vibrant and dynamic restaurant that offers a unique dining experience inspired by world cuisines. The menu features a wide variety of dishes from around the globe, all carefully crafted to deliver an explosion of flavors. </p>
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="dining4.jpg" alt="Card image cap" width=350 height=250>
          <div class="card-body">
            <h5 class="card-title">Fusion Feast</h5>
            <p class="card-text">Fusion Feast is an innovative and exciting restaurant that offers a fusion of cuisines from around the world. The menu features a creative blend of flavors and ingredients from different culinary traditions, resulting in a unique and unforgettable dining experience.</p>
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
    
        </div>
      </div>
    </div>
  </div>

</body>
</html>

