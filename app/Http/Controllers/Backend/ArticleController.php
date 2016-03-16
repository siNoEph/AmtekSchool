<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use DB;
use View;
use App\Model\Page;
use App\Model\Kategori;
use App\Model\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
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
        $articles = DB::table('articles')
            ->join('kategoris', 'articles.id_kategori', '=', 'kategoris.id')
            ->join('users', 'articles.id_user', '=', 'users.id')
            ->select('articles.*', 'kategoris.kategori', 'users.name')
            ->get();

        return view('backend.article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('backend.article.create', ['kategoris' => $kategoris]);
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
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        if ($request->image) {
            // checking file is valid.
            if ($request->image->isValid()) {
                $destinationPath = 'assets/articles'; // upload path
                $extension = $request->image->getClientOriginalExtension(); // getting foto extension
                $slug_file = str_slug($request->title, "_");
                $fileName = $slug_file.'_'.rand(11111,99999).'.'.$extension; // renameing foto
                $request->image->move($destinationPath, $fileName); // uploading file to given path
            }
            else {
                // sending back with error message.
                return redirect('adminpanel/article')->with('error', 'Uploaded file is not valid !');
            }
        }

        $slug = str_slug($request->title, "-");

        $article = new Article;
        $article->id_kategori = $request->kategori;
        $article->id_user = $request->id_user;
        $article->title = $request->title;
        $article->slug = $slug;
        $article->text = $request->text;
        if ($request->image) {
            $article->image = $fileName;
        }
        if ($request->video) {
            $article->video = $request->video;
        }
        $article->save();

        return redirect('adminpanel/article')->with('message', 'Insert New Article Done !');
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
        $article = Article::find($id);
        $kategoris = Kategori::all();
        if(!$article) {
            abort(404);
        }
        return view('backend.article.edit', ['article' => $article, 'kategoris' => $kategoris]);
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
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        if ($request->image) {
            $this->validate($request, [
                'image' => 'image',
            ]);
            // checking file is valid.
            if ($request->image->isValid()) {
                $destinationPath = 'assets/articles'; // upload path
                $extension = $request->image->getClientOriginalExtension(); // getting foto extension
                $slug_file = str_slug($request->title, "_");
                $fileName = $slug_file.'_'.rand(11111,99999).'.'.$extension; // renameing foto
                \File::delete($destinationPath.'/'.$request->old_image); // delete old foto
                $request->image->move($destinationPath, $fileName); // uploading file to given path
            }
            else {
                // sending back with error message.
                return redirect('adminpanel/article')->with('error', 'Uploaded file is not valid !');
            }
        }

        $slug = str_slug($request->title, "-");

        $article = Article::find($id);
        $article->id_kategori = $request->kategori;
        $article->id_user = $request->id_user;
        $article->title = $request->title;
        $article->slug = $slug;
        $article->text = $request->text;
        if ($request->image) {
            $article->image = $fileName;
        }
        if ($request->video) {
            $article->video = $request->video;
        }
        $article->save();

        return redirect('adminpanel/article')->with('message', 'Update Article Done !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('adminpanel/article')->with('message', 'Delete article Done !');
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
                $destinationPath = 'assets/articles/images'; // upload path
                $extension = $request->file->getClientOriginalExtension(); // getting file extension
                $fileName = 'image-'.rand(11111,99999).'.'.$extension; // renameing file
                $request->file->move($destinationPath, $fileName); // uploading file to given path

                return url($destinationPath.'/'.$fileName);
            }
            else {
                // sending back with error message.
                return redirect('adminpanel/article')->with('error', 'Uploaded file is not valid !');
            }
        }
    }
}
