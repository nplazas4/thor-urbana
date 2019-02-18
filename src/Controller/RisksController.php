<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 *
 */
class RisksController extends AppController
{
    /**
     * Index method
     *
     */
    public function index()
  	{
      // $users = $this->paginate($this->Users);
      // $this->set(compact('users'));
      $risks = $this->paginate($this->Risks);
      $this->set('risks',$risks);
      $this->Projects();
  	}
    public function Add(){
      $this->index();
      $risks = $this->Risks->newEntity();
      if ($this->request->is('post')) {
          $risks = $this->Risks->patchEntity($risks, $this->request->getData());
          if ($this->Risks->save($risks)) {
              $this->Flash->success(__('El riesgo ha sido creado.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('El riesgo no ha sido creado. Por favor, intenta de nuevo.'));
      }
      $this->set(compact('risks'));
    }
    public function AddEPS(){
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $risks = $this->Risks->get($id);
        if ($this->Risks->delete($risks)) {
            $this->Flash->success(__('El riesgo ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El riesgo no pudo ser eliminado. Por favor, intente de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function view($id)
    {
        $risks = $this->Risks->get($id);

        $this->set('risks', $risks);
    }
    public function edit($id = null)
    {
        $this->index();
        $risks = $this->Risks->get($id);
        if ($this->request->is(['patch','post','put']))
        {
          $risks = $this->Risks->patchEntity($risks,$this->request->data);
          if ($this->Risks->save($risks))
           {
             $this->Flash->success('El usuario ha sido modificado');
             return $this->redirect(['action'=>'index']);
          }
          else {
            $this->Flash->error('El usuario no pudo ser modificado');
          }
        }
        $this->set(compact('risks'));
    }
    public function Projects(){
      $this->loadModel('Projects');
      $this->set('projects',$this->Projects->find('list', [
      'keyField' => 'id',
      'valueField' => 'PROJECT_NAME'
      ]));
    }
}
