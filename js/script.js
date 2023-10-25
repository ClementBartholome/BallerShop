/*
 ** Scroll Reveal
 */

ScrollReveal().reveal(".category-reveal", {
  duration: 1000,
  origin: "bottom",
  distance: "50px",
  delay: 200,
  easing: "cubic-bezier(0.5, 0, 0, 1)", // Acceleration and deceleration
});

/*
 ** Search function
 */

const searchInput = document.getElementById("search-bar");
const productsContainer = document.getElementById("products-container");
let productItems = "";

if (productsContainer) {
  productItems = productsContainer.querySelectorAll(".product");
  console.log(productItems);
}
const noResultsMessage = document.getElementById("no-results-message");

if (searchInput) {
  searchInput.addEventListener("input", function () {
    // Get the trimmed and lowercase search term from the input
    const searchTerm = searchInput.value.trim().toLowerCase();
    let anyProductFound = false;

    // Loop through each product item
    productItems.forEach(function (productItem) {
      // Get the lowercase text content of the product name
      const productName = productItem
        .querySelector(".card-title")
        .textContent.toLowerCase();

      // Check if the product name includes the search term
      if (productName.includes(searchTerm)) {
        // If it does, display the product item
        productItem.style.display = "block";
        anyProductFound = true;
      } else {
        // If it doesn't, hide the product item
        productItem.style.display = "none";
      }
    });

    // Check if any product was found
    if (anyProductFound) {
      // If any products were found, hide the "no results" message
      noResultsMessage.style.display = "none";
    } else {
      // If no products were found, display the "no results" message
      noResultsMessage.style.display = "block";
    }
  });
}

/*
 ** Product page functions
 */

// Thumbnails image gallery

let mainImage = document.querySelector(".main-image img");
let subImages = document.querySelectorAll(".sub-image img");

if (subImages) {
  // Add a click event listener to each sub image
  subImages.forEach((image) => {
    image.addEventListener("click", () => {
      console.log("click");
      let src = image.getAttribute("src");
      // Update the main image source when a sub  image is clicked
      mainImage.src = src;
    });
  });
}

// Delete product
const deleteProductButton = document.getElementById("deleteProductButton");

if (deleteProductButton) {
  deleteProductButton.addEventListener("click", function (event) {
    event.preventDefault();
    // Get the product ID from the button's data attribute
    const productId = this.getAttribute("data-product-id");
    // Display a confirmation dialog for product deletion
    if (confirm("Voulez-vous vraiment supprimer ce produit ?")) {
      // Redirect to the product deletion URL
      window.location.href = "/Ballers/delete?id=" + productId;
    }
  });
}

// Add product
let productAddedMessage = document.getElementById("productAddedMessage");
let addToCartForm = document.querySelector(
  'form[action="/Ballers/add-to-cart"]'
);

if (addToCartForm) {
  addToCartForm.addEventListener("submit", function (event) {
    event.preventDefault();
    // Display the product added message
    productAddedMessage.style.display = "block";

    // Create a FormData object with the form data
    const formData = new FormData(addToCartForm);

    // Send a POST request to add the product to the cart
    axios
      .post("/Ballers/add-to-cart", formData)
      .then(function (response) {
        console.log(response.data);
      })
      .catch(function (error) {
        console.error(error);
      });
  });
}
