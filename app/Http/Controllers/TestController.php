<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request){
        $id = $request->id ?? 0;
        
        TestEvent::dispatch($id);
        
        return "RUN !";
    }
}
