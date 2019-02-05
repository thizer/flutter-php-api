<?php
namespace ModuleDefault\Form\Index;

use SuitUp\FormValidator\AbstractFormValidator;

class Create extends AbstractFormValidator
{

  /**
   * @var array
   */
  protected $data = array(
    'name' => array('validation' => array('notEmpty', 'teste'), 'filter' => array('string')),
  );

  public function teste($value) {
    
    $result = new \SuitUp\FormValidator\FormResult();

    // $result->setError('Nao gostei');

    return $result;
  }
}

