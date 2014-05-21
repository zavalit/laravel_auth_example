<?php 

/**
 * UserController
 *
 * Coordinates user login/register routine
 */

class UserController extends BaseController
{

  /**
   * Instatiates Controller that let all post Requests be csrf secure
   */

  public function __construct()
  {
     $this->beforeFilter('csrf', array('on'=>'post'));
  }
  
  /**
   * Returns Home Screen
   *
   * @return View
   */

  public function showHomeScreen()
  {
      return View::make('homeScreen'); 
  }

  /**
   * Returns Register Screen
   *
   * @return View
   */
 
  public function showRegisterScreen()
  {
      return View::make('registerScreen');
  }

  /**
   * Returns redirect based on whether a registration was successed
   *
   * @return Redirect
   */
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

  /**
   * Returns Login Screen
   *
   * @return View
   */

  public function showLoginScreen()
  {
      return View::make('loginScreen');
  }

  /**
   * Returns Redirect based on whether a user was logged in
   *
   * @return Redirect
   */
  
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

  /**
   * Returns Redirect to home page after logout
   *
   * @return Redirect
   */
  public function logoutUser()
  {
    if(Auth::check()){ 
     Auth::logout();
    }  
    return Redirect::to('login')->with('message', 'Your are successfuly logged out');
  }

}
