<?php 

use Zizaco\FactoryMuff\Facade\FactoryMuff;

/**
 * @covers Searcher
 */

class UserSearchTest extends TestCase
{
     function testFindUserByString()
     {
       // fixtures

       FactoryMuff::create('User', array('name'=>'grandtest', 'email'=>'der@grand.de', 'password'=>Hash::make('password')))->save();
       FactoryMuff::create('User', array('name'=>'grandpa', 'email'=>'dertest@grand.de', 'password'=>Hash::make('password')))->save();
       FactoryMuff::create('User', array('name'=>'testpa', 'email'=>'der@grand.pa', 'password'=>Hash::make('password')));
       FactoryMuff::create('User', array('name'=>'grandpa', 'email'=>'der@grand.pade', 'password'=>Hash::make('password')));
       
       //logic

       $stringToSearch = "test";
       $searcher = new Searcher($stringToSearch);
       $users = $searcher->findUsers();

       $this->assertEquals(count($users), 3, "Amount of users should be equal");

     }
}
