<?php
namespace ModuleDefault\Model\Gateway;

use SuitUp\Database\Gateway\AbstractGateway;

class Carro extends AbstractGateway {

  /**
   * Required. Table name and pk's list
   */
  protected $name = 'carro';
  protected $primary = array('pk_carro');

  /**
   * Optional
   * You can define here a column from your table
   * that must to be updated with current timestamp
   * every UPDATE call
   */
  // protected $onUpdate = array('edited' => 'NOW()');

  public function list() {
    
    $query = $this->select("SELECT c.* FROM {$this->name} c")
      ->order('c.nome_carro ASC');

    return $this->db->query($query);
  }
}

