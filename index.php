<?php
     include('db.php');

     session_start();

     $display_name = "Guest";
     if(isset($_SESSION['user_data']['firstname'])){
        $display_name = $_SESSION['user_data']['firstname'];
     };

     if(isset($_GET['logout'])){
        unset($display_name);
        session_destroy();
        header('location:login.php');
     }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Hotel Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/footer.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

</head>

<body>
  <header class="header" id="navigation-menu">
    <div class="container">
      <nav>
        <a href="#" class="logo"> <img src="img/logo11.png" alt=""> </a>

        <ul class="nav-menu">
          <li> <a href="index.html" class="nav-link">Home</a> </li>
          <li> <a href="events.html" class="nav-link">Events</a> </li>
          <li> <a href="offers.html" class="nav-link">Offers</a> </li>
          <li> <a href="bookings.html" class="nav-link">Bookings</a> </li>
          <li> <a href="feedback.html" class="nav-link">Feedback</a> </li>
          <li> <a href="contact.php" class="nav-link">Contact Us</a> </li>
          <?php if(isset($_SESSION['user_data'])) { ?>
            <li> <a href="user.php" class="nav-link">User</a> </li>
            <li> <a href="?logout" class="nav-link">Logout</a> </li>
          <?php } else { ?>
            <li> <a href="login.php" class="nav-link">Login</a> </li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </header>
  
  <section class="home" id="home">
    <div class="head_container">
      <div class="box">
        <div class="text">
          <h1>AVENGA HOTELS</h1>
          <p><legend>Hello <?php echo $display_name; ?>,</legend>Discover a world of unparalleled luxury and refinement as you step into our grand hotel where opulent amentities, personalized services,
            and stunning surroundings come together to create an unforgettable experience that exceeds all expectations</p>
        </div>
      </div>
      <div class="image">
        <img src="img/himage2.jpg" class="slide">
      </div>
      <div class="image_item">
        <img src="img/himage2.jpg" alt="" class="slide active" onclick="img('img/himage2.jpg')">
        <img src="img/himage3.jpg" alt="" class="slide active" onclick="img('img/himage3.jpg')">
        <img src="img/himage4.jpg" alt="" class="slide active" onclick="img('img/himage4.jpg')">
        <img src="img/event4.jpg" alt="" class="slide active" onclick="img('img/event4.jpg')">
      </div>
    </div>
  </section>
  
  <script>
    function img(anything) {
      document.querySelector('.slide').src = anything;
    }

    function change(change) {
      const line = document.querySelector('.image');
      line.style.background = change;
    }
  </script>

  <section class="book">
    <div class="container flex">
      <div class="input grid">
        <div class="box">
          <label>Check-in:</label>
          <input type="date" placeholder="Check-in-Date">
        </div>
        <div class="box">
          <label>Check-out:</label>
          <input type="date" placeholder="Check-out-Date">
        </div>
        <div class="box">
          <label>Adults:</label> <br>
          <input type="number" placeholder="0">
        </div>
        <div class="box">
          <label>Children:</label> <br>
          <input type="number" placeholder="0">
        </div>
      </div>
      <div class="search">
        <input type="submit" value="SEARCH">
      </div>
    </div>
  </section>
  <section class="about top" id="about">
    <div class="container flex">
      <div class="left">
        <div class="img">
          <img src="img/a1.jpg" alt="" class="image1">
          <img src="img/a2.jpg" alt="" class="image2">
        </div>
      </div>
      <div class="right">
        <div class="heading">
          <h5>A Home Away From Home, Perfected</h5>
          <h2>Welcome to Avenga Hotel</h2>
          <p>Welcome to Hotel Avenga, where luxury meets comfort and exceptional service awaits you. Nestled in the heart of Colombo, our hotel is the perfect destination for discerning travelers seeking an unforgettable stay. With our impeccable attention to detail and a range of premium amenities, we ensure that every moment of your stay exceeds your expectations.</p>
          <p>Indulge in the comfort of our well-appointed rooms and suites, tastefully designed to create a tranquil oasis amidst the bustling cityscape. Relax on plush bedding, admire breathtaking views, and take advantage of the latest technology and amenities provided in every room.</p>
          <p>Savor a culinary journey at our renowned restaurant, where our talented chefs create exquisite dishes that showcase the finest local and international flavors. Whether you're in the mood for a gourmet breakfast, a leisurely lunch, or an intimate dinner, our dining options are sure to delight your taste buds.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="wrapper top">
    <div class="container">
      <div class="text">
        <h2>Our Amenities</h2>
        <p>Welcome to Hotel Avenga, where your comfort is our top priority. We offer a range of amenities to make your stay enjoyable and convenient.<br>
          Relax in our cozy rooms, equipped with comfortable beds and modern amenities. Stay connected with complimentary Wi-Fi throughout the hotel.<br>
          Start your day with a delicious breakfast served in our dining area. Stay in shape at our fitness center or take a refreshing dip in our swimming pool.<br>
          For your convenience, our friendly staff is available 24/7 to assist with any requests or questions you may have.<br>
          We strive to provide a seamless and enjoyable experience during your stay at Avenga Hotels.</p>
      </div>
    </div>
  </section>

  <section class="room top" id="room">
    <div class="container">
      <div class="heading_top flex1">
        <div class="heading">
          <h5>Your Escape to Unparalleled Relaxation</h5>
          <h2>Rooms & Suites</h2>
          <h4>Most Popular Reservations</h4><br>
        </div>
        <div class="button">
          <button class="btn1"><a href="bookings.html">Bookings</a></button>
        </div>
      </div>

      <div class="content grid">
        <div class="box">
          <div class="img">
            <img src="img/pressuite1.jpg" alt="">
          </div>
          <div class="text">
            <h3>Presidential Suite</h3>
            <p> <span>LKR</span>45000<span>/per night</span> </p>
          </div>
        </div>
        <div class="box">
          <div class="img">
            <img src="img/gardenvilla3.webp" alt="">
          </div>
          <div class="text">
            <h3>Garden Villa</h3>
            <p> <span>LKR</span>34000<span>/per night</span> </p>
          </div>
        </div>
        <div class="box">
          <div class="img">
            <img src="img/ocean3.jpg" alt="">
          </div>
          <div class="text">
            <h3>Ocean View Room</h3>
            <p> <span>LKR</span>27000<span>/per night</span> </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="room top" id="room">
    <div class="container">
      <div class="heading_top flex1">
        <div class="heading">
          <h5>Your Perfect Event, Our Passionate Execution</h5>
          <h2>Hotel Events</h2>
          <h4>Most Popular Events</h4><br>
        </div>
        <div class="button">
          <button class="btn1">Events</button>
        </div>
      </div>

      <div class="content grid">
        <div class="box">
          <div class="img">
            <img src="img/event6.jpg" alt="">
          </div>
          <div class="text">
            <h3>Weekend Beach Party</h3>
            <p><span>Join us for an incredible beach party experience at our hotel! Discover a tropical paradise where the sun, sand, and music come together to create unforgettable moments. Enjoy the beautiful beach, dance to lively beats, and savor refreshing drinks by the shore. Our friendly staff is ready to make your beach party dreams come true. Book your stay now and get ready to have a blast!</span></p>
          </div>
        </div>
        <div class="box">
          <div class="img">
            <img src="img/event2.jpg" alt="">
          </div>
          <div class="text">
            <h3>High Tea buffet</h3>
            <p> <span>
              Experience the elegance of our high tea buffet. Indulge in a delightful array of sweet and savory treats, paired with a selection of fine teas. Join us for an unforgettable afternoon of relaxation and indulgence. Book your table now and savor the flavors of luxury.</span> </p>
          </div>
        </div>
        <div class="box">
          <div class="img">
            <img src="img/event3.jpg" alt="">
          </div>
          <div class="text">
            <h3>Sunday Night Musical</h3>
            <p> <span>Join us for a magical musical night at our hotel. Sit back, relax, and enjoy enchanting live music that will captivate your senses. Immerse yourself in the melodic ambiance and create unforgettable memories. Reserve your spot now and let the music take you on a journey.</span> </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="wrapper wrapper2 top">
    <div class="container">
      <div class="text">
        <div class="heading">
          <h2>What People Say</h2>
        </div>
        <div class="para">
          <p>At our hotel, we take pride in providing exceptional service and creating memorable experiences for our guests.<br>
            <br>
            Click Feedback button to , see what people think about us and share your feedback and let us know about your stay.
          </p>
          <button class="btn1">Feedback</button>
          <div class="box flex">
          </div>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>

  <!-- footer section -->
  <div class="footer">
    <div class="col-1">
      <h3>Useful Links</h3>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        <a href="#">Events</a>
        <div class="social-icons">
          <i class="fab fa-facebook"></i>
          <i class="fab fa-twitter"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-linkedin"></i>
        </div>
    </div>

    <div class="col-2">
      <h3>Latest News</h3>
      <form>
        <input type="email" placeholder="Your Email Address" required>
        <br>
        <button type="submit">Subscribe</button>
      </form>
    </div>

    <div class="col-3">
      <h3>Contact Information</h3>
      <p>Operating Hours: Mon-Sun 8AM to 5PM<br>Telephone: +94124345678<br>Email: res@avengahotels.com</p><br><br>
      <h3>Address</h3>
      <p>34/2 <br>Pasan Mawatha<br>Colombo 03<br>Sri Lanka</p>
    </div>
  </div>
  <!-- footer section -->
</body>

</html>