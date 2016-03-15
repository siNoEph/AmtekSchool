<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use DB;
use View;
use App\Model\Page;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
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
        $pages = Page::all();

        return view('backend.page.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create');
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
            'page' => 'required|max:255',
            'text' => 'required',
        ]);

        $page = new Page;
        $page->page = $request->page;
        $page->text = $request->text;
        $page->save();

        return redirect('adminpanel')->with('message_page', 'Insert New Page Done !');
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
        $page = Page::find($id);
        if (!$page) {
            abort(404);
        }
        return view('backend.page.edit', ['page' => $page]);
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
            'page' => 'required|max:255',
            'text' => 'required',
        ]);

        $page = Page::find($id);
        $page->page = $request->page;
        $page->text = $request->text;
        $page->save();

        return redirect('adminpanel')->with('message_page', 'Update Page Done !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect('adminpanel')->with('message_page', 'Data Page Deleted !');
    }

    /**
     * Custom function to insert image in textarea
     *
     */
    public function insertImage(Request $request)
    {
        if ($request->file) {
            // checking file is valid.
            if ($request->file->isValid()) {
                $destinationPath = 'assets/pages'; // upload path
                $extension = $request->file->getClientOriginalExtension(); // getting file extension
                $fileName = 'image-'.rand(11111,99999).'.'.$extension; // renameing file
                $request->file->move($destinationPath, $fileName); // uploading file to given path

                return url($destinationPath.'/'.$fileName);
            }
            else {
                // sending back with error message.
                return redirect('adminpanel')->with('error_page', 'Uploaded file is not valid !');
            }
        }
    }
}
