<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ArchiveRequest;
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
        $archives = Archive::latest()->paginate(15);

        return view('archives.index', compact('archives'));
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
    public function store(ArchiveRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = Auth::user();

            $archive = $request->all();

            $archive['catalogue_number'] = str_pad(rand(0, pow(10, 4)-1), 4, '0', STR_PAD_LEFT);

            $archive = new Archive($archive);
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
        return view('archives.show', ['archive' => $archive]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {

        return view('archives.edit', ['archive' => $archive]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArchiveRequest $request, Archive $archive)
    {
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
