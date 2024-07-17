<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $validation = \Config\Services::validation();

        // Validate inputs based on the 'login' rules in Config\Validation.php
        if (!$this->validate($validation->getRuleGroup('login'))) {
            // If validation fails, return to the login form with errors
            return view('auth/login', [
                'validation' => $validation
            ]);
        }

        // Retrieve validated data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Example: Validate user credentials (you need to implement your own logic here)
        $User = new \App\Models\User();
        $user = $User->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            // Invalid credentials
            return view('auth/login', [
                'validation' => $validation,
                'error' => 'Invalid email or password.'
            ]);
        }

        // Example: Set session variables upon successful login
        $session = session();
        $userData = [
            'user_id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'picture' => $user['picture'],
            'isLoggedIn' => true
        ];
        $session->set($userData);

        // Redirect to dashboard or any other authenticated page
        return redirect()->to('/dashboard');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function doRegister()
    {
        $validation = \Config\Services::validation();

        // Validate inputs based on the 'register' rules in Config\Validation.php
        if (!$this->validate($validation->getRuleGroup('register'))) {
            // If validation fails, return to the registration form with errors
            return view('auth/register', [
                'validation' => $validation
            ]);
        }

        // Process valid registration here (e.g., save to database)
        // You can access validated data using $this->request->getPost()
        // Example:
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $picture = $this->request->getFile('picture');

         // Handle file upload
         $newName = $picture->getRandomName();
         $picture->move('uploads/profile', $newName);

        // Example: Save to database (you need to have a 'users' table)
        $user = new \App\Models\User();
        $userData = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            // Save picture to server and store its path in database
            'picture' => $newName
        ];
        $user->save($userData);

        // Redirect to a success page or login page
        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        // Clear all session data
        session()->destroy();

        // Optionally, redirect to login page or another page
        return redirect()->to('login');
    }

}
