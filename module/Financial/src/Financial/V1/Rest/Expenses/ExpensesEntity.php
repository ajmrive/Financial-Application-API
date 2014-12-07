<?php

namespace Financial\V1\Rest\Expenses;

class ExpensesEntity {

  private $id;
  private $description;
  private $amount;

  public function getId() {
    return $this->id;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getAmount() {
    return $this->amount;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function setAmount($amount) {
    $this->amount = $amount;
  }

  public function getArrayCopy() {
    return array(
      'id' => $this->id,
      'description' => $this->description,
      'amount' => $this->amount,
    );
  }

  public function exchangeArray(array $array) {
    $this->id = $array['id'];
    $this->description = $array['description'];
    $this->amount = $array['amount'];
  }

}
