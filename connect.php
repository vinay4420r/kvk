<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure that the form data is submitted as arrays
    if (isset($_POST['productName']) && is_array($_POST['productName']) &&
        isset($_POST['productSize']) && is_array($_POST['productSize']) &&
        isset($_POST['productQuantity']) && is_array($_POST['productQuantity'])) {

        $productnames = $_POST['productName'];
        $productsizes = $_POST['productSize'];
        $productquantities = $_POST['productQuantity'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $doorNo = $_POST['doorNo'];
        $buildingName = $_POST['buildingName'];
        $street = $_POST['street'];
        $area = $_POST['area'];
        $landmark = $_POST['landmark'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];

        // Connect to the database
        $con = new mysqli('localhost', 'root', '', 'karthik');

        if ($con) {
            // Loop through the product arrays and insert each product into the database
            foreach ($productnames as $index => $productname) {
                $productsize = $productsizes[$index];
                $productquantity = $productquantities[$index];

                // Prepare the SQL statement to prevent SQL injection
                $stmt = $con->prepare("INSERT INTO `clients` (productName, productSize, productQuantity, name, email, mobile, doorNo, buildingName, street, area, landmark, city, state, pincode) 
                                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                // Bind parameters
                $stmt->bind_param("ssisssssssssss", $productname, $productsize, $productquantity, $name, $email, $mobile, $doorNo, $buildingName, $street, $area, $landmark, $city, $state, $pincode);

                // Execute the prepared statement
                if (!$stmt->execute()) {
                    die($stmt->error); // Display error if the query fails
                }
            }

            $stmt->close(); // Close the statement
            $con->close(); // Close the database connection

            // Redirect to the thank-you page
            header("Location: thankyou.html");
            exit(); // Stop further execution after redirection
        } else {
            die(mysqli_error($con)); // Display connection error
        }
    } else {
        echo "Error: Product names, sizes, and quantities are not in array format.";
    }
}
?>
