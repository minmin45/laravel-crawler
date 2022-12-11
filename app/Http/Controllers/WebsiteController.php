<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $websites = $this->query($request->title, $request->description, $request->created_at_st, $request->created_at_et);
 
        return Inertia::render('Welcome', [
            'websites' => $websites
        ]);
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
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website, $site)
    {
        $site = Website::find($site);
        return Inertia::render('WebsiteDetail', [
            'site' => $site
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }

    private function query($title, $description, $created_at_st, $created_at_et) 
    {
        $query = [];
        Log::info( $created_at_st);
        empty($title)? '' : $query[] = ['title', 'LIKE', '%{$title}%'];
        empty($title) ? '' : $query[] = ['title', 'LIKE', "%{$title}%"];
        empty($description) ? '' : $query[] = ['description', 'LIKE', "%{$description}%"];
        empty($created_at_st)? '' : $query[] = ['created_at', '>=', $created_at_st];
        empty($created_at_et)? '' : $query[] = ['created_at', '<=', $created_at_et];

        $res = Website::where($query)->paginate(3);

        return $res;
    }
}
