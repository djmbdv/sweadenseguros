<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class LoginController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    } 
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('user');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('user', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['user'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/');
            
            }else{
                $session->setFlashdata('msg', 'Clave incorrecta.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Usuario no existe.');
            return redirect()->to('/login');
        }
    }

    function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}