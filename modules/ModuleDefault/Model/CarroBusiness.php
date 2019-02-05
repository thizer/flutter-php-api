<?php
namespace ModuleDefault\Model;

use SuitUp\Database\Business\AbstractBusiness;

class CarroBusiness extends AbstractBusiness
{
  /**
   * Reference to gateway file
   * @var Gateway\Carro
   */
  protected $gateway;

  public function list() {
    return $this->gateway->list();
  }
}

