<?php
namespace Tests\Unit;

use App\Http\Controllers\ContactController;
use App\Models\ContactForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        $this->contactController = new ContactController();
        parent::setUp();

    }
    public function test_contact_route_accessable()
    {
        //checking contact route
        $response = $this->get('contact');
        $response->assertStatus(200);
    }

    public function test_check_user_can_submit_data_and_redirect_to_home()
    {
        //post request to contact form
        $response = $this->from(route('contact'))->post(route('contact.store'),[
            'firstname' => 'Sarkar',
            'lastname' => 'Ripon',
            'country' => 'USA',
            'comment' => 'There is no comment'
        ]);
        // checking if data inserted to database or not
        $this->assertDatabaseHas('contact_forms',[
            'fname'=>'Sarkar'
        ]);
        //checking if redirect to home page
        $response->assertRedirect(route('home'));

    }
//
    public function test_user_can_see_data_list()
    {
       $this->from(route('contact'))->post(route('contact.store'),[
            'firstname' => 'Sarkar',
            'lastname' => 'Ripon',
            'country' => 'USA',
            'comment' => 'There is no comment'
        ]);
        $list= $this->contactController->extractlistData();
        $this->assertIsObject($list);
        $this->assertCount(1,$list);

    }
//
    public function test_user_can_update_data()
    {
        $this->from(route('contact'))->post(route('contact.store'),[
            'firstname' => 'Sarkar',
            'lastname' => 'Ripon',
            'country' => 'USA',
            'comment' => 'There is no comment'
        ]);


        $updateData= DB::table('contact_forms')->first();


        try{
            $this->post(route('contact.update',$updateData->id),[
            'firstname' => 'Masiur',
            'lastname' => 'Siddiki',
            'country' => 'USA',
            'comment' => 'This is updated comment'
            ]);

        }catch (\Exception $e){
            echo $e;
        }


        $this->assertDatabaseHas('contact_forms',[
            'fname'=>'Masiur'
        ]);
    }

    public function test_user_can_destroy_data()
    {
        $this->from(route('contact'))->post(route('contact.store'), [
            'firstname' => 'Sarkar',
            'lastname' => 'Ripon',
            'country' => 'USA',
            'comment' => 'There is no comment'
        ]);

        $Data = DB::table('contact_forms')->first();

        $this->delete(route('contact.delete'),[
            'id'=>$Data->id,
            ]);

        $this->assertDatabaseMissing('contact_forms',[
            'fname'=>'Sarkar'
        ]);


    }
        public function tearDown():void
    {
        unset($this->contactController);
    }


}

// valiation f
// exception


