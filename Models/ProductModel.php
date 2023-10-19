<?php
class ProductModel {
    private int $id;
    private string $name;
    private string $description;
    private float $price;
    private string $image1;
    private string $image2;
    private string $image3;
    private string $category;

    public function __construct($id, $name, $description, $price, $image1, $image2, $image3, $category) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image1 = $image1;
        $this->image2 = $image2;
        $this->image3 = $image3;
        $this->category = $category;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
            $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
            $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $description) {
            $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice(float $price) {
            $this->price = $price;
    }

    public function getImage1() {
        return $this->image1;
    }

    public function setImage1(string $image1) {
            $this->image1 = $image1;
    }

    public function getImage2() {
        return $this->image2;
    }

    public function setImage2(string $image2) {
            $this->image2 = $image2;
    }

    public function getImage3() {
        return $this->image3;
    }

    public function setImage3(string $image3) {
            $this->image3 = $image3;
        }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory(string $category) {
            $this->category = $category;
    }
}
