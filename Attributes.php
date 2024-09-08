<?php

// #Validation Framework

// attribut adalah fitur lain selain class, trait, interface

// attribut target
#[Attribute(Attribute::TARGET_PROPERTY)]// aku hanya ingin menggunakannya di properti, kalau di fn tidak bisa
class NotBlank
{

}

#[Attribute(Attribute::TARGET_PROPERTY)]
class Length
{
  public int $min;
  public int $max;

  public function __construct(int $min, int $max) {
    $this->min = $min;
    $this->max = $max;
  }
}

// improve LoginRequest di PHP OOP
// sebelumnya kan di cek if apakah sudah di set atau apakah null
// sekarang improvement menggunakan attribute

class LoginRequest
{
  #[NotBlank]
  #[Length(min: 4, max: 8)]
  public ?string $username;

  #[NotBlank]
  #[Length(min: 4, max: 8)]// tidak ditulis nama param tidak mengapa, langsung 4,8
  public ?string $password;

  // andaikata ada properti ke-3 yg tidak diberi notblank. maka tidak akan ikut di validasi
  // jadi dia berfungsi sebagai metadata dan penanda
}

function validate(object $object): void
{
  $class = new ReflectionClass($object);
  var_dump($class);
  $properties = $class->getProperties();
  foreach ($properties as $property) {
    validateNotBlank($property, $object);
    validateLength($property, $object);
  }
}

function validateNotBlank(ReflectionProperty $property, object $object): void
{
  // attribut apa yg ingin diambil? Yaitu atribut yg diberi attribut Notblank
  // yaitu username dan password
  // jadi seperti penanda yg memudahkan mengambil data  attrbut ini
  // jadi disini kasusnya cuman buat cek apakah blank atau tidak 2 properti user dan pass
  // 2 properti ini tidak boleh blank. lalu dilakukan pengecekan blank atau tidak
  // ddengan if seperti di php oop
  // andai ada 4 properti. user dan pass tidaka boleh blank
  // address dan age boleh blank. kita hanya beri attribut ke user dan pass
  // agar hanya 2 data itu yang diambil lalu kita simpan di attributes
  $attributes = $property->getAttributes(NotBlank::class);// return semua properti yg diberi notblank. + sebenarnya 1 properti saja karena kan iterasi di validate
  var_dump($attributes);//return 1 data saja karena dia kan diiterasi di validate
  // jadi properti ini kan isinya masih global semua properti yg ada di obj
  // PENTING : kita saring lagi menjadi properti yg not blank saja
  if (count($attributes) > 0) { //apakah perlu di count?? jika tidak?? bukankah hanya akan terpanggil jika di trigger
    // perlu apabila aada atribut yang tidak dilabeli notblank. jadi kita bikin
    // lebih dari 1 validator . dan notblank akan diskip apabila count 0
    if (!$property->isInitialized($object)) {
      throw new Exception("$property->name is not set !!!");
    }
    if ($property->getValue($object) == null) {
      throw new Exception("$property->name is null");
    }
  }
}

function validateLength(ReflectionProperty $property, object $object): void
{
  if (!$property->isInitialized($object) || $property->getValue($object) == null) {
    return;//tidak perlu dilanjutkan karena validasi ini sudah selesai di notblank
  }

  $value = $property->getValue($object);
  $attributes = $property->getAttributes(Length::class);
  // kalau mau bisa di validasi menggunakan count dulu
  // baru ambil valuenya
  foreach ($attributes as $attribute) {
    // attribut = reflection attribute. bisa bikin obj dari atribut
    // jadi bisa buat obj dari class si atributtes yaitu length. dengan min 4 max 10
    $length = $attribute->newInstance();
    if (strlen($value) < $length->min) {
      throw new Exception("$property->name is too short");
    }
    if (strlen($value) > $length->max) {
      throw new Exception("$property->name is too long");
    }
  }

}

$request = new LoginRequest();
$request->username = "null`";
$request->password = "null";
validate($request);

// bisa dipahami. fitur yang sangat berguna