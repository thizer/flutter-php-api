<?php
namespace ModuleDefault\Controllers;

use SuitUp\Mvc\MvcAbstractController;

class AbstractController extends MvcAbstractController
{
  public function init() {
    parent::init(); // Keep this line
  }

  public function posDispatch() {
    parent::posDispatch(); // Keep this line
  }
}

