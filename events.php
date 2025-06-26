<?php include 'includes/header.php'; 
// session_start(); 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Upcoming Events</h1>
    
    <div class="row">
        <!-- Event Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="assets/images/japan 1.webp" class="card-img-top" alt="Concert">
                <div class="card-body">
                    <h5 class="card-title">Summer Music Festival</h5>
                    <p class="card-text">Join us for the biggest music festival of the year!</p>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item">📅 Date: June 15, 2023</li>
                        <li class="list-group-item">📍 Venue: Central Park</li>
                        <li class="list-group-item">💰 Price: ₹999</li>
                    </ul>
                    <a href="event-details.php?id=1" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <!-- Event Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="assets/images/blogbg 1.webp" class="card-img-top" alt="Tech Conference">
                <div class="card-body">
                    <h5 class="card-title">Tech Summit 2023</h5>
                    <p class="card-text">Learn from industry leaders about the future of technology.</p>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item">📅 Date: July 20, 2023</li>
                        <li class="list-group-item">📍 Venue: Convention Center</li>
                        <li class="list-group-item">💰 Price: ₹1499</li>
                    </ul>
                    <a href="event-details.php?id=2" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <!-- Event Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="assets/images/canada 1.webp" class="card-img-top" alt="Food Festival">
                <div class="card-body">
                    <h5 class="card-title">Food & Wine Festival</h5>
                    <p class="card-text">Experience gourmet food and fine wines from around the world.</p>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item">📅 Date: August 5, 2023</li>
                        <li class="list-group-item">📍 Venue: Riverside Plaza</li>
                        <li class="list-group-item">💰 Price: ₹799</li>
                    </ul>
                    <a href="event-details.php?id=3" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>