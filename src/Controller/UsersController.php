<?php


namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
// Prior to 3.6 use Cake\Network\Exception\NotFoundException
use Cake\Http\Exception\NotFoundException;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout','edit']);
    }

     public function index()
     {

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'main']);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }

      
    }

    public function login(){
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'main']);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }

    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {   
        $user_login=$this->Auth->user();
       
        if($user_login){ 
            $user = $this->Users->newEntity();
            if ($this->request->is('post')) {

              
                $user = $this->Users->patchEntity($user, $this->request->getData());
            
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('El usuarios se ha guardado correctamente.'));
                    return $this->redirect(['action' => 'main','user_login'=>$user]);
                }
                $this->Flash->error(__('No se ha podido. añadir el usuario'));
            }
            $this->set('user', $user);
        }else{
           return $this->redirect(['action' => 'login']);
        }
    }

    public function main()
    {
        $user=$this->Auth->user();
        $this->set(['users'=>$this->Users->find('all'),'user_login'=>$user]);
      
    }
    public function delete($id)
    {
      
        $this->request->allowMethod(['post', 'delete']);
    
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El Usuario con id: {0} ha sido eliminado.', h($id)));
            return $this->redirect(['action' => 'main']);
        }
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        //if ($this->request->getParam('action') === 'add') {
          //  return true;
        //}
        // The owner of an user admin can edit and delete it
        if (isset($user['role']) && $user['role'] === 'admin' && in_array($this->request->getParam('action'), ['edit', 'delete','change','add'])) {
       
            $userId = (int)$this->request->getParam('pass.0');
            if ($this->Users->isOwnedBy($userId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function edit($id = null)
    {   
     
        $user_login=$this->Auth->user();
       
        if($user_login){ 
            $user = $this->Users->get($id);


            if ($this->request->is(['post', 'put'])) {
                $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('El Usuario ha sido actualizado.'));
                    return $this->redirect(['action' => 'main','user_login'=>$user]);
                }
                $this->Flash->error(__('El Usuario no se ha podido actualizar.'));
            }

            $this->set('user', $user);
        }else{
            return $this->redirect(['action' => 'login']);
        }
    }
    
    public function change($id = null)
    {   
        $user_login=$this->Auth->user();
       
        if($user_login){ 
            
            $user = $this->Users->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('La contraseña ha sido actualizado.'));
                    return $this->redirect(['action' => 'main','user_login'=>$user]);
                }
                $this->Flash->error(__('La contraseña no se ha podido actualizar.'));
            }

            $this->set('user', $user);
        }else{
            return $this->redirect(['action' => 'login']);
        }
    }



    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect(['action' => 'index']);
    }

}

?>