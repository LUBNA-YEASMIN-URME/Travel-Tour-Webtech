<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <title>Travel Tours</title>
</head>

<body>
    <header>
        <h1 class="travel-title"><u>Travel Tours</u></h1>
        <nav>
            <ul class="navbar">
                <li><a href="home_view.php">Home</a></li>
                <li><a href="destinations_view.php">Destinations</a></li>
                <li><a href="tours_view.php">Tours</a></li>
                <li><a href="bookings_view.php">Bookings</a></li>
                <li><a href="about_us_view.php">About Us</a></li>
                <li>
                    <form action="/search" method="get" class="search-form">
                        <label for="search" class="search-label">Search:</label>
                        <input type="text" id="search" name="q" class="search-input" placeholder="Search for tours" required>
                        <button type="submit" class="search-button">Search</button>
                    </form>
                </li>
                <li><a href="../controllers/logout_controller.php">Logout</a></li>
            </ul>
        </nav>
    </header>
</body>

</html>
