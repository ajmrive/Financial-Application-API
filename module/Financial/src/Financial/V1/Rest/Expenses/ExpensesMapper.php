<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Financial\V1\Rest\Expenses;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;

/**
 * Description of ExpensesMapper
 *
 * @author Antonio
 */
class ExpensesMapper {

  const dbName = 'expenses';

  protected $adapter;

  public function __construct(AdapterInterface $adapter) {
    $this->adapter = $adapter;
  }

  public function create($data) {

    //if (!isset($data->description) || !isset($data->amount)) {
    if (!isset($data->description) || !isset($data->amount) || empty($data->description) || !is_numeric($data->amount)) {
      return http_response_code(400);
    }
 
    $description = $data->description;
    $amount = $data->amount;

    $sql = "INSERT INTO ".self::dbName." (description,amount) VALUES (:description,:amount)";
    $q = $this->adapter->query($sql,array(
          ':description' => $description,
          ':amount' => $amount));
  }

  public function fetchAll() {
    $select = new Select(self::dbName);
    $paginatorAdapter = new DbSelect($select, $this->adapter);
    $collection = new ExpensesCollection($paginatorAdapter);
    return $collection;
  }

  public function fetchOne($expenseId) {
    $sql = 'SELECT * FROM '.self::dbName.' WHERE id = ?';
    $resultset = $this->adapter->query($sql, array($expenseId));
    $data = $resultset->toArray();
    if (!$data) {
      return false;
    }

    $entity = new ExpensesEntity();
    $entity->exchangeArray($data[0]);
    return $entity;
  }

}
