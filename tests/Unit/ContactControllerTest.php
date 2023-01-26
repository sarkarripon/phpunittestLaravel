<?php
//
//use App\Http\Controllers\ContactController;
//use App\Http\Controllers\HttpClient;
//use Tests\TestCase;
//
//class ContactControllerTest extends TestCase
//{
//    private $contactController;
//    private $httpclient;
//
//    protected function setUp(): void
//    {
//        $this->contactController = new ContactController();
//        $this->httpclient = new HttpClient();
//        parent::setUp();
//
//    }
//
//    public function test_store_function()
//    {
//
//        $url = 'http://example.com:8000/contact/store';
//        $requested_arr = [
//            'firstname' => 'Sarkar',
//            'lastname' => 'Ripon',
//            'country' => 'mail@email.com',
//            'comment' => 'There is no comment',
//
//        ];
//        $response = $this->httpclient->post($url,$requested_arr);
//
//        $this->assertTrue(true,$response['content']);
//
//    }

// // view data test
// $this->assertViewHas('clients', array('1' => 'Client 1', '6' => 'Client2'));
//
//    public function test_listData_function()
//    {
//        $list= $this->contactController->listData();
//        $this->assertIsArray($list);
//        $this->assertCount(1,$list);
//        $this->assertContains('sarkar',$list[0]);
//
//    }
//
//    public function test_update_function()
//    {
//        $url = 'http://example.com:8000/contact/update/';
//        $requested_arr = [
//            'firstname' => 'Ripon',
//            'lastname' => 'Sarkar',
//            'country' => 'email@mail.com',
//            'comment' => 'There is an update comment',
//
//        ];
//        $response = $this->httpclient->post($url,$requested_arr);
//
//        $this->assertTrue(true,$response['content']);
//
//    }
//
//    public function test_destroy_function()
//    {
//       $destroyed= $this->contactController->destroy();
//       $this->assertTrue(true,$destroyed);
//    }
//
//}
