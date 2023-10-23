let mainImage = document.querySelector(".main-image img");

let subImages = document.querySelectorAll(".sub-image img");

subImages.forEach((image) => {
  image.addEventListener("click", () => {
    console.log("click");
    let src = image.getAttribute("src");
    mainImage.src = src;
  });
});

const deleteProductButton = document.getElementById("deleteProductButton");

if (deleteProductButton) {
  deleteProductButton.addEventListener("click", function (event) {
    event.preventDefault();
    const productId = this.getAttribute("data-product-id");
    if (confirm("Voulez-vous vraiment supprimer ce produit ?")) {
      window.location.href = "/Ballers/delete?id=" + productId;
    }
  });
}

let productAddedMessage = document.getElementById("productAddedMessage");
let addToCartForm = document.querySelector(
  'form[action="/Ballers/add-to-cart"]'
);

addToCartForm.addEventListener("submit", function (event) {
  event.preventDefault();
  productAddedMessage.style.display = "block";

  const formData = new FormData(addToCartForm);

  axios
    .post("/Ballers/add-to-cart", formData)
    .then(function (response) {
      console.log(response.data);
    })
    .catch(function (error) {
      console.error(error);
    });
});
