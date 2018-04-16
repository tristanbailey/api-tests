<?php

use App\Models\analytics;
use App\Repositories\analyticsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class analyticsRepositoryTest extends TestCase
{
    use MakeanalyticsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var analyticsRepository
     */
    protected $analyticsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->analyticsRepo = App::make(analyticsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateanalytics()
    {
        $analytics = $this->fakeanalyticsData();
        $createdanalytics = $this->analyticsRepo->create($analytics);
        $createdanalytics = $createdanalytics->toArray();
        $this->assertArrayHasKey('id', $createdanalytics);
        $this->assertNotNull($createdanalytics['id'], 'Created analytics must have id specified');
        $this->assertNotNull(analytics::find($createdanalytics['id']), 'analytics with given id must be in DB');
        $this->assertModelData($analytics, $createdanalytics);
    }

    /**
     * @test read
     */
    public function testReadanalytics()
    {
        $analytics = $this->makeanalytics();
        $dbanalytics = $this->analyticsRepo->find($analytics->id);
        $dbanalytics = $dbanalytics->toArray();
        $this->assertModelData($analytics->toArray(), $dbanalytics);
    }

    /**
     * @test update
     */
    public function testUpdateanalytics()
    {
        $analytics = $this->makeanalytics();
        $fakeanalytics = $this->fakeanalyticsData();
        $updatedanalytics = $this->analyticsRepo->update($fakeanalytics, $analytics->id);
        $this->assertModelData($fakeanalytics, $updatedanalytics->toArray());
        $dbanalytics = $this->analyticsRepo->find($analytics->id);
        $this->assertModelData($fakeanalytics, $dbanalytics->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteanalytics()
    {
        $analytics = $this->makeanalytics();
        $resp = $this->analyticsRepo->delete($analytics->id);
        $this->assertTrue($resp);
        $this->assertNull(analytics::find($analytics->id), 'analytics should not exist in DB');
    }
}
