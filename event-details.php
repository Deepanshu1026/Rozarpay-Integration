<?php 
include 'includes/header.php';
// session_start(); 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Fetch the event ID from the URL
$eventId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Define event details
$events = [
    1 => [
        'title' => 'Summer Music Festival',
        'description' => 'Join us for the biggest music festival of the year!',
        'date' => 'June 15, 2023',
        'venue' => 'Central Park',
        'price' => 999, // Numeric
        'image' => 'assets/images/japan 1.webp'
    ],
    2 => [
        'title' => 'Tech Summit 2023',
        'description' => 'Learn from industry leaders about the future of technology.',
        'date' => 'July 20, 2023',
        'venue' => 'Convention Center',
        'price' => 1499,
        'image' => 'assets/images/blogbg 1.webp'
    ],
    3 => [
        'title' => 'Food & Wine Festival',
        'description' => 'Experience gourmet food and fine wines from around the world.',
        'date' => 'August 5, 2023',
        'venue' => 'Riverside Plaza',
        'price' => 799,
        'image' => 'assets/images/carousel1img 1.webp'
    ]
];

// Check if the event exists
if (array_key_exists($eventId, $events)) {
    $event = $events[$eventId];
} else {
    echo '<div class="container my-5"><h1 class="text-center">Event Not Found</h1></div>';
    include 'includes/footer.php';
    exit;
}
?>

<div class="container my-5">
    <h1 class="text-center mb-4"><?php echo htmlspecialchars($event['title']); ?></h1>
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo htmlspecialchars($event['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($event['title']); ?>">
        </div>
        <div class="col-md-6">
            <p><strong>Description:</strong> <?php echo htmlspecialchars($event['description']); ?></p>
            <p><strong>Date:</strong> <?php echo htmlspecialchars($event['date']); ?></p>
            <p><strong>Venue:</strong> <?php echo htmlspecialchars($event['venue']); ?></p>
            <p><strong>Price:</strong> ₹<?php echo number_format($event['price']); ?></p>
            <a href="book-ticket.php?price=<?php echo urlencode($event['price']); ?>" class="btn btn-success">Book Now</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
