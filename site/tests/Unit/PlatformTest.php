<?php

namespace Tests\Unit;

use App\Models\Platform;
use Carbon\Carbon;
use Tests\TestCase;

class PlatformTest extends TestCase
{
    protected function postData()
    {
        return [
            'name'          => 'Facebook',
            'remainder'     => 550.50,
            'created_at'    => Carbon::now()->format('Y.m.d'),

        ];
    }
    protected function updateData()
    {
        return [
            'name'          => 'Facebook Deneme',
            'remainder'     => 559.50,
            'created_at'    => Carbon::now()->format('Y.m.d'),
        ];
    }
    protected static  $lastId;

    public function test_create_advertisement(): void
{
    $data = $this->postData();
    $response = $this->post('/api/platforms',$data);
    PlatformTest::$lastId = Platform::where('name','Facebook')->orderByDesc('id')->first()['id'];
    $field    = json_decode($response->getContent(),true);
    $this->assertEquals(true,$field['isSuccess']);
    $this->assertEquals(200,$response->getStatusCode());

}
    public function test_update_advertisement(): void
    {
        $data = $this->updateData();
        $response = $this->put('/api/platforms/'.PlatformTest::$lastId,$data);
        $field    = json_decode($response->getContent(),true);
        $this->assertEquals(true,$field['isSuccess']);
        $this->assertEquals(200,$response->getStatusCode());
        $updateData = Platform::find(PlatformTest::$lastId);
        $this->assertEquals($this->updateData()['name'],$updateData['name']);
    }
    public function test_show_advertisement():void
    {
        $response = $this->get('/api/platforms/'.PlatformTest::$lastId);
        $getData  = json_decode($response->getContent(),true);
        $this->assertEquals($this->updateData()['name'],$getData['data']['name']);
        $this->assertEquals($this->updateData()['remainder'],$getData['data']['remainder']);
    }
    public function test_all_advertisement():void
    {
        $response = $this->get('/api/platforms');
        $field    = json_decode($response->getContent(),true);
        $servicesCount = $field['total'];
        $databaseCount = Platform::all()->count();

        $this->assertEquals(true,$field['isSuccess']);
        $this->assertEquals(200,$response->getStatusCode());
        $this->assertEquals($databaseCount,$servicesCount);

    }
    public function test_delete_advertisement():void
    {
        $response = $this->delete('/api/platforms/'.PlatformTest::$lastId);
        $field    = json_decode($response->getContent(),true);
        $this->assertEquals(true,$field['isSuccess']);
        $this->assertEquals(200,$response->getStatusCode());
    }
}
