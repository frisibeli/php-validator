<?php
require_once 'FieldValidator.php';

class MinLen implements FieldValidator {
  private $min = 0;

  public function __construct($min) {
    $this->min = $min;
  }

  public function isValid($value) {
    return strlen($value) >= $this->min;
  }
}

// $validator = new MinLen(10);

// echo $validator->isValid("dsfhds");
