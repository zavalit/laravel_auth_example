<?php 

class UserController extends BaseController
{

  public function __construct()
  {
     $this->beforeFilter('csrf', array('on'=>'post'));
  }

  public function showHomeScreen()
  {
      return View::make('homeScreen'); 
  }

  public function showRegisterScreen()
  {
      return View::make('registerScreen');
  }

  public function registerUser()
  {
    $validator = Validator::make(Input::all(), User::$rules);
   
    if($validator->passes()){

      $user = new User();
      $user->name = Input::get('name');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));
      $user->save();

    
      return Redirect::to('')->withMessage('User registered!');
    
    }else{

      return Redirect::to('register')->withErrors($validator)->withInput(); 
    
    }
  }

  public function showLoginScreen()
  {
      return View::make('loginScreen');
  }

  public function loginUser()
  {
    $validator = Validator::make(Input::all(), array(
      'email'=>'required|email',
      'password'=>'required',
    ));

      if($validator->passes()){

        if(Auth::attempt(
          array('email'=>Input::get('email'), 
                'password'=>Input::get('password')))
        ) {
                
        return Redirect::to('');
                
        }

        return Redirect::to('login')->with('message', 'Your username/password combination was incorrect');
       
      
      }else{
         
       return Redirect::to('login')->withErrors($validator);
         
      }


  }

  public function logoutUser()
  {
      Auth::logout();
      return Redirect::to('login')->with('message', 'Your are successfuly logged out');
  }

}
