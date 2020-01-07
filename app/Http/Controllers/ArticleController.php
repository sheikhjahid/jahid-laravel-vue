<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Validator;
class ArticleController extends Controller
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function index()
    {
        $articles = collect($this->article->all());
        
        return view('articles.index',[
            'articles' => $articles
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'hasError' => 1,
                'messages' => $validator->errors()
            ]);
        }

        return $request->all();
        
        if($request->file('image'))
        {
            $file = $request->file('image');

            $request->image = $file->store('images');
        }
        $create = $this->article->create($request->all());

        return $create;
    }
    public function update(Request $request)
    {
        $article = $this->article->find($request->id);

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'hasError' => 1,
                'messages' => $validator->errors()
            ]);
        }
        $request->image = "testimage.jpg";

        $update = $this->article->find($request->id)->update($request->all());

        return $article;
    }

    public function delete($id)
    {
        $delete = $this->article->where('id',$id)->delete();

        return $delete;
    }
}
