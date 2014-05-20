<?php 

use Zizaco\FactoryMuff\Facade\FactoryMuff;

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
    $user = FactoryMuff::create('User', array('name'=>'grandpa', 'email'=>'der@grand.pa', 'password'=>Hash::make('password')));
    Auth::attempt(array('email'=>'der@grand.pa', 'password'=>'password'));
    $this->client->request('POST', '/make_search', array('string_to_search'=>'test'));
    $this->assertRedirectedTo('results');
  }

}
