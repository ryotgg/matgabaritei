<?php

namespace App\Http\Controllers;

use App\Models\Superuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SuperuserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:admin');

        // ???
        //View::share('action', 'no_add');  
        //View::share('nav', 'users');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Superuser  $superuser
     * @return \Illuminate\Http\Response
     */
    public function show(Superuser $superuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Superuser  $superuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Superuser $superuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Superuser  $superuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Superuser $superuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Superuser  $superuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superuser $superuser)
    {
        //
    }
}
