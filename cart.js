document.addEventListener("DOMContentLoaded", () => {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    function updateCart() {
        const cartContainer = document.getElementById("cart-items");
        const cartTotalElement = document.getElementById("cart-total");
        const clearCartBtn = document.getElementById("clear-cart");
        const proceedToPayBtn = document.getElementById("proceed-to-pay");

        if (!cartContainer || !cartTotalElement || !clearCartBtn || !proceedToPayBtn) return;

        cartContainer.innerHTML = "";

        let total = 0;

        if (cart.length === 0) {
            cartContainer.innerHTML = "<p>Your cart is empty.</p>";
            cartTotalElement.textContent = "Total: Rs. 0.00";
            clearCartBtn.style.display = "none";
            proceedToPayBtn.style.display = "none";
        } else {
            cart.forEach((item, index) => {
                const cartItem = document.createElement("div");
                cartItem.classList.add("cart-item");

                const formattedPrice = Number(item.price).toLocaleString(undefined, {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

                cartItem.innerHTML = `
                    <span>${item.name} - Rs.${formattedPrice}</span>
                    <button class="remove-btn" data-index="${index}">Remove</button>
                `;
                cartContainer.appendChild(cartItem);
                total += parseFloat(item.price);
            });

            cartTotalElement.textContent = `Total: Rs. ${total.toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            })}`;
            clearCartBtn.style.display = "inline-block";
            proceedToPayBtn.style.display = "inline-block";
        }

        localStorage.setItem("cart", JSON.stringify(cart));
    }

function addToCart(event) {
    const button = event.target;
    const item = button.closest(".guitar-item");
    const paragraph = item.querySelector("p").textContent;

  
    const [name, priceRaw] = paragraph.split(" - Rs.");
    const price = parseFloat(priceRaw.replace(/,/g, ''));

    cart.push({ name: name.trim(), price });
    localStorage.setItem("cart", JSON.stringify(cart));

    updateCart();
    alert(`${name.trim()} added to cart!`);
}


    function removeFromCart(event) {
        if (event.target.classList.contains("remove-btn")) {
            const index = event.target.dataset.index;
            cart.splice(index, 1);
            updateCart();
        }
    }

    function clearCart() {
        localStorage.removeItem("cart");
        cart.length = 0;
        updateCart();
    }

    function proceedToPay() {
        if (cart.length === 0) {
            alert("Your cart is empty! Add items before proceeding.");
            return;
        }

        alert("Redirecting to payment page...");
        window.location.href = "payment.html";
    }

    // Add to Cart buttons
    document.querySelectorAll(".guitar-item button").forEach(button => {
        button.addEventListener("click", addToCart);
    });

    // Remove, Clear Cart, Pay buttons
    const cartContainer = document.getElementById("cart-items");
    const clearCartBtn = document.getElementById("clear-cart");
    const proceedToPayBtn = document.getElementById("proceed-to-pay");

    if (cartContainer && clearCartBtn && proceedToPayBtn) {
        cartContainer.addEventListener("click", removeFromCart);
        clearCartBtn.addEventListener("click", clearCart);
        proceedToPayBtn.addEventListener("click", proceedToPay);
    }

    updateCart();
});
