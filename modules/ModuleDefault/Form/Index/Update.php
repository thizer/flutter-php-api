<?php
namespace ModuleDefault\Form\Index;

use SuitUp\FormValidator\AbstractFormValidator;

class Update extends AbstractFormValidator
{

  /**
   * @var array
   */
  protected $data = array(
    'id' => array('validation' => array('notEmpty'), 'filter' => array('digits')),
    'name' => array('validation' => array('notEmpty'), 'filter' => array('string')),
  );
}

