<?php

namespace App\Tests\Rest;

use TestTools\TestCase\UnitTestCase;
use Symfony\Component\HttpFoundation\Request;

class UsersControllerTest extends UnitTestCase
{
    /**
     * @var \App\Rest\UsersController
     */
    protected $controller;

    public function setUp()
    {
        $this->controller = $this->get('controller.rest.users');
    }

    public function testCgetAction()
    {
        $result = $this->controller->cgetAction();

        $expected = array(
            0 =>
                array(
                    'user_id' => '1',
                    'email' => 'admin@example.com',
                    'password_reset_token' => '',
                    'firstname' => 'Admin',
                    'lastname' => 'Silex',
                    'admin' => true,
                    'created' => NULL,
                    'updated' => NULL,
                ),
            1 =>
                array(
                    'user_id' => '2',
                    'email' => 'user@example.com',
                    'password_reset_token' => '',
                    'firstname' => 'User',
                    'lastname' => 'Silex',
                    'admin' => false,
                    'created' => '2014-08-04 06:51:35',
                    'updated' => '2014-08-04 06:51:35',
                ),
        );

        $this->assertEquals($expected, $result);
    }

    public function testGetAction()
    {
        $result = $this->controller->getAction(1);

        $expected = array(
            'user_id' => '1',
            'email' => 'admin@example.com',
            'password_reset_token' => '',
            'firstname' => 'Admin',
            'lastname' => 'Silex',
            'admin' => '1',
            'created' => NULL,
            'updated' => NULL,
        );

        $this->assertEquals($expected, $result);
    }

    public function testDeleteAction()
    {
        $this->assertNull($this->controller->deleteAction(2));
    }
}