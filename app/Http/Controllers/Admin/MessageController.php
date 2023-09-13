<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::paginate(2);

        return view('admin.messages.messages_list',compact('messages'));
    }

    public function destroy($id)
    {
        Message::where('id', $id)->delete();
        return  redirect()->route('messages.index')->with('success', 'data deleted successfully');
    }
}
