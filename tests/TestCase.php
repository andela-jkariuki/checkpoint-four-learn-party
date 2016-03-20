<?php

use LearnParty\Http\Repositories\VideoRepository;
use LearnParty\Http\Repositories\UserRepository;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    protected $videoRepository;
    protected $userRepository;

    /**
     * Setup the testing environment,
     * Call the parent Setup and run mirations
     */
    public function setUp()
    {
        parent::setUp();
        $this->prepareTestDB();

        $this->videoRepository = new VideoRepository();
        $this->userRepository = new UserRepository();
    }

    /**
     * Prepare test database
     */
    public function prepareTestDB()
    {
        Config::set('database.default', 'sqlite');
        Artisan::call('migrate:refresh');
    }

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
}
