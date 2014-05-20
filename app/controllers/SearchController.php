<?php 

class SearchController extends BaseController
{

  public function makeSearch()
  {
     if(!Auth::check()){
         return Redirect::to('login')->with('message', 'You should be logged in to be able to search');
     }
     // search routine
     $stringToSearch = Input::get('string_to_search');
     $searcher = new Searcher($stringToSearch);
     $users = $searcher->findUsers();
     Session::put('users', $users);
     return Redirect::to('results'); 
  }

  public function showResultsScreen()
  {
    $users = array();
    if(Session::has('users')){
      $users = Session::get('users');
      Session::forget('users');
    } 
    
    return View::make('resultsScreen')->with('results', $users);
  }

}
