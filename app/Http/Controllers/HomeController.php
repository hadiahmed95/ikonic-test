<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\FriendRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->id();
        $data = [];
        $data["user_id"] = $userId;
        $data["sent_requests"] = FriendRequest::where("sender_id", $userId)->where("accepted", 0)->with("receiver")->get();
        $data["received_requests"] = FriendRequest::where("receiver_id", $userId)->where("accepted", 0)->with("sender")->get();
        $data["connections"] = FriendRequest::where(function($query) {
            return $query
                ->where('sender_id', auth()->id())
                ->orWhere('receiver_id', auth()->id());
            })
            ->where("accepted", 1)->get();
        $getExistingRequests = FriendRequest::where("sender_id", $userId) -> orWhere("receiver_id", $userId) -> get();
        $notInIds = [];
        $notInIds[] = $userId;
        foreach( $getExistingRequests as $request ) {
            $notInIds[] = ($request -> sender_id == $userId) ? $request -> receiver_id : $request -> sender_id;
        }
        $notInIds = array_values(array_unique($notInIds));
        $data["suggestions"] = User::whereNotIn("id", $notInIds)->get();
        return view('home')->with($data);
    }

    public function send_request($receiver_id) {
        $userId = auth()->id();
        FriendRequest::insert([
            "sender_id" => $userId,
            "receiver_id" => $receiver_id,
            "accepted" => 0
        ]);
        return redirect() -> back();
    }

    public function accept_request($id) {
        FriendRequest::where("id", $id)->update([
            "accepted" => 1
        ]);
        return redirect() -> back();
    }

    public function remove_connection($id) {
        FriendRequest::where("id", $id)->delete();
        return redirect() -> back();
    }
}
