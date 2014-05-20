<?php

/**
 * Class to search for a given string
 */

class Searcher
{

  function __construct($stringToSearch)
  {
    if(!is_string($stringToSearch)){
       throw new \Excpetion('It should be geaven a string');
    }
     $this->stringToSearch = $stringToSearch;
  }

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
