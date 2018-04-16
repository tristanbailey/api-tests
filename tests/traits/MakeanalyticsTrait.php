<?php

use Faker\Factory as Faker;
use App\Models\analytics;
use App\Repositories\analyticsRepository;

trait MakeanalyticsTrait
{
    /**
     * Create fake instance of analytics and save it in database
     *
     * @param array $analyticsFields
     * @return analytics
     */
    public function makeanalytics($analyticsFields = [])
    {
        /** @var analyticsRepository $analyticsRepo */
        $analyticsRepo = App::make(analyticsRepository::class);
        $theme = $this->fakeanalyticsData($analyticsFields);
        return $analyticsRepo->create($theme);
    }

    /**
     * Get fake instance of analytics
     *
     * @param array $analyticsFields
     * @return analytics
     */
    public function fakeanalytics($analyticsFields = [])
    {
        return new analytics($this->fakeanalyticsData($analyticsFields));
    }

    /**
     * Get fake data of analytics
     *
     * @param array $postFields
     * @return array
     */
    public function fakeanalyticsData($analyticsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'email' => $fake->word,
            'property_id' => $fake->word,
            'account_id' => $fake->word,
            'profile_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $analyticsFields);
    }
}
