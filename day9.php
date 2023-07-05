<?php

//Bai 5
class Student {
    private $studentId;
    private $fullName;

    public function __construct($studentId, $fullName) {
        $this->studentId = $studentId;
        $this->fullName = $fullName;
    }

    public function getStudentId() {
        return $this->studentId;
    }

    public function getFullName() {
        return $this->fullName;
    }
}

$studentId = 1;
$fullName = ("Phạm Mai");
$less5 = new Student($studentId, $fullName);
echo "ID: ". $less5->getStudentId(). "/ Full name: ". $less5->getFullName(). "<br />";

//Bai 6
class Car {
    private $brand;
    private $color;
    private $year;

    public function __construct($brand, $color, $year) {
        $this->brand = $brand;
        $this->color = $color;
        $this->year = $year;
    }

    public function displayInfo() {
        echo "Brand: " . $this->brand . "<br>";
        echo "Color: " . $this->color . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}
$brand = ("Toyota");
$color = ("Red");
$year = 2010;
$less6 = new Car($brand, $color, $year);
echo "Car information is: <br>";
echo $less6->displayInfo();

//Bai 7
class Fraction{
    protected $numerator, $denominator;
    public function __construct($numerator, $denominator){
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }
    public function numerator(){
        return $this->numerator;
    }
    public function denominator(){
        return $this->denominator;
    }
    public function reduce($newNumerator, $newDenominator){
        $gcd = 1;
        if($newNumerator>=$newDenominator) 
            $max = $newNumerator;
        else 
            $max = $newDenominator;
        for($i=1; $i<=$max; $i++)
            if($newNumerator%$i==0 && $newDenominator%$i==0)
                $gcd = $i;
        return $gcd;
    }
    public function showFraction($numerator, $denominator){
        if($denominator == 1)
            return $numerator;
        else if($numerator == 0)
            return 0;
        else return [$numerator,$denominator];
    }
    public function addition(Fraction $fraction){
        $newNumerator = ($this->numerator * $fraction->denominator)+($fraction->numerator * $this->denominator);
        $newDenominator = $this->denominator * $fraction->denominator;
        $gcd = $this->reduce($newNumerator, $newDenominator);
        $newNumerator = $newNumerator/$gcd;
        $newDenominator = $newDenominator/$gcd;
        return $this->showFraction($newNumerator,$newDenominator);
    }
    public function subtraction(Fraction $fraction){
        $newNumerator = ($this->numerator * $fraction->denominator)-($fraction->numerator * $this->denominator);
        $newDenominator = $this->denominator * $fraction->denominator;
        $gcd = $this->reduce($newNumerator, $newDenominator);
        $newNumerator = $newNumerator/$gcd;
        $newDenominator = $newDenominator/$gcd;
        return $this->showFraction($newNumerator,$newDenominator);
    }
    public function multiplication(Fraction $fraction){
        $newNumerator = $this->numerator * $fraction->numerator;
        $newDenominator = $this->denominator * $fraction->denominator;
        $gcd = $this->reduce($newNumerator, $newDenominator);
        $newNumerator = $newNumerator/$gcd;
        $newDenominator = $newDenominator/$gcd;
        return $this->showFraction($newNumerator,$newDenominator);
    }
    public function division(Fraction $fraction){
        $newNumerator = $this->numerator * $fraction->denominator;
        $newDenominator = $this->denominator * $fraction->numerator;
        $gcd = $this->reduce($newNumerator, $newDenominator);
        $newNumerator = $newNumerator/$gcd;
        $newDenominator = $newDenominator/$gcd;
        return $this->showFraction($newNumerator,$newDenominator);
    }
}
echo "<br><br>Bài 7:<br>";
$fraction1 = new Fraction(1,6);
$fraction2 = new Fraction(1,6);
$frac1 = $fraction1->showFraction($fraction1->numerator(),$fraction1->denominator());
if($frac1 === 1 || $frac1 === 0){
    echo "First fraction: " . $frac1;
}
else echo "First fraction: " . $frac1[0] . "/" . $frac1[1];
echo "<br>";
$frac2 = $fraction2->showFraction($fraction2->numerator(),$fraction2->denominator());
if($frac2 === 1 || $frac2 === 0){
    echo "Second fraction: " . $frac2;
}
else echo "Second fraction: " . $frac2[0] . "/" . $frac2[1];
echo "<br>";
$result = $fraction1->addition($fraction2);
if($result === 1 || $result === 0){
    echo "Sum of two fractions: " . $result;
}
else echo "Sum of two fractions: " . $result[0] . "/" . $result[1];
echo "<br>";
$result = $fraction1->subtraction($fraction2);
if($result === 1 || $result === 0){
    echo "Subtraction: " . $result;
}
else echo "Subtraction: " . $result[0] . "/" . $result[1];
echo "<br>";
$result = $fraction1->multiplication($fraction2);
if($result === 1 || $result === 0){
    echo "Multiplication: " . $result;
}
else echo "Multiplication: " . $result[0] . "/" . $result[1];
echo "<br>";
$result = $fraction1->division($fraction2);
if($result === 1 || $result === 0){
    echo "Division: " . $result;
}
else echo "Division: " . $result[0] . "/" . $result[1];


//Bai 8
class Person {
    private $name;
    private $age;
    private $address;

    public function __construct($name, $age, $address) {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    public function displayInfo() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Address: " . $this->address . "<br>";
    }
}
$name = ("Phạm Mai");
$age = 22;
$address = ("Nam Định");
$less8 = new Person($name, $age, $address);
echo "Information is: <br>";
echo $less8->displayInfo();

//Bai 9
class Product {
    private $name;
    private $price;
    private $description;

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function displayInfo() {
        echo "Name: " . $this->name . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Description: " . $this->description . "<br>";
    }
}
$name = ("masffrug");
$price = 7.000;
$description = (" chocolate 20%");
$less9 = new Product($name, $price, $description);
echo "Product information is: <br>";
echo $less9->displayInfo();

//Bai 10
class HotelReservation {
    private $name;
    private $checkInDate;
    private $numberOfNights;

    public function __construct($name, $checkInDate, $numberOfNights) {
        $this->name = $name;
        $this->checkInDate = $checkInDate;
        $this->numberOfNights = $numberOfNights;
    }

    public function calculateTotalAmount($roomPrice) {
        return $roomPrice * $this->numberOfNights;
    }
}
$name = ("Room 302");
$checkInDate = ("2023/07/05");
$numberOfNights = 5;
$less10 = new HotelReservation($name, $checkInDate, $numberOfNights);
echo "Total = ". $less10->calculateTotalAmount(55,000);
?>



