<?php

use \PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase{
    

//İkinci konu    
    public function testReturnsFullName(){
        require 'User.php';

        $user = new User;

        $user->first_name = "Teresa";
        $user->last_name = "Green";

        $this->assertEquals("Teresa Green", $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault(){
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

//İlk konu

    // public function testAddReturnsSum(){
        
    //     require 'functions.php';

    //     $this->assertEquals(13, add(5, 8));
    //     $this->assertEquals(4, add(2, 2));
    // }
    // public function testAddDoesNotReturnTheIncorrectSum(){
    //     $this->assertNotEquals(5, add(2,2));
    // }
}