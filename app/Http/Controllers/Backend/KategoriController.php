<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use DB;
use View;
use App\Model\Page;
use App\Model\Kategori;
use App\Model\Album;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('role:admin');
        $this->middleware('auth');
        $pages = Page::all();
        View::share('pages', $pages);
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
        $this->validate($request, [
            'kategori' => 'required',
        ]);

        $kategori = new Kategori;
        $kategori->kategori = $request->kategori;
        $kategori->save();

        return redirect('adminpanel')->with('message_kategori', 'Insert New Kategori Done !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            abort(404);
        }
        return view('backend.kategori.edit', ['kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kategori' => 'required',
        ]);

        $kategori = Kategori::find($id);
        $kategori->kategori = $request->kategori;
        $kategori->save();

        return redirect('adminpanel')->with('message_kategori', 'Update Data Done !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::where('id_kategori', $id)->exists();
        if ($album) {            
            return redirect('adminpanel')->with('error_kategori', 'Album still using this category !');
        }
        else {
            $kategori = Kategori::find($id);
            $kategori->delete();
            
            return redirect('adminpanel')->with('message_kategori', 'Kategori Deleted !');
        }
    }
}
