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

        return Response::json($archives, 200);
    }
}
