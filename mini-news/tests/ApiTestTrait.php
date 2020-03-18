<?php namespace Tests;

trait ApiTestTrait
{
    private $response;
    public function assertApiResponse(Array $actualData)
    {
        //$this->assertApiCreated();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['data'];

        //$this->assertNotEmpty($responseData['id']);
        $this->assertModelData($actualData, $responseData);
    }

    public function assertDataResponse(Array $actualData)
    {
        $this->assertApiSuccess();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['data'];

        $this->assertModelData($actualData, $responseData);
    }

    public function assertApiSuccess()
    {
        $this->response->assertStatus(200);
        $this->response->assertJson(['success' => true]);
    }

    public function assertApiCreated()
    {
        $this->response->assertStatus(201);
        $this->response->assertJson(['success' => true]);
    }

    public function assertApiDeleted()
    {
        $this->response->assertStatus(404);
        $this->response->assertJson(['status' => true]);
    }

    public function assertModelData(Array $actualData, Array $expectedData)
    {
        foreach ($actualData as $key => $value) {
            if (in_array($key, ['created_at', 'updated_at'])) {
                continue;
            }
            $this->assertEquals($actualData[$key], $expectedData[$key]);
        }
    }
}
