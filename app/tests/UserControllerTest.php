<?php 

use Zizaco\FactoryMuff\Facade\FactoryMuff;

/**
 * @covers UserController
 */

class UserControllerTest extends TestCase 
{

  /**
   * @dataProvider getGetRequests
   */

  function testGetRequest($url)
  {
    $this->client->request('GET', sprintf('/%s', $url)); 
    $this->assertTrue($this->client->getResponse()->isOk());
  }

  function getGetRequests()
  {
    return array(
      array(''), 
      array('login'),
      array('register'),
      array('results'),
    );
  }

  /**
   * @dataProvider getPostRedirectPathes
   */

  function testPostRedirects($from, $to, $data = array())
  {
    $this->client->request('POST', sprintf('/%s', $from), $data);
    $this->assertRedirectedTo($to); 
  }

  function getPostRedirectPathes()
  {

    return array(
      array('make_search', 'login'),
      array('register_user', '', array('name'=>'test', 'email'=>'test@test.de', 'password'=>'123456q', 'password_confirmation'=>'123456q')),
      array('register_user', 'register', array('name'=>'test')),
      array('register_user', 'register', array('name'=>'t', 'email'=>'test@test.de', 'password'=>'123456q', 'password_confirmation'=>'123456q')),
      array('register_user', 'register', array('name'=>'test', 'email'=>'testest.de', 'password'=>'123456q', 'password_confirmation'=>'123456q')),
      array('register_user', 'register', array('name'=>'test', 'email'=>'test@est.de', 'password'=>'123456', 'password_confirmation'=>'123456q')),
      array('register_user', 'register', array()),
      array('login_user', 'login', array('email'=>'testtest.de')),

    );
  
  }

  /**
   * @covers logoutUser
   */

  function testLogout()
  {
     $this->client->request('GET', 'logout');
     
     $this->assertRedirectedTo('login');
     $this->assertFalse(Auth::check());
  
  }

  /**
   * @covers loginUser
   */
  function testLogin()
  {
    FactoryMuff::create('User', array('name'=>'grandma', 'email'=>'der@grand.ma', 'password'=>Hash::make('password')));
    $this->client->request('POST', '/login_user', array('email'=>'der@grand.ma', 'password'=>'password'));
    $this->assertRedirectedTo('');
    $this->assertTrue(Auth::check());  
  }

}
