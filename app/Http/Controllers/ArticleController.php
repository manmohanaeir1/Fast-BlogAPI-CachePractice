<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // all articles without caching
        //return Article::all();  // => it takes around 1.92 sec to load the 5000 data   

        // all articles with caching   => it takes around 2 sec to  load the 5000 data than it will be cached for 60 sec
        //  return cache()->remember('articles', 60, function () {
        //      return Article::all();   
        //     });

        // more efficient way to cache the data
       
    }

    // return all articles without caching
    // return Article::all();

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
