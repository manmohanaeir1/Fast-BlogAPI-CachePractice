<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Jobs\SendPostNotification;
use Illuminate\Support\Facades\Log;

class QueeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::info('Index method called');

        try {
            $obj = new Post();
            $obj->title = 'New Post Title';
            $obj->content = 'New Post Content';
            $obj->save();

            Log::info('Post saved', ['post' => $obj]);

            SendPostNotification::dispatch($obj);

            Log::info('Notification dispatched');

            return 'Post has been created and notification has been sent';
        } catch (\Exception $e) {
            Log::error('Error in index method', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    // Other methods...
}