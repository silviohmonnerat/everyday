<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function search(Request $request)
    {
        if ($request->search == '') {
            $archives = Archive::oldest()->paginate(50);
            return response($archives, 200);
        }

        $archives = Archive::where('title', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('catalogue_number', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('content', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('sound_type', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('date', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('season', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('time_of_day', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('type_of_location', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('location', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('recordist', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('artist', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('device_recorder', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('access_and_license', 'LIKE', '%' . $request->search . '%')
                            ->paginate(50);
        #dd(__LINE__, $archives);

        return response($archives, 200);
    }
}
