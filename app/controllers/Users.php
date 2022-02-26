<?php
class Users extends Controller{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register(){
        $this->view('users/register');  
    }

    public function registerSubmit(){
        $errors = [];
        $data = [];

        if (empty($_POST['name'])) {
            $errors['name'] = 'Name is required.';
        }        
        //validate email
        if(empty($_POST['email'])){
            $errors['email'] = 'Email is required.';
        }else{
            //check for email
            if($this->userModel->findUserByEmail($_POST['email'])){
                $errors['email'] = 'Email already exist';
            }
        }       
       
        //validate password 
        if(empty($_POST['password'])){
            $errors['password'] = 'Password is required.';
        }elseif(strlen($_POST['password']) < 6){
            $errors['password'] = 'Password must be at least six characters';
        }
        //validate confirm password
        if(empty($_POST['confirm_password'])){
            $errors['confirm_password'] = 'Confirm Password is required.';
        }else{
            if($_POST['password'] != $_POST['confirm_password'])
            {
                $errors['confirm_password'] = 'Password does not match';
            }
        }       
        
        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors']  = $errors;
        } else {
            $data = [
                'name'             => trim($_POST['name']),
                'email'            => trim($_POST['email']),
                'password'         => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
            ];
            
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if($this->userModel->register($data)){
                $data['success'] = true;
                $data['message'] = 'Success! you are registerd you can login now.';
            }else{
                $data['success'] = false;
                $data['message'] = 'Error! Something went wrong.';
            }
        }
        echo json_encode($data);
    }

    

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           // process form
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
           $data = [
               'email' => trim($_POST['email']),
               'password' => trim($_POST['password']),
               'email_err' => '',
               'password_err' => ''
           ];

            //validate email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    //user found
                }else{
                    $data['email_err'] = 'User not found';
                }
            }

            //validate password 
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be atleast six characters';
            }
            
            //make sure error are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if($loggedInUser){
                    //create session
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            }else{
                $this->view('users/login', $data);
            }

        }else{
            //init data f f
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            //load view
            $this->view('users/login', $data);          
        }
    }

    //setting user section variable
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;
        redirect('reports/index');
    }

    //logout and destroy user session
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        session_destroy();
        redirect('users/login');
    }
}