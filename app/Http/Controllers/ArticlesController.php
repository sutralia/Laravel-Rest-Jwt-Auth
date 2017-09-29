<?php

namespace App\Http\Controllers;
// use App\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    

	public function getArticle(){
		$article = DB::table('articles')->get();
		 return response()->json(['result'=>$article],200);
	}

	public function getOneArticle(Request $request){
		$id = $request->get('id');
		// dd($id);
		$article = DB::table('articles')->where('id',$id)->first();
		return response()->json(['result'=>$article],200);
	}

	public function updateArticle(Request $request){
		$id = $request->get('id');
		$title = $request->get('title');
		$body = $request->get('body');

		$article = DB::table('articles')
					->where('id',$id)
					->update([
						'title'=>$title,
						'body'=>$body
						]);
		return response()->json([
				'message'=>"update Article Successfully",
				'result'=>$article
			],201);
	}

	public function articleDelete(Request $request){
		$id = $request->get('id');

		$article = DB::table('articles')
					->where('id',$id)
					->delete();
		return response()->json([
				'message'=>'Article Successfully Deleted',
				'result'=>$article
			],200);
	}
}
