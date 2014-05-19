<?php 

/**
 * @covers SearchController
 */

class SearchControllerTest extends TestCase
{

  function testUnauthSearchGetLoginView()
  {
    $this->client->request('POST', '/make_search', array('string_to_search'=>'test'));
    $this->assertRedirectedTo('login'); 
  }

  function testAuthSearchGetResult()
  {
    Auth::attempt(array('email'=>'test@test.de', 'password'=>'123456q'));
    $this->client->request('POST', '/make_search', array('string_to_search'=>'test'));
    $this->assertRedirectedTo('results');
  }

}
