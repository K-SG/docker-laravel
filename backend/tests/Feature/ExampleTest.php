<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

        /**
     * A basic test example.
     *
     * @return void
     */
    public function testAPIGet1Test()
    {
        $response = $this->get('/api/test_get1');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAPIGet2Test()
    {
        $response = $this->get('/api/test_get2?message=aaa');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testModelTest()
    {
        $data = [
            'id' => 1,
            'user_id'=>1,
            'schedule_date'=>'2020-10-11',
            'start_time'=>'12:45:00',
            'end_time'=>'14:00:00',
            'place'=>'1',
            'title'=>'PHP',
            'content'=>'',
            'actual_time'=>75,
            'comment'=>'',
            'delete_flag'=>'0',
        ];
        $response = $this->assertDatabaseHas('schedules',$data);

    }
}
