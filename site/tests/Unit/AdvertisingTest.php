<?php

namespace Tests\Unit;


use App\Models\Advertising;
use Carbon\Carbon;
use Tests\TestCase;;

class AdvertisingTest extends TestCase
{
    protected function postData()
    {
        return [
            'name'          => 'Test Reklamı',
            'description'   => 'Test reklam içeriği',
            'start_date'    => Carbon::now()->format('Y.m.d'),
            'end_date'      => Carbon::now()->addWeek(1)->format('Y.m.d'),
            'created_at'    => Carbon::now()->format('Y.m.d')
        ];
    }
    protected function updateData()
    {
        return [
            'name'          => 'Test Reklamı 1',
            'description'   => 'Test reklam içeriği',
            'start_date'    => Carbon::now()->format('Y.m.d'),
            'end_date'      => Carbon::now()->addWeek(1)->format('Y.m.d'),
            'created_at'    => Carbon::now()->format('Y.m.d')
        ];
    }
    protected static  $lastId;

    /**
     * A basic unit test example.
     */
    public function test_create_advertisement(): void
    {
        $data = $this->postData();
        $response = $this->post('/api/advertisements',$data);
        AdvertisingTest::$lastId = Advertising::where('name','Test Reklamı')->orderByDesc('id')->first()['id'];
        $field    = json_decode($response->getContent(),true);
        $this->assertEquals(true,$field['isSuccess']);
        $this->assertEquals(200,$response->getStatusCode());

    }
    public function test_update_advertisement(): void
    {
        $data = $this->updateData();
        $response = $this->put('/api/advertisements/'.AdvertisingTest::$lastId,$data);
        $field    = json_decode($response->getContent(),true);
        $this->assertEquals(true,$field['isSuccess']);
        $this->assertEquals(200,$response->getStatusCode());
        $updateData = Advertising::find(AdvertisingTest::$lastId);
        $this->assertEquals($this->updateData()['name'],$updateData['name']);
    }
    public function test_show_advertisement():void
    {
        $response = $this->get('/api/advertisements/'.AdvertisingTest::$lastId);
        $getData  = json_decode($response->getContent(),true);
        $this->assertEquals($this->updateData()['name'],$getData['data']['name']);
        $this->assertEquals($this->updateData()['description'],$getData['data']['description']);
    }
    public function test_all_advertisement():void
    {
        $response = $this->get('/api/advertisements');
        $field    = json_decode($response->getContent(),true);
        $servicesCount = $field['total'];
        $databaseCount = Advertising::all()->count();

        $this->assertEquals(true,$field['isSuccess']);
        $this->assertEquals(200,$response->getStatusCode());
        $this->assertEquals($databaseCount,$servicesCount);

    }
    public function test_delete_advertisement():void
    {
        $response = $this->delete('/api/advertisements/'.AdvertisingTest::$lastId);
        $field    = json_decode($response->getContent(),true);
        $this->assertEquals(true,$field['isSuccess']);
        $this->assertEquals(200,$response->getStatusCode());
    }

}
