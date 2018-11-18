<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_field_value;
use Illuminate\Pagination\LengthAwarePaginator;


class IndexController extends Controller
{
    protected $headerList;

    public function __construct()
    {
        $this->headerList = 'Users List';
    }

    public function index($page = 0)
    {
        if(isset($_GET['page'])){
            $page = trim(strip_tags($_GET['page']));
        }

        $users = array();
        $user_field_values = User_field_value::where('user_field_id', 1)->get();

        foreach ($user_field_values as $value){

            if($this->zodiac($value->value)){
                $items = array();
                $items['name'] = $value->user->name;
                $items['email'] = $value->user->email;
                $items['date_of_birth'] = $value->value;
                $items['zodiac'] = 'Козерог';
                array_push($users, $items);

                $items = array();
            }
        }


        $paginate = 20;
        $offset = ($page * $paginate) - $paginate;
        $itemsForCurrentPage = array_slice($users, $offset, $paginate, true);
        $paginate = new LengthAwarePaginator($itemsForCurrentPage, count($users), $paginate, $page);


        return view('welcome')->with([

            'headerList' => $this->headerList,
            'users' => $paginate

        ]);
    }
}
