<?php 

class TestAppController extends BaseController
{

  protected $layout = 'testApp';

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
      return Redirect::action('TestAppController@showHomeScreen');
  }

  public function makeSearch()
  {
      $results = array();
      return Redirect::to('results')->with($results); 
  }

  public function showResultsScreen($results = array())
  {
      return View::make('resultsScreen')->with(array('results'=>$results));
  }
}
