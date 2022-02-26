<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function contact(){
      $data = [
        'title'       => 'DevMVC',
        'description' => 'Simple MVC framework made by Azharul Islam',
        'info'        => 'You can contact me with the following details below at your convenience',
        'name'        => 'Md. Azharul Islam',
        'location'    => 'Farmgate, Dhaka',
        'contact'     => '+880 1521470368',
        'mail'        => 'azharul.ece13.hstu@gmail.com',
        'portfolio'   => 'http://developerazad.com'
      ];     
      $this->view('pages/contact', $data);
    }

    
  }