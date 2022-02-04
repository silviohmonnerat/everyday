<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Archive;

class ArchiveController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives = Archive::latest()->paginate(5);

        return view('archives.index', compact('archives'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'sound_type' => 'required',
            'date' => 'required',
            'season' => 'required',
            'time_of_day' => 'required',
            'type_of_location' => 'required',
            'location' => 'required',
            'recordist' => 'required',
            'artist' => 'required',
            'length' => 'required',
            'device_recorder' => 'required',
            'format_quality' => 'required',
            'access_andLicense' => 'required',
            'tags' => 'required',
            'media' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = Auth::user();

            $archive = new Archive([
                'title' => $request->title,
                'content' => $request->content,
                'catalogue_number' => str_pad(rand(0, pow(10, 4)-1), 4, '0', STR_PAD_LEFT),
                'sound_type' => $request->sound_type,
                'date' => $request->date,
                'season' => $request->season,
                'time_of_day' => $request->time_of_day,
                'type_of_location' => $request->type_of_location,
                'location' => $request->location,
                'recordist' => $request->recordist,
                'artist' => $request->artist,
                'length' => $request->length,
                'device_recorder' => $request->device_recorder,
                'format_quality' => $request->format_quality,
                'access_andLicense' => $request->access_andLicense,
                'tags' => $request->tags,
                'media' => $request->media,
                'user_id' => $user->id
            ]);

            $user->archives()->save($archive);

            DB::commit();

            return redirect()->route('archives.index')
                             ->with('success','Archive created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        return view('archives.show', compact($archive));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        return view('archives.show', compact($archive));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'sound_type' => 'required',
            'date' => 'required',
            'season' => 'required',
            'time_of_day' => 'required',
            'type_of_location' => 'required',
            'location' => 'required',
            'recordist' => 'required',
            'artist' => 'required',
            'length' => 'required',
            'device_recorder' => 'required',
            'format_quality' => 'required',
            'access_andLicense' => 'required',
            'tags' => 'required',
            'media' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $archive->update($request->all());

            DB::commit();

            return redirect()->route('archives.index')
                             ->with('success', 'Archive updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        DB::beginTransaction();

        try {
            $archive->delete();

            DB::commit();

            return redirect()->route('archives.index')
                             ->with('success', 'deleted updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
