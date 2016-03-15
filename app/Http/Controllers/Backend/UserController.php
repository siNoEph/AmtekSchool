<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use DB;
use View;
use App\Model\Page;
use App\Model\Article;
use App\Model\Foto;
use App\Model\Useradmin;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        // All Data
        $useradmins = Useradmin::all();

        return view('backend.user.index', ['useradmins' => $useradmins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|max:255',
        ]);

        if ($request->foto) {
            // checking file is valid.
            if ($request->foto->isValid()) {
                $destinationPath = 'assets/backend/images/users'; // upload path
                $extension = $request->foto->getClientOriginalExtension(); // getting foto extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing foto
                $request->foto->move($destinationPath, $fileName); // uploading file to given path
            }
            else {
                // sending back with error message.
                return redirect('adminpanel/users')->with('error', 'Uploaded file is not valid !');
            }
        }

        $useradmin = new Useradmin;
        if ($request->foto) {
            $useradmin->foto = $fileName;
        }
        $useradmin->name = $request->name;
        $useradmin->email = $request->email;
        $useradmin->password = bcrypt($request->password);
        $useradmin->role = $request->role;
        $useradmin->save();

        return redirect('adminpanel/users')->with('message', 'Insert New User Done !');
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
        $useradmin = Useradmin::find($id);
        if (!$useradmin) {
            abort(404);
        }
        return view('backend.user.edit', ['useradmin' => $useradmin]);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'password' => 'min:6',
            'role' => 'required|max:255',
        ]);

        if ($request->foto) {
            // checking file is valid.
            if ($request->foto->isValid()) {
                $destinationPath = 'assets/backend/images/users'; // upload path
                $extension = $request->foto->getClientOriginalExtension(); // getting foto extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing foto
                $request->foto->move($destinationPath, $fileName); // uploading file to given path
                \File::delete($destinationPath.'/'.$request->old_foto); // delete old foto
            }
            else {
                // sending back with error message.
                return redirect('adminpanel/users')->with('error', 'Uploaded file is not valid !');
            }
        }

        $useradmin = Useradmin::find($id);
        if ($request->foto) {
            $useradmin->foto = $fileName;
        }
        $useradmin->name = $request->name;
        $useradmin->email = $request->email;
        if ($request->password) {
            $useradmin->password = bcrypt($request->password);
        }
        $useradmin->role = $request->role;
        $useradmin->save();

        return redirect('adminpanel/users')->with('message', 'Update Data Done !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id_user', $id)->exists();
        $foto = Foto::where('id_user', $id)->exists();
        if ($article) {
            return redirect('adminpanel/users')->with('error', 'Article still using this user !');
        }
        elseif ($foto) {
            return redirect('adminpanel/users')->with('error', 'Foto still using this user !');
        }
        else {
            $useradmin = Useradmin::find($id);
            $destinationPath = 'assets/backend/images/users';
            \File::delete($destinationPath.'/'.$useradmin->foto); // delete foto
            $useradmin->delete();

            return redirect('adminpanel/users')->with('message', 'User Deleted !');
        }
    }
}
