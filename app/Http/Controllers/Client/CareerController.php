<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\NewsRepository;
use App\Repositories\ProductRepository;
use App\Repositories\FaqRepository;
use Illuminate\Support\Facades\Log;

use App\Models\Career;

class CareerController extends Controller
{

    public function index(){

    //   $career = Career::where('status','publish')->get();
       $career = Career::where('status','publish')->paginate(5);
    //   return $career;
       return view('client.career.index',compact('career'));
    }

}
