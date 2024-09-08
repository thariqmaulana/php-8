<?php

class Product 
{
  public string $id;
  public string $name;
  public int $price;

  public function __construct(string $id, string $name, int $price)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
  }
}

// tambahkan visibility saja


class Product2
{
  public function __construct(public string $id,
                              public string $name,
                              public int $price = 0)
  {
  }
}

$product = new Product2("1", "laptop");
var_dump($product);
echo "$product->name";

