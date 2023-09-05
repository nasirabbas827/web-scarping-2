<?php
// Start or resume the session
include('config.php');

// Check if the user is already logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit;
}

// Get the user's email from the session
$userEmail = $_SESSION['email'];

// Retrieve the user's id from the users table based on their email
$query = "SELECT id FROM users WHERE email = '$userEmail'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the user's id
    $row = mysqli_fetch_assoc($result);
    $userId = $row['id'];

    // Retrieve the user's search history from the search_history table
    $query = "SELECT search_query, search_timestamp FROM search_history WHERE user_id = '$userId' ORDER BY search_timestamp DESC";
    $historyResult = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search History</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            background-color: honeydew;
        }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <h1 class="mt-5 text-center mb-4">Search History</h1>

        <?php if (isset($historyResult) && mysqli_num_rows($historyResult) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Search Query</th>
                        <th>Search Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($historyResult)): ?>
                        <tr>
                            <td><?php echo $row['search_query']; ?></td>
                            <td><?php echo $row['search_timestamp']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No search history found.</p>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS if needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
