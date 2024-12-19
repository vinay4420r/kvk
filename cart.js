document.addEventListener("DOMContentLoaded", () => {
    const cartContainer = document.getElementById("cart-container");
    const totalPriceEl = document.getElementById("total-price");

    // Load cart items from local storage
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    function renderCart() {
        cartContainer.innerHTML = ""; // Clear the cart container
        let totalPrice = 0;

        if (cart.length === 0) {
            cartContainer.innerHTML = "<p>Your cart is empty.</p>";
            totalPriceEl.textContent = "$0.00";
            return;
        }

        cart.forEach(item => {
            const cartItemEl = document.createElement("div");
            cartItemEl.classList.add("cart-item");
            cartItemEl.setAttribute("data-id", item.id); // Add data-id for targeting

            cartItemEl.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="cart-item-image">
                <div class="cart-item-details">
                    <h3>${item.name}</h3>
                    <p>Price: $${item.price}</p>
                    <p>Quantity: 
                        <input type="number" min="1" value="${item.quantity}" class="quantity-input" data-id="${item.id}">
                    </p>
                </div>
                <button class="remove-button" data-id="${item.id}">Remove</button>
            `;

            cartContainer.appendChild(cartItemEl);
            totalPrice += parseFloat(item.price) * item.quantity;
        });

        totalPriceEl.textContent = `$${totalPrice.toFixed(2)}`;
    }

    // Handle quantity updates
    cartContainer.addEventListener("input", e => {
        if (e.target.classList.contains("quantity-input")) {
            const id = e.target.dataset.id;
            const newQuantity = parseInt(e.target.value, 10);

            // Update quantity in the cart
            const cartItem = cart.find(item => item.id === id);
            if (cartItem) {
                cartItem.quantity = newQuantity;
                localStorage.setItem("cart", JSON.stringify(cart));
                renderCart();
            }
        }
    });

    // Handle item removal
    cartContainer.addEventListener("click", e => {
        if (e.target.classList.contains("remove-button")) {
            const id = e.target.dataset.id;

            // Remove item from the cart
            cart = cart.filter(item => item.id !== id);
            localStorage.setItem("cart", JSON.stringify(cart)); // Update local storage

            // Re-render the cart to reflect the changes
            renderCart();
        }
    });

    renderCart(); // Initial render
});
