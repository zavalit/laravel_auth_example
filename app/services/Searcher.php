<?php

/**
 * Searcher
 *
 * Class to search for a given string
 */

class Searcher
{

  /**
   *  Instatiates the Searcher with a certain search string 
   */
  function __construct($stringToSearch)
  {
    if(!is_string($stringToSearch)){
       throw new \Excpetion('It should be geaven a string');
    }
     $this->stringToSearch = $stringToSearch;
  }

  /**
   * Returns the users that have similarities with a search string 
   *
   * @return array 
   */
  function findUsers()
  {
    $likeToken = sprintf('%s', $this->stringToSearch);
    $users = DB::table('users')
      ->where('name', 'like', '%'.$likeToken.'%')
      ->orWhere('email', 'like', '%'.$likeToken.'%')
      ->get();

    return $users;

  }

}
