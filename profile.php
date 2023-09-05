<?php
// Start or resume the session
include('config.php');

// Check if the user is already logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page
    header("Location: index.php");
    exit;
}

// Get the user's email from the session
$userEmail = $_SESSION['email'];

// Initialize variables to store user data
$username = $phone = "";
$username_err = $phone_err = "";

// Retrieve the user's current profile information from the database
$query = "SELECT username, phone FROM users WHERE email = '$userEmail'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the user's current profile data
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $phone = $row['phone'];
}

// Handle form submission when the user updates their profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate phone number (optional)
    $phone = trim($_POST["phone"]);

    // Check if there are no errors before updating the profile
    if (empty($username_err) && empty($phone_err)) {
        // Update the user's profile in the database
        $query = "UPDATE users SET username = ?, phone = ? WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_phone, $param_email);

        $param_username = $username;
        $param_phone = $phone;
        $param_email = $userEmail;

        if (mysqli_stmt_execute($stmt)) {
            // Profile updated successfully, redirect to the profile page or another page
            header("Location: profile.php");
            exit;
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
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
        <h1 class="mt-5 text-center mb-4">Update Profile</h1>
        <p>Please fill out this form to update your profile.</p>

        <form class="mt-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JS if needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
