<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PropertiesTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Artisan::call('migrate');
        Artisan::call('db:seed', ['--class' => 'TestSeeder']);
    }

    private const url ="http://127.0.0.1:8000/api/";




    public function test_get_all_Property(): void
    {
        $response = $this->get(self::url."properties");
        $response->assertStatus(200);
        $response = $response->json();
        $this->assertTrue(count($response["data"]) == 3); ;
    }


    public function test_get_user_by_id(): void
    {
        $exist_id = 1;
        $notExistId = 44;

        # test getting not exists id
        $response = $this->get(self::url."properties/$exist_id");
        $response->assertStatus(200);
        $response->json();

        # test getting not exists id
        $response = $this->get(self::url."properties/$notExistId");
        $response->assertStatus(422);
        $response->json();
    }
    public function test_delete_Property(): void
    {
        $exist_id = 1;
        $notExistId = 44;

        # test deleting not exists id
        $response = $this->delete(self::url."properties/delete/$notExistId");
        $response->assertStatus(422);
        $response->json();

        # test deleting exists id
        $response = $this->delete(self::url."properties/delete/$exist_id");
        $response->assertStatus(200);
        $response->json();

        # check if it has deleted successfully
        $response = $this->delete(self::url."properties/delete/$exist_id");
        $response->assertStatus(422);
        $response->json();
    }
    public function test_adding_new_user_Property(): void
    {
        $data = [
            "title" => "turki",
            "address" => "heere",
            "price" => 1221,
            "bedrooms" => 100,
            "bathrooms" => 100,
            "type" => "loft",
            "status" => "available",
        ];

        # test of one of the attributes missed
        foreach ($data as $key => $value){
            $currentData = $data;
            unset($currentData[$key]);
            $response = $this->post(self::url."properties/create",$currentData);
            if($key == "bedrooms" || $key == "bathrooms")
                $response->assertStatus(200);
            else
                $response->assertStatus(422);
        }
        $response = $this->post(self::url."properties/create",$data);
        $response->assertStatus(200);
        $response->json();

    }

    public function test_update_Property(): void
    {
        $data = [
            "price" => 122221,
        ];


        $response = $this->patch(self::url."properties/update/1",$data);
        $response->assertStatus(200);
        $response->json();
        $response = $this->get(self::url."properties/1");
        $response->assertStatus(200);
        $response->json();
        $this->assertTrue($response["data"]["price"] == $data["price"]);

    }

}
