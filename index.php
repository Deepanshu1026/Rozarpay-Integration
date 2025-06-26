<?php include 'includes/header.php'; 
// session_start(); 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
// echo $user_id;
?>
<style>
    .hover-scale {
    transition: transform 0.3s ease;
}
.hover-scale:hover {
    transform: scale(1.05);
}

.hero-section h1,
.hero-section p {
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
}

.card {
    border-radius: 15px;
}

.btn-primary {
        background-color: #6a11cb;
        border: none;
        padding: 12px 24px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }
    .btn-primary:hover {
     background-color: #4a0d9c;
     transform: scale(1.05); /* Slight scaling effect */
     box-shadow: 0 8px 16px rgba(106, 17, 203, 0.3); /* Shadow animation */
}
.hero-section {
    position: relative;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-align: center;
    background: url('assets/images/epic.png') no-repeat center center/cover;
    overflow: hidden;
}

.display-2{
    font-family: 'Poppins', sans-serif;
    font-weight: 400 !important;
}
.display-2 span {
    font-family: 'Poppins', sans-serif;
    font-weight: 400 !important;
    color:#fff; /* Neon cyan */
    border-right: 2px solid #00ffff;
    padding-right: 5px;
    animation: blink 0.7s step-end infinite;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
    /* text-shadow: 0 0 2px #00ffff, 0 0 4px #00ffff, 0 0 6px #0ff; */
}

@keyframes blink {
  from, to {
    border-color: transparent;
  }
  50% {
    border-color: #00ffff;
  }
}



/* .hero-section::before {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(135deg, black, rgba(0, 0, 0, 0.5));
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    z-index: 1;
    opacity: 0.9;
}

.hero-section .hero-content {
    position: relative;
    z-index: 2;
} */

/* Snow Effect */

</style>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Modern Hero Section -->
<section class="hero-section position-relative d-flex align-items-center justify-content-center text-white text-center" style="height: 100vh; ">
    <div class="overlay position-absolute w-100 h-100" style=" top: 0; left: 0;"></div>
    <div class="container position-relative z-2">
        <h1 class="display-2 fw-bold mb-3" style=" font-family: 'Poppins', sans-serif !important;">Discover & Book <br> <span  id="animated-text"></span></h1>
        <!-- <p class="lead mb-4">Concerts, Conferences, Festivals – All in One Place</p> -->
        <a href="events.php" class="btn btn-lg btn-primary px-5 py-3 shadow">Browse Events</a>
    </div>
</section>

<!-- Snow Effect -->


<!-- Features Section -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-5">Why Book with Us?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 hover-scale">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">🎫 Easy Ticket Booking</h5>
                        <p>Quick checkout, real-time confirmation, and secure payment options.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 hover-scale">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">🌍 Events Near You</h5>
                        <p>Stay updated on concerts, seminars, workshops, and more – wherever you are.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 hover-scale">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">📲 Seamless Experience</h5>
                        <p>Mobile-ready tickets and updates to keep your plans smooth and easy.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
    <div class="container text-center">
        <h2 class="fw-bold">Ready to Join the Next Big Event?</h2>
        <p class="lead mb-4">Don’t miss your chance to experience unforgettable moments.</p>
        <a href="events.php" class="btn btn-light btn-lg px-4 py-2">Explore Events Now</a>
    </div>
</section>
<script>
  const text = "Epic Events";
  const target = document.getElementById("animated-text");
  let index = 0;

  function typeEffect() {
    if (index < text.length) {
      target.textContent += text.charAt(index);
      index++;
      setTimeout(typeEffect, 100);
    }
  }

  window.onload = typeEffect;
</script>

<?php include 'includes/footer.php'; ?>
