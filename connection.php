<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) &&
        !empty($_POST['doorNo']) && !empty($_POST['buildingName']) && !empty($_POST['street']) &&
        !empty($_POST['area']) && !empty($_POST['landmark']) && !empty($_POST['city']) &&
        !empty($_POST['state']) && !empty($_POST['pincode']) &&
        !empty($_POST['productName']) && !empty($_POST['productSize']) && !empty($_POST['productQuantity'])) {

        // Retrieve customer details
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

        // Retrieve product details
        $productNames = $_POST['productName'];
        $productSizes = $_POST['productSize'];
        $productQuantities = $_POST['productQuantity'];

        // Database connection
        $con = new mysqli('localhost', 'root', '', 'karthik');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // Prepare SQL statement
        $stmt = $con->prepare("INSERT INTO `clients` (productName, productSize, productQuantity, name, email, mobile, doorNo, buildingName, street, area, landmark, city, state, pincode) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            // Loop through product arrays
            for ($i = 0; $i < count($productNames); $i++) {
                $productname = $productNames[$i];
                $productsize = $productSizes[$i];
                $productquantity = $productQuantities[$i];

                $stmt->bind_param("ssisssssssssss", $productname, $productsize, $productquantity, $name, $email, $mobile, $doorNo, $buildingName, $street, $area, $landmark, $city, $state, $pincode);

                if (!$stmt->execute()) {
                    echo "Error inserting product $productname: " . $stmt->error;
                }
            }

            // Close the statement and connection
            $stmt->close();
            $con->close();

            // Redirect to the thank-you HTML page
            header("Location: thankyou.html");
            exit();
        } else {
            echo "Error preparing statement: " . $con->error;
        }

        $con->close();
    } else {
        echo "Error: Please fill in all required fields.";
    }
}
?>
