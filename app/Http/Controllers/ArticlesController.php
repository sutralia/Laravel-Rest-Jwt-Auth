<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    private $article;
	public function __construct(Article $article){
		$this->article=$article;
	}


	public function getArticle(){
		return response()->json(['result'=>$article]);
	}
}
