<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use DB;
use View;
use App\Model\Kategori;
use App\Model\Page;
use App\Model\Useradmin;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $useradmin = Useradmin::where('role', 'admin')->exists();
        if (!$useradmin) {
            $adduseradmin = new Useradmin;
            $adduseradmin->name = 'Administrator';
            $adduseradmin->email = 'admin@mail.com';
            $adduseradmin->password = bcrypt('admin');
            $adduseradmin->role = 'admin';
            $adduseradmin->save();
        }

        $this->middleware('auth');
        $pages = Page::all();
        View::share('pages', $pages);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();

        return view('backend.home', ['kategoris' => $kategoris]);
    }
}
