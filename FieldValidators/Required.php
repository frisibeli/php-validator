<?php
require_once 'FieldValidator.php';

class Required implements FieldValidator {
  public function isValid($value) {
    return $value != "" || $value != null;
  }
}

$validator = new Required();

// echo $validator->isValid(null);