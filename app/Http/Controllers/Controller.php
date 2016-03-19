<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LearnParty\Http\Repositories\VideoRepository;
use LearnParty\Http\Repositories\UserRepository;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $videoRepository;
    public $userRepository;

    public function __construct()
    {
        $this->videoRepository = new VideoRepository();
        $this->userRepository = new UserRepository();
    }
}
