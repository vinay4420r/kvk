
document.getElementById("addToCartBtn").addEventListener("click", function() {
    const productName = document.querySelector(".product-title").textContent;
    const productPrice = document.querySelector(".new-price span").textContent;
    const productSize = document.getElementById("size").value;
    const productQuantity = document.getElementById("quantity").value;

    // Assuming there's at least one image in the product display, select the first one
    const productImage = document.querySelector(".img-showcase img")?.src || '';

    const cartItem = {
        name: productName,
        price: productPrice,
        size: productSize,
        quantity: productQuantity,
        image: productImage
    };

    // Retrieve the existing cart items from localStorage or create an empty array
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Add the new item to the cart
    cart.push(cartItem);

    // Save the updated cart back to localStorage
    localStorage.setItem("cart", JSON.stringify(cart));

    alert("Item added to cart!");
});

document.getElementById("addToCartBtnDesktop").addEventListener("click", function() {
    const productName = document.querySelector(".product-title").textContent;
    const productPrice = document.querySelector(".new-price span").textContent;
    const productSize = document.getElementById("size").value;
    const productQuantity = document.getElementById("quantity").value;

    // Assuming there's at least one image in the product display, select the first one
    const productImage = document.querySelector(".img-showcase img")?.src || '';

    const cartItem = {
        name: productName,
        price: productPrice,
        size: productSize,
        quantity: productQuantity,
        image: productImage
    };

    // Retrieve the existing cart items from localStorage or create an empty array
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Add the new item to the cart
    cart.push(cartItem);

    // Save the updated cart back to localStorage
    localStorage.setItem("cart", JSON.stringify(cart));

    alert("Item added to cart!");
});


