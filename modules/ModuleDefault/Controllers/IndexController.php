<?php
namespace ModuleDefault\Controllers;

class IndexController extends AbstractController
{
  public function indexAction() {
    
    // Amarro o metodo para GET
    if (getenv('REQUEST_METHOD') != 'GET') {
      return $this->ajax(array('error' => 'Invalid Method'));
    }

    $carroBo = new \ModuleDefault\Model\CarroBusiness();
    $lista = $carroBo->list();

    return $this->ajax($lista);
  }

  public function getItemAction() {

    // Amarro o metodo para GET
    if (getenv('REQUEST_METHOD') != 'GET') {
      return $this->ajax(array('error' => 'Invalid Method'));
    }

    $id = $this->getParam('id', 0);

    $carroBo = new \ModuleDefault\Model\CarroBusiness();
    $item = $carroBo->get($id);

    return $this->ajax($item ? $item : array());
  }

  public function createAction() {

    // Amarro o metodo para POST
    if (getenv('REQUEST_METHOD') != 'POST') {
      return $this->ajax(array('error' => 'Invalid Method'));
    }

    // Instancio o formulário
    $form = new \ModuleDefault\Form\Index\Create();
    $data = $form->getData();

    // Valido o formulario
    if ($form->isValid()) {

      // Insert on db
      $carroBo = new \ModuleDefault\Model\CarroBusiness();
      $newId = $carroBo->insert(array(
        'nome_carro' => $data['name']
      ));

      return $this->ajax(array('id' => $newId));
    }

    // Caso for invalido
    return $this->ajax(array('errors' => $form->getMessages()));
  }

  public function updateAction() {

    // Amarro o metodo para PUT
    if (getenv('REQUEST_METHOD') != 'PUT') {
      return $this->ajax(array('error' => 'Invalid Method'));
    }

    // Instancio o formulário
    $form = new \ModuleDefault\Form\Index\Update();
    $form->post = $this->getParams();

    $data = $form->getData();

    // Valido o formulario
    if ($form->isValid()) {

      // Update on db
      $carroBo = new \ModuleDefault\Model\CarroBusiness();
      $rows = $carroBo->update(
        array('nome_carro' => $data['name']),
        array('pk_carro' => $data['id'])
      );

      return $this->ajax(array('rows' => $rows));
    }

    // Caso for invalido
    return $this->ajax(array('errors' => $form->getMessages()));
  }

  public function deleteAction() {

    // Amarro o metodo para DELETE
    if (getenv('REQUEST_METHOD') != 'DELETE') {
      return $this->ajax(array('error' => 'Invalid Method'));
    }

    $form = new \ModuleDefault\Form\Index\Delete();
    $form->post = $this->getParams();

    $data = $form->getData();

    // Valido o formulario
    if ($form->isValid()) {

      // Update on db
      $carroBo = new \ModuleDefault\Model\CarroBusiness();
      $result = $carroBo->delete(array('pk_carro' => $data['id']));

      return $this->ajax(array('result' => $result));
    }
    
    // Caso for invalido
    return $this->ajax(array('errors' => $form->getMessages()));
  }
}

