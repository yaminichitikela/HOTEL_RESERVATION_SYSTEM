<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Reservation - Shopping Page</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-Dziy5WaxJFxR3AJi3+//FV6PZcyA0+Y6Ea1m/xB1aQ5g6I5U6IkjKpzC5X9FtaU6"
      crossorigin="anonymous"
    />
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
  
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
      }

      .container {
        margin-top: 100px;
      }

      .card {
        margin-bottom: 30px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      }

      .card-img-top {
        height: 200px;
        object-fit: cover;
      }

      .card-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
      }

      .card-subtitle {
        font-size: 1.2rem;
        margin-bottom: 10px;
        color: #666;
      }

      .card-text {
        margin-bottom: 10px;
        font-size: 1rem;
      }

      .card-price {
        font-size: 1.2rem;
        font-weight: bold;
      }

      .btn {
        border-radius: 0;
      }

      .btn-primary {
        background-color: #3f51b5;
        border-color: #3f51b5;
      }

      .btn-primary:hover {
        background-color: #2c3e50;
        border-color: #2c3e50;
      }

      .btn-secondary {
        background-color: #e0e0e0;
        border-color: #e0e0e0;
      }

      .btn-secondary:hover {
        background-color: #bdc3c7;
        border-color: #bdc3c7;
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

    <div class="container">
    <h1>Shopping Malls</h1>
    <div class="row">
      <div class="col-md-4">
        <div class="card">

          <img class="card-img-top" src="shoppingimg1.jpg" alt="Card image cap" width=350 height=200>
         
          <!-- <img src="https://picsum.photos/id/1018/400/300" class="card-img-top" alt="...">  -->
          <div class="card-body">
            <h5 class="card-title">The Galleria</h5>
            <p class="card-text">Sale 30%</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <img class="card-img-top" src="shoppingimg2.jpg" alt="Card image cap" width=350 height=200>
         <!-- <img src="https://picsum.photos/id/1025/400/300" class="card-img-top" alt="...">  -->
          <div class="card-body">
            <h5 class="card-title">Metropolitan Marketplace</h5>
            <p class="card-text">Sale 50%</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <img class="card-img-top" src="shoppingimg3.jpg" alt="Card image cap" width=350 height=200>
          <div class="card-body">
          <h5 class="card-title">Orchard Place</h5>
            <p class="card-text">Sale 60%</p>
          </div>
        </div>
      </div>
    </div>
  </div>
