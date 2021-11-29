<?php
require 'FieldValidator.php';

class MaxLen implements FieldValidator {
  private $max = 0;

  public function __construct($max) {
    $this->max = $max;
  }

  public function isValid($value) {
    return strlen($value) <= $this->max;
  }
}

$validator = new MaxLen(10);

echo $validator->isValid("dsfhds");