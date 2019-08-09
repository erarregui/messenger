<?php

namespace App\Http\Controllers;
use App\Messages;
use Illuminate\Http\Request;
use DB;

class MessageController extends Controller
{
    public function index(Request $request)
    {
    	
    	$userId = auth()->id();
        $contactId = $request->contact_id;

    	return Messages::select('id',
    		DB::raw("IF(`from_id`=$userId, TRUE, FALSE) as written_by_me"),
    		'from_id', 'to_id', 'created_at', 'content'
        )->where(function ($query) use ($userId, $contactId) {
            $query->where('from_id', $userId)->where('to_id', $contactId);
        })->orWhere(function ($query) use ($userId, $contactId) {
            $query->where('from_id', $contactId)->where('to_id', $userId)->get();
        })->get();

    }

    public function store(Request $request)
    {
    	$message = new Messages;
    	$message->from_id = auth()->id();
    	$message->to_id = $request->to_id;
    	$message->content = $request->content;
    	$saved = $message->save();

    	$data = [];
    	$data['success'] = $saved;
    	return $data;
    }
}
