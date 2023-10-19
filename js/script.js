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
      window.location.href = "index.php?action=delete&id=" + productId;
    }
  });
}
