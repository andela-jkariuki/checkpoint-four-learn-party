<?php

use LearnParty\Http\Repositories\VideoRepository;
use LearnParty\Http\Repositories\UserRepository;
use LearnParty\Http\Controllers\Auth\AuthController;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * VideoRepository instance.
     *
     * @var Object
     */
    protected $videoRepository;

    /**
     * UserRepository instance.
     *
     * @var Object
     */
    protected $userRepository;

    /**
     * AuthController instance.
     *
     * @var Object
     */
    protected $authController;

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
        $this->authController = new AuthController();
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
