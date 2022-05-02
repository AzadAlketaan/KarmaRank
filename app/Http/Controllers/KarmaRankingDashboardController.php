<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Image;
use Carbon\Carbon;

class KarmaRankingDashboardController extends Controller
{
    
    public function index()
    {

        $user_id = rand(1, 100000);
        $count = 5;
        $check_if_exists = User::find($user_id);

        if ($check_if_exists) {

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
             ->select(['users.id', 'users.username', 'users.karma_score', 'images.url As Image_URL'])
             ->get();
        
             foreach ($users as $key => $user) {
                $users[$key]['position'] = $position_array[ $user->id ];
             }

             return view('index')->with('users', $users);

        }else {
            return 'The UserID is Not Exists!!';
        }
    }

    public function GenerateFakeData()
    {       
        set_time_limit(3000);
        $count = 100000;

        try {
            
            $this->generate_images($count);

            $this->generate_users($count);

            return 'Done';

        } catch (\Throwable $th) {
            
            return 'Something Wrong!!!';
        }
       
    }  

    public function generate_images($count)
    {
        $path = public_path('images');
        $images = \File::allFiles($path);

        $images_names = array();
        
        foreach($images as $image) {
            $images_names[] = $image->getFilename();
        }

        for ($i=0; $i < $count; $i++) { 
            
            $key = array_rand($images_names);

            $image = Image::insert([
                'url' => '/images/'. $images_names[$key],
            ]);
    
        }        
        return 'Done';
    }
    
    public function generate_users($count)
    {
        $images_names = Image::pluck('id')->toArray();
        
        for ($i=0; $i < $count; $i++) { 
            
            $key = array_rand($images_names);

            User::insert([
                'username' => $this->random_username(),
                'karma_score' => rand(0, 100000),
                'image_id' => $images_names[$key],
                'created_at' => Carbon::now()
    
            ]);
        }   
        return 'Done';
    }

    public function random_username() 
    {
        $chars = "abcdefghijklmnopqrstuvwxyz123456789";

        $user_name = ucfirst(substr(str_shuffle($chars),0,10));
        
        while ($this->check_unique_user($user_name) != 1) {
            $this->random_username();
        }

        return $user_name;     
    }

    public function check_unique_user($username) 
    {
        $is_Exists = User::where('username', '=', $username)->first();

        if ( !isset($is_Exists)) return true; else return false;
    }
  
}
