<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller
{
    protected $response;

    private $users;


    public function __construct(Response $response, User $user)
    {
        $this->response = $response;
        $this->users = $user;
    }

    public function index()
    {
        $users = $this->users->with('lastComment.user')->get();
        return view('users')->with(compact('users'));
    }

    /**
     * @return Response
     * @param  $keyword string
     */
    public function search($keyword)
    {
        return $this->users->search($keyword);
//        echo $keyword;
    }
}
