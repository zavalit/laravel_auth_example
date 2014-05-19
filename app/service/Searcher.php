<?php 

class Searcher 
{
  private $dataForSearch = array('test', 'test2', 'test3');
  private $stringToSearch;
 
  function __construct((string) $stringToSearch)
  {
     $this->stringToSearch = $stringToSearch;
  }

  function getResults()
  {
    $results = array();
    foreach($this->dataForSearch as $row)
    {
       preg_match();
    
    }
  
  }


}
