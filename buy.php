<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

</head>
<style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

h1 {
    text-align: center;
    color: #2c3e50;
    margin-top: 20px;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #34495e;
    border-bottom: 2px solid #2980b9;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 15px;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #2c3e50;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
    margin-bottom: 15px;
}

input[type="text"]:focus,
input[type="email"]:focus {
    border-color: #2980b9;
    outline: none;
}

.btn {
    text-align: center;
    margin-top: 20px;
}

button[type="submit"] {
    background-color: #2980b9;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #1a6696;
}

/* Responsive styles */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }
    .details, .productdetails {
        grid-template-columns: 1fr;
    }
    h1 {
        font-size: 1.5em;
    }
    button[type="submit"] {
        padding: 8px 15px;
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    body {
        font-size: 14px;
    }
    h1 {
        font-size: 1.3em;
    }
    .container {
        width: 100%;
        padding: 10px;
    }
    button[type="submit"] {
        font-size: 12px;
        padding: 6px 10px;
    }
}

    </style>
<body>
<h1>Checkout</h1>
    <div class="container">
        <form action="connection.php" method="post">
            <div id="productDetails" class="productdetails">
                
            </div>

            <h2>Customer Details</h2>
            <div class="details">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div>
                <label for="mobile">Mobile:</label>
                <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
            </div>
            <div>
                <label for="doorNo">Door No:</label>
                <input type="text" id="doorNo" name="doorNo" placeholder="Enter your door number" required>
            </div>
            <div>
                <label for="buildingName">Building Name:</label>
                <input type="text" id="buildingName" name="buildingName" placeholder="Enter your building name" required>
            </div>
            <div>
                <label for="street">Street:</label>
                <input type="text" id="street" name="street" placeholder="Enter your street" required>
            </div>
            <div>
                <label for="area">Area/Locality:</label>
                <input type="text" id="area" name="area" placeholder="Enter your area/locality" required>
            </div>
            <div>
                <label for="landmark">Landmark:</label>
                <input type="text" id="landmark" name="landmark" placeholder="Enter a landmark" required>
            </div>
            <div>
                <label for="city">City:</label>
                <input type="text" id="city" name="city" placeholder="Enter your city" required>
            </div>
            <div>
                <label for="state">State:</label>
                <input type="text" id="state" name="state" placeholder="Enter your state" required>
            </div>
            <div>
                <label for="pincode">Pincode:</label>
                <input type="text" id="pincode" name="pincode" placeholder="Enter your pincode" required>
            </div>
            
            <div class="btn">
                <button type="submit">Submit</button>
            </div>
            </div>
        </form>
    </div>


    <script>
      // Retrieve checkout product details from sessionStorage
const checkoutProduct = JSON.parse(sessionStorage.getItem('checkoutProduct')) || {};

// Display product details on checkout page
const productDetailsDiv = document.getElementById('productDetails');
if (checkoutProduct.name) {
    productDetailsDiv.innerHTML = `
        <label>Product Name:</label>
        <input type="text" name="productName[]" value="${checkoutProduct.name}" readonly>
        
        <label>Product Size:</label>
        <input type="text" name="productSize[]" value="${checkoutProduct.size}" readonly>
        
        <label>Quantity:</label>
        <input type="number" name="productQuantity[]" value="${checkoutProduct.quantity}" readonly style="width=100%">
    `;
}

// Clear sessionStorage when the page is unloaded
window.onbeforeunload = function() {
    sessionStorage.removeItem('checkoutProduct');
};

    </script>
</body>
</html>
