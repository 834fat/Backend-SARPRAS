<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
   /**
    * Handle the incoming request.
    */
   public function __invoke(Request $request)
   {
       //count categories
       $categories = Category::count();
       
       //count users
       $users = User::count();

   //return response json
   return response()->json([
       'success'  => true,
       'message'  => 'List Data on Dashboard',
       'data'     => [
           'categories'   => $categories,
           'users'        => $users,
           ]
       ]);
   }
}
