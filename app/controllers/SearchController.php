<?php

/**
 * Coordinates searching routine
 */

class SearchController extends BaseController
{
   /**
     * Makes redirect based on Auth state.
     *
     * @return Redirect
    */

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

   /**
     * Returns search results stored in a Session.
     *
     * @return View
    */
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
