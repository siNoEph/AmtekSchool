<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use DB;
use View;
use App\Model\Page;
use App\Model\Foto;
use App\Model\Kategori;
use App\Model\Album;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
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
        // List Foto berdasarkan kategori dan album
        $fotos = DB::table('fotos')
            ->join('albums', 'fotos.id_album', '=', 'albums.id')
            ->join('users', 'fotos.id_user', '=', 'users.id')
            ->select('fotos.*', 'albums.album', 'users.name')
            ->get();

        return view('backend.gallery.index', ['fotos' => $fotos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('backend.gallery.create', ['kategoris' => $kategoris]);
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
            'kategori' => 'required|max:255',
            'album' => 'required|max:255',
            'desc' => 'required',
            'foto' => 'required',
        ]);

        // checking file is valid.
        if ($request->foto) {

            // Insert new album
            $album = new Album;
            $album->id_kategori = $request->kategori;
            $album->album = $request->album;
            $album->desc = $request->desc;
            $album->save();

            // get id album after insert
            $max_id_album = Album::max('id');

            // slug name album
            $slug_album = str_slug($request->album, "_");

            //make folder album
            \File::makeDirectory('assets/gallery/'.$slug_album);

            // start count how many uploaded
            $uploadcount = 1;
            foreach($request->foto as $file) {
                $destinationPath = 'assets/gallery/'.$slug_album; // upload path
                $extension = $file->getClientOriginalExtension(); // getting foto extension
                $fileName = $slug_album.'_'.$uploadcount.'.'.$extension; // renameing foto
                $file->move($destinationPath, $fileName); // uploading file to given path

                // Insert foto
                $foto = new Foto;
                $foto->id_album = $max_id_album;
                $foto->id_user = $request->id_user;
                $foto->caption = 'Foto - '.$uploadcount.', Album : '.$request->album;
                $foto->file = $fileName;
                $foto->save();

                $uploadcount ++;
            }
            // sending success message.
            return redirect('adminpanel/gallery/create')->with('message', 'Uploaded foto on album Done !');
        }
        else {
            // sending back with error message.
            return redirect('adminpanel/gallery/create')->with('error', 'Uploaded file is not valid !');
        }
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
        $foto = Foto::find($id);
        $album = Album::where('id', $foto->id_album)->get()->first();
        return view('backend.gallery.edit', ['foto' => $foto, 'album' => $album]);
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
            'caption' => 'required|max:255',
        ]);

        if ($request->file) {
            // checking file is valid.
            if ($request->file->isValid()) {
                $destinationPath = 'assets/gallery/'.$request->album; // upload path
                \File::delete($destinationPath.'/'.$request->old_file); // delete old foto
                $request->file->move($destinationPath, $request->old_file); // uploading file to given path
            }
            else {
                // sending back with error message.
                return redirect('adminpanel/gallery')->with('error', 'Uploaded file is not valid !');
            }
        }

        $foto = Foto::find($id);
        $foto->caption = $request->caption;
        $foto->save();

        return redirect('adminpanel/gallery')->with('message', 'Update Data Done !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $foto = Foto::where('id_album', $id);

        // Delete folder album
        $slug_album = str_slug($album->album, "_");
        $destinationPath = 'assets/gallery/'.$slug_album;
        \File::deleteDirectory($destinationPath);

        $album->delete();
        $foto->delete();

        return redirect('adminpanel/gallery')->with('message', 'Gallery Deleted !');
    }

    public function deleteFoto($id, $file_foto, $id_album)
    {
        $foto = Foto::find($id);
        $album = Album::find($id_album);

        // Delete file foto
        $slug_album = str_slug($album->album, "_");
        $destinationPath = 'assets/gallery/'.$slug_album.'/'.$file_foto;
        \File::delete($destinationPath);

        $foto->delete();

        return redirect('adminpanel/gallery')->with('message', 'Foto Deleted !');
    }

    public function getAlbum(Request $request)
    {
        $id_kategori = $request->id_kategori;

        $album = Album::where('id_kategori', $id_kategori)->get();
        return $album;
    }

    public function getFoto(Request $request)
    {
        $id_album = $request->id_album;
        $fotos = DB::table('fotos')
            ->join('albums', 'fotos.id_album', '=', 'albums.id')
            ->join('users', 'fotos.id_user', '=', 'users.id')
            ->select('fotos.*', 'albums.album', 'users.name')
            ->get();
        return $fotos;
    }
}
