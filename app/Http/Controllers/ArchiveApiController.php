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

        $archives = Archive::where([
            'title',
            'catalogue_number',
            'content',
            'sound_type',
            'date',
            'season',
            'time_of_day',
            'type_of_location',
            'location',
            'recordist',
            'artist',
            'length',
            'device_recorder',
            'format_quality',
            'access_and_license',
            'tags',
            'media'
        ], 'LIKE', '%' . $request->search . '%')
                            ->paginate(50);
        #dd(__LINE__, $archives);

        return response($archives, 200);
    }
}
