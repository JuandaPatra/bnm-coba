<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\NewsRepository;
use App\Repositories\ProductRepository;
use App\Repositories\FaqRepository;
use Illuminate\Support\Facades\Log;

use App\Models\Post;
use App\Models\PostImages;
use App\Models\Category;



class NewsController extends Controller
{

    public function index(){

        $idCategoryNews = 9;
        $categoryNews = Category::where('id', $idCategoryNews)->first();
        // yang di panggil title and thumbnail
        // $postsNews = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        // ->where('category_post.category_id','=', $idCategoryNews)
        // ->get(['posts.*']);
        $postsNews = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryNews)
        ->where('status', '=', 'publish')
        ->orderBy('posts.publish_date', 'DESC')
        ->paginate(4,['posts.*']);
        // dd($postsNews);
        // return $postsNews;
        // title, slug,thumbnail,content
        // return $postsNews;
        return view('client.news.newslist',compact('postsNews', 'categoryNews'));
    }
    public function detail($slug){
        $postsNewsDetail = Post::where('slug',$slug)->first();
        $idCategoryNews = 9;
        $postsNews = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryNews)
        ->whereNotIn('posts.id', [$postsNewsDetail->id])
        ->orderBy('posts.publish_date', 'DESC')
        ->limit(2)
        ->get();
        
        
        
        //  dd($postsNews);
        
        return view('client.news.newsdetail',compact('postsNewsDetail', 'postsNews'));
    }

}
