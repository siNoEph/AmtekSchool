<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use DB;
use View;
use App\Model\Page;
use App\Model\Staf;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StafController extends Controller
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
        $stafs = Staf::all();
        return view('backend.staf.index', ['stafs' => $stafs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.staf.create');
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
            'nama' => 'required|max:255',
            'nip' => 'required|max:255',
            'nama' => 'required|max:255',
            'tmp_lahir' => 'required|max:255',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required|max:255',
            'agama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'tugas_pokok' => 'required|max:255'
        ]);

        if ($request->foto) {
            // checking file is valid.
            if ($request->foto->isValid()) {
                $destinationPath = 'assets/staf'; // upload path
                $extension = $request->foto->getClientOriginalExtension(); // getting foto extension
                $name_file = str_slug($request->nama, "_");
                $fileName = $name_file.'.'.$extension; // renameing foto
                $request->foto->move($destinationPath, $fileName); // uploading file to given path
            }
            else {
                // sending back with error message.
                return redirect('adminpanel/staf')->with('error', 'Uploaded file is not valid !');
            }
        }

        $tgl_lahir = date('Y/m/d', strtotime($request->tgl_lahir));

        $staf = new Staf;
        if ($request->foto) {
            $staf->foto = $fileName;
        }
        $staf->nama = $request->nama;
        $staf->nip = $request->nip;
        $staf->tmp_lahir = $request->tmp_lahir;
        $staf->tgl_lahir = $tgl_lahir;
        $staf->jenis_kelamin = $request->jenis_kelamin;
        $staf->jabatan = $request->jabatan;
        $staf->tugas_pokok = $request->tugas_pokok;
        $staf->agama = $request->agama;
        $staf->save();

        return redirect('adminpanel/staf')->with('message', 'Insert New Staf Done !');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staf = Staf::find($id);
        $destinationPath = 'assets/staf';
        \File::delete($destinationPath.'/'.$staf->foto);
        $staf->delete();

        return redirect('adminpanel/staf')->with('message', 'Staf Deleted !');
    }
}
