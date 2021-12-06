<?php
require_once 'FieldValidators/FieldValidator.php';
require_once 'FieldValidators/MinLen.php';
require_once 'FieldValidators/MaxLen.php';
require_once 'FieldValidators/Required.php';

/*
  [
    "name" => "Ivan",
    "fn" => 61834
  ]
*/

class FormValidator {
  private $fieldToValidators = [];

  public function addFieldValidator($fieldName, FieldValidator $fieldValidator) {
    if (!empty($this->fieldToValidators[$fieldName])) {
      $this->fieldToValidators[$fieldName][] = $fieldValidator;
    } else {
      $this->fieldToValidators[$fieldName] = [$fieldValidator];
    }
  }

  public function addFieldValidators($fieldName, $fieldValidators) {
    foreach ($fieldValidators as $validator) {
      $this->addFieldValidator($fieldName, $validator);
    }
  }

  public function validate($data) {
    foreach ($data as $fieldName => $fieldValue) {
      if (!empty($this->fieldToValidators[$fieldName])){
        foreach ($this->fieldToValidators[$fieldName] as $validator) {
          if ($validator->isValid($fieldValue)) {
            echo "$fieldName is valid \n";
          } else {
            echo "$fieldName is NOT valid \n";
          }
        }
      }
    }
  }

}

$formValidator = new FormValidator();

$formValidator->addFieldValidators("name", [
  new Required(),
  new MaxLen(10)
]);

$formValidator->addFieldValidators("lastName", [
  new Required(),
  new MinLen(4)
]);

$formData = [
  "name" => "I",
  "lastName" => "Ivanov"
];

$formValidator->validate($formData);

