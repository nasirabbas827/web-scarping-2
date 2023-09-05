<?php
// Start or resume the session
include('config.php');

// Check if the user is already logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page
    header("Location: index.php");
    exit;
}

// Include the HTML DOM Parser library
include('simple_html_dom.php');

// Function to scrape and filter products based on the search query
function searchAmazonProducts($query, $filePaths) {
    // Initialize an array to store the matching products
    $matchingProducts = [];

    // Loop through the file paths
    foreach ($filePaths as $filePath) {
        // Load the downloaded Amazon page
        $html = file_get_html($filePath);

        // Find product elements based on the provided HTML structure
        foreach ($html->find('[data-component-type="s-search-result"]') as $product) {
            // Extract product name
            $productNameElement = $product->find('h2 span', 0);
            $productName = $productNameElement ? $productNameElement->plaintext : 'Not Found';

            // Extract product price
            $productPriceElement = $product->find('.a-price .a-offscreen', 0);
            $productPrice = $productPriceElement ? $productPriceElement->plaintext : 'Not Found';

            // Extract product image URL
            $productImageElement = $product->find('img.s-image', 0);
            $productImage = $productImageElement ? $productImageElement->getAttribute('src') : 'Not Found';

            // Extract product delivery info
            $productDeliveryElement = $product->find('.s-shipment-indent .a-text-bold', 0);
            $productDelivery = $productDeliveryElement ? $productDeliveryElement->plaintext : 'Sep 26 - Oct 18';

            // Extract product age range
            $productAgeElement = $product->find('span:contains("Ages:")', 0);
            $productAge = $productAgeElement ? trim(str_replace('Ages:', '', $productAgeElement->plaintext)) : '12 years and up';

            // Check if the product name or description contains the search query
            if (stripos($productName, $query) !== false) {
                // Add the matching product to the results array
                $matchingProducts[] = [
                    'name' => $productName,
                    'price' => $productPrice,
                    'image' => $productImage,
                    'delivery' => $productDelivery,
                    'age' => $productAge,
                ];
            }
        }
    }

    return $matchingProducts;
}

// Initialize results as an empty array
$results = [];

// Check if a search query has been submitted
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];

    // Set the correct file paths in an array
    $filePaths = ['Amazon.com _ toys.html', 'file1.html', 'file2.html', 'file3.html', 'file4.html'];

    // Search in all files and merge the results
    $results = searchAmazonProducts($searchQuery, $filePaths);

    // Get the user's email from the session
    $userEmail = $_SESSION['email'];

    // Retrieve the user's id from the users table based on their email
    $query = "SELECT id FROM users WHERE email = '$userEmail'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user's id
        $row = mysqli_fetch_assoc($result);
        $userId = $row['id'];

        // Record the search history in the database
        $searchTimestamp = date('Y-m-d H:i:s');
        $searchQuery = mysqli_real_escape_string($conn, $searchQuery); // Sanitize the input
        $query = "INSERT INTO search_history (user_id, search_query, search_timestamp) VALUES ('$userId', '$searchQuery', '$searchTimestamp')";
        mysqli_query($conn, $query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amazon Product Search</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            background-color:honeydew;
        }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <h1 class="mt-5 text-center mb-4">Amazon Product Search</h1>
        
        <!-- Search Form with Bootstrap styling -->
        <form class="mt-3 mb-3" action="" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for products">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <!-- Display Search Results with Bootstrap styling -->
        <?php if (!empty($results)): ?>
            <h2>Search Results:</h2>
            <ul class="list-group mt-2 mb-2">
                <?php foreach ($results as $result): ?>
                    <li class="list-group-item">
                        <strong><?php echo $result['name']; ?></strong><br>
                        Price: <?php echo $result['price']; ?><br>
                        Delivery: <?php echo $result['delivery']; ?><br>
                        Age Range: <?php echo $result['age']; ?><br>
                        <img src="<?php echo $result['image']; ?>" alt="Product Image" class="img-fluid">
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-danger" >No search results found.</p>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS if needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
