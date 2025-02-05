<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SL Cricket Club</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
      <a class="navbar-brand fw-bold fs-3" href="#">SL Cricket Club</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#about">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#programs">Programs</a></li>
          <li class="nav-item"><a class="nav-link" href="#matches">Matches</a></li>
          <li class="nav-item"><a class="nav-link" href="#community">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <header>
    <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <!-- Carousel Indicators -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
  
      <!-- Carousel Items -->
      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active" style="height: 500px;">
          <img src="img1.jpg" class="d-block w-100" alt="img1">
          <div class="carousel-caption d-flex flex-column justify-content-center">
            <h1 class="display-4 fw-bold text-light">Join the SL Cricket Club</h1>
            <p class="lead text-light">Take your cricket skills to the next level and be part of an amazing community.</p>
            <a href="#contact" class="btn btn-primary btn-lg me-3">Get Started</a>
          </div>
        </div>
  
        <!-- Slide 2 -->
        <div class="carousel-item" style="height: 500px;">
          <img src="img2.jpg" class="d-block w-100" alt="img2">
          <div class="carousel-caption d-flex flex-column justify-content-center">
            <h1 class="display-4 fw-bold text-light">Elevate Your Cricket Game</h1>
            <p class="lead text-light">Join training programs for beginners and professionals alike.</p>
            <a href="#programs" class="btn btn-primary btn-lg">Explore Programs</a>
          </div>
        </div>
  
        <!-- Slide 3 -->
        <div class="carousel-item" style="height: 500px;">
          <img src="img3.jpg" class="d-block w-100" alt="img3">
          <div class="carousel-caption d-flex flex-column justify-content-center">
            <h1 class="display-4 fw-bold text-light">Be Part of the Team</h1>
            <p class="lead text-light">Connect with passionate players and grow together.</p>
            <a href="#contact" class="btn btn-primary btn-lg me-3">Contact Us</a>
          </div>
        </div>
      </div>
  
      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </header>




  
  <section id="programs" class="py-5 bg-light">
    <div class="container">
      <h2 class="fw-bold text-center mb-4">Our Programs</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100">
            <img src="img-1.jpg" class="card-img-top" alt="Junior Program">
            <div class="card-body">
              <h5 class="card-title">Junior Program</h5>
              <p class="card-text">For kids aged 5-12. Focus on fundamentals of cricket.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100">
            <img src="img-2.jpg" class="card-img-top" alt="Intermediate Program">
            <div class="card-body">
              <h5 class="card-title">Youth Program</h5>
              <p class="card-text">For ages 13-18. focus on advanced cricket skills and techniques.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100">
            <img src="img-3.jpg" class="card-img-top" alt="Advanced Program">
            <div class="card-body">
              <h5 class="card-title">Adlut Program</h5>
              <p class="card-text">For ages 18-45. Focus on mastering strategies and refining skills.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="matches" class="py-5">
    <div class="container">
      <h2 class="fw-bold text-center mb-4">Upcoming Matches</h2>
      <div class="row g-4">
        <div class="col-md-6">
          <div class="card border-success">
            <div class="card-body">
              <h5 class="card-title">All island championship</h5>
              <p class="card-text">Date: November 15, 2024<br>Time: 12:00 PM<br>Location: National Stadium</p>
              <a href="#" class="btn btn-success">View Details</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card border-success">
            <div class="card-body">
              <h5 class="card-title">Friendly Match</h5>
              <p class="card-text">Date: December 10, 2024<br>Time: 10:00 AM<br>Location: Local Club</p>
              <a href="#" class="btn btn-success">View Details</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-us">
    <div class="about-container">
      <div class="about-image"><img src="about_us.png" alt="Cricket practice"></div>
      <div class="about-content">
        <h2>About Us</h2>
        <p>Our academy, SL Cricket Academy, situated at Malad West, Mumbai, Maharashtra, was started with the aim to impart cricket training which gives results to all cricketers, kids, young and aged who are willing to learn cricket.</p>
        <p>We offer a wide range of cricket training programs for all ages and experience levels. Learn the different skills of cricket from our experienced instructors. We make sure to provide you and your kid</p>
      </div>
    </div>
  </section>

  
  <section id="community" class="py-5 bg-light">
    <div class="container">
      <h2 class="fw-bold text-center mb-4">Community Stories</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card">
            <img src="expert-img-2.png" class="card-img-top" alt="User 1">
            <div class="card-body">
              <p>"Joining SL Cricket Club was the best decision for my cricket career."</p>
              <p class="text-muted">- T.Kitsan</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="expert-img-1.png" class="card-img-top" alt="User 2">
            <div class="card-body">
              <p>"Amazing coaches and fantastic facilities. Highly recommend!"</p>
              <p class="text-muted">- D.Sajanaka</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="expert-img-3.png" class="card-img-top" alt="User 3">
            <div class="card-body">
              <p>"A wonderful community of passionate cricket players and fans."</p>
              <p class="text-muted">- P.Kavindu</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4">Contact Us</h2>
      <p>Have questions? Get in touch with us!</p>
      <a href="mailto:info@SLlcricketclub.com" class="btn btn-primary">Email Us</a>
    </div>
  </section>
  
         


 
  <footer class="bg-dark text-white text-center py-3">
    <p>© 2025 SL Cricket Club. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>