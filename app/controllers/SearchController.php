<?php 

class SearchController extends BaseController
{

  public function makeSearch()
  {
     if(!Auth::check()){
         return Redirect::to('login')->with('message', 'You should be logged in to be able to search');
     }

     $stringToSearch = Input::get('string_to_search');
   
     $searcher = new Searcher($stringToSearch);
     $results = $searcher->getResults();
   
     return Redirect::to('results')->withResults($results); 
  }

  public function showResultsScreen($results = array())
  {
     return View::make('resultsScreen')->with(array('results'=>$results));
  }

}
