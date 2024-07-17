<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('profile');
    }

    public function doUpdateProfile()
    {

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, show errors and return to edit form
            return redirect()->to('profile')->withInput()->with('validation', $validation);
        }

        $id = session()->get('user_id');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        
        $User = new \App\Models\User();
        
        $User->save([
            'id' => $id,
            'name' => $name,
            'email' => $email,
        ]);

        $session = session();
        $userData = [
            'name' =>$name,
            'email' => $email,
        ];
        $session->set($userData);

        return redirect()->to('profile')->with('success', 'Personal Information update successful.');
        
    }

    public function doUpdatePassword()
    {
        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'password' => 'required|min_length[8]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, show errors and return to edit form
            return redirect()->to('profile')->withInput()->with('validation', $validation);
        }

        $id = session()->get('user_id');
        $password = $this->request->getPost('password');

        $user = new \App\Models\User();
        $userData = [
            'id' => $id,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $user->save($userData);

        return redirect()->to('profile')->with('success', 'Password change successful.');
    }

    public function doUpdatePicture()
    {
        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'picture' => 'uploaded[picture]|max_size[picture,1024]|is_image[picture]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, show errors and return to edit form
            return redirect()->to('profile')->withInput()->with('validation', $validation);
        }

        $id = session()->get('user_id');
        $picture = $this->request->getFile('picture');
        
        // Handle file upload
        $newName = $picture->getRandomName();
        $picture->move('uploads/profile', $newName);

        $User = new \App\Models\User();
        
        $User->save([
            'id' => $id,
            'picture' => $newName,
        ]);

        $session = session();
        $userData = [
            'picture' =>$newName,
        ];
        $session->set($userData);

        return redirect()->to('profile');
    }
}
