<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Archive;

class ArchiveApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives = Archive::oldest()->paginate(50);

        return response($archives, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $archive = Archive::find($id);

        return response($archive, 200);
    }

    /**
     * Search a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search($search)
    {
        $archives = Archive::search($search)->get();

        if (count($archives)) {
         return Response($archives, 200);
        }

        return response(['message' => 'No Archive not found'], 404);
    }
}
