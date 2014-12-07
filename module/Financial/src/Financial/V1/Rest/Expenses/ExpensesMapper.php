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

  public function fetchAll() {
    $select = new Select('expenses');
    $paginatorAdapter = new DbSelect($select, $this->adapter);
    $collection = new ExpensesCollection($paginatorAdapter);
    return $collection;
    return array();
  }

  public function fetchOne($albumId) {
    $sql = 'SELECT * FROM expenses WHERE id = ?';
    $resultset = $this->adapter->query($sql, array($albumId));
    $data = $resultset->toArray();
    if (!$data) {
      return false;
    }
    
    $entity = new ExpensesEntity();
    $entity->exchangeArray($data[0]);
    return $entity;
  }

}
