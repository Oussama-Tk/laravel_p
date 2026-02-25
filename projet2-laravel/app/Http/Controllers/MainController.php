<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\firstNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class MainController extends Controller
{
   
   
    public function store(Request $request)
    {
        // $request->validate([
        //     "username" => "required",
        //     "email" => "required|unique|email",
        //     "password" => "required",
        // ]);
        $client = new User();
        $client->name = $request->username; // or use $request->name if available
        $client->username = $request->username;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);

        $client->save();

/////////////////envoi email code////////////////////
        $detail = [
            "greeting" => "Hello ".$client->name,
            "body" => "test",
            "actiontext" => "thanks for subscribing",
            "actionurl" => $client->email,
            "lastline" => "this last line"
        ];

        Notification::send($client, new firstNotification($detail));
      // Si vous voulez envoyer au user connecté :
        //      Notification::send( auth()->user(), new firstNotification($detail));

///////////////////////////////////////////////////////
        return back()->with("success", "client creer avec succe");
    }
}

