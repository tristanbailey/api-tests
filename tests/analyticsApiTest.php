<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class analyticsApiTest extends TestCase
{
    use MakeanalyticsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateanalytics()
    {
        $analytics = $this->fakeanalyticsData();
        $this->json('POST', '/api/v1/analytics', $analytics);

        $this->assertApiResponse($analytics);
    }

    /**
     * @test
     */
    public function testReadanalytics()
    {
        $analytics = $this->makeanalytics();
        $this->json('GET', '/api/v1/analytics/'.$analytics->id);

        $this->assertApiResponse($analytics->toArray());
    }

    /**
     * @test
     */
    public function testUpdateanalytics()
    {
        $analytics = $this->makeanalytics();
        $editedanalytics = $this->fakeanalyticsData();

        $this->json('PUT', '/api/v1/analytics/'.$analytics->id, $editedanalytics);

        $this->assertApiResponse($editedanalytics);
    }

    /**
     * @test
     */
    public function testDeleteanalytics()
    {
        $analytics = $this->makeanalytics();
        $this->json('DELETE', '/api/v1/analytics/'.$analytics->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/analytics/'.$analytics->id);

        $this->assertResponseStatus(404);
    }
}
