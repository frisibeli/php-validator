<?php
require_once 'FieldValidator.php';

class MaxLen implements FieldValidator {
  private $max = 0;

  public function __construct($max) {
    $this->max = $max;
  }

  public function isValid($value) {
    return strlen($value) <= $this->ax;
  }

}

$validator = new MaxLen(10);

// echo $validator->isValid("dsfhds");