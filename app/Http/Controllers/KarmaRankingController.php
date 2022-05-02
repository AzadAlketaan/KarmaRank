<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Image;
use Carbon\Carbon;

class KarmaRankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function KarmaPosition(Request $request)
    {

        $user_id = $request->user_id;
        if (!isset($request->count)) $count = 5; else  $count = $request->count;

        $check_if_exists = User::find($user_id);

        if (isset($check_if_exists)) {

            if ($count < 0 ) $count = $count * -1;
            $count = ( ($count - ($count%2) ) / 2 ) ;
    
            $ordered_users = User::orderBy('karma_score', 'DESC')->pluck('id')->toArray();
    
            $position_array = array_flip($ordered_users);

            if ($position_array[$user_id] < $count) $count_begin = $position_array[$user_id] * -1; else $count_begin = - $count;

            //$position_array[$user_id]; // get the position of the user_id
            //return $ordered_users[1]; //get the user_id of a position    
    
            $users = User::join('images', 'users.image_id', '=', 'images.id')
            ->where(function($query) use ($count, $count_begin, $ordered_users, $position_array, $user_id)  {
                $user_ids = array();
                for ($i= $count_begin; $i <= $count; $i++) { 
                    array_push($user_ids, $ordered_users[$position_array[$user_id] + $i]);
                }    
                $query->whereIn('users.id', $user_ids );
             })
             ->orderby('karma_score', 'asc')
             ->select(['users.id', 'users.karma_score', 'images.url As Image_URL'])
             ->get();

             //return $users;

             foreach ($users as $key => $user) {
                $users[$key]['position'] = $position_array[ $user->id ];
             }
    
            return $users;

        }else {
            return 'The UserID is Not Exists!!';
        }
    }
  
}
