<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\TopicRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\Criteria\LatestFirst;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
	protected $topics;
	protected $users;

	public function __construct(TopicRepository $topics, UserRepository $users)
	{
	    $this->topics = $topics;
	    $this->users = $users;
	}

    public function index()
    {
    	$topics = $this->topics->withCriteria(new LatestFirst())->all();

    	return view('topics.index', compact('topics'));
    }
}
