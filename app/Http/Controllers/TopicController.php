<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\TopicRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\Criteria\ByUser;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\IsLive;
use App\Repositories\Eloquent\Criteria\LatestFirst;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    	$topics = $this->topics->withCriteria(
    		new LatestFirst(),
    		new IsLive(),
    		new ByUser(Auth::user()->id),
    		new EagerLoad(['posts', 'posts.user'])
    	)->all();

    	return view('topics.index', compact('topics'));
    }

    public function show($slug)
    {
    	$topic = $this->topics
    		->withCriteria(new EagerLoad(['posts.user']))
    		->findBySlug($slug);

    	return view('topics.show', compact('topic'));
    }
}
