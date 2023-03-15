<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\NewsRepository;
use App\Repositories\ProductRepository;
use App\Repositories\FaqRepository;
use Illuminate\Support\Facades\Log;
use Mail;
use GuzzleHttp\Client;

use App\Models\Slider;
use App\Models\Post;
use App\Models\PostImages;
use App\Models\Category;
use App\Models\Contact;

use App\Mail\ContactMail;


class HomeController extends Controller
{

    public function index(){

        // banner or slider
        $slider = Slider::where('status','publish')->first();
        // post banner slider
        //dd($slider);

        // id category slider
        $idCategoryBanner = 1;
        $postsBanner = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryBanner)
        ->get(['posts.*']);
        
        //dd($postsBanner[0]);

        // our profile
         $idCategoryProfile = 2;
         $categoryProfile = Category::where('id', $idCategoryProfile)->first();
        //dd($categoryProfile);

         // sustainability
         $idCategorySustanbility = 3;
         $categorySustanbility = Category::where('id','=', $idCategorySustanbility)->first();
        //dd($categorySustanbility);
        
        // our impact
         $idCategoryOur = 4;
         $postsOur = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')->where('category_post.category_id','=', $idCategoryOur)->get(['posts.*']);
        //dd($postsOur);
        
        // plant tour
        $idCategoryPlant= 5;
        $postsPlant = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryPlant)
        ->get(['posts.*']);
      
        // images 
        
        //dd($postsPlant);
        
         $postsPlant1= Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryPlant)
        ->join('posts_images', 'posts_images.post_id' , '=', 'category_post.post_id')
        ->where('posts_images.post_id','=', 7)
        ->get(['posts.*','posts_images.*']);
        // return $postsPlant1;

        $postPlant2= Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryPlant)
        ->join('posts_images', 'posts_images.post_id' , '=', 'category_post.post_id')
        ->where('posts_images.post_id','=', 8)
        ->get(['posts.*','posts_images.*']);
        // return $postPlant2;

        // product
        $idCategoryProduct = 6;
        $categoryProduct = Category::where('id','=', $idCategoryProduct)->first();
        $postsProduct = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        //->leftjoin('posts_images', 'posts_images.post_id', '=', 'posts.id')
        ->where('category_post.category_id','=', $idCategoryProduct)
        ->get(['posts.title','posts.thumbnail','posts.content','posts.description','posts.image']);
        //->get(['posts.title','posts.thumbnail','posts.content','posts.description','posts.image','posts_images.full_path']);

        
        // market
        $idCategoryMarket = 7;
        $categoryMarket = Category::where('id','=', $idCategoryMarket)->first();
        $postsMarket = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryMarket)
        ->get(['posts.*']);
        // dd($postsMarket);


        // product facilities
        $idCategoryFacilities = 8;
        $postsFacilities = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryFacilities)
        ->get(['posts.*']);
        // dd($postsFacilities);
        // return $postsFacilities;

        // news
        $idCategoryNews = 9;
        $postsNews = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryNews)
        ->where('posts.status', '=', 'publish')
        ->orderBy('publish_date', 'DESC')
        ->get(['posts.*']);


        //dd($postsNews);

        // footer location and medsos
        return view('client.home.details',compact('slider','postsBanner','categoryProfile','categorySustanbility','categoryProduct','categoryMarket','postsOur','postsPlant','postsPlant1','postPlant2','postsBanner','postsProduct','postsMarket','postsFacilities','postsNews'));
    }
    public function storeContactForm(Request $request) 
    { 
        $input = $request->all(); 
        $client = new Client();
        $secret = '6LcOq_keAAAAAEmif9iN4s-W4B946OmPeSoE3bmi';

        $response = $client->post(
                'https://www.google.com/recaptcha/api/siteverify',
                [
                    'form_params' =>
                        [
                            'secret' => $secret,
                            'response' => $request->grecaptcha6
                        ]
                ]
            );
        $body = json_decode((string)$response->getBody());
        // if($body->success && $body->score >= 0.5){
        //         Contact::create($input);
                
        //         $adminEmail = "marketing@bnmstainless.co.id";
                
        //         //  Mail::to($adminEmail)->bcc(['khoeruladhayana@gmail.com','putriaisyah245@gmail.com','marketing@bnmstainless.co.id', 'patrajuanda10@gmail.com'])->send(new ContactMail($input[0]));
        //     }
        Contact::create($input); 
        return response()->json([
            'data' => $body,
            'result' =>'success!',
            'contact' => $input,
            // 'mail' => config('mail') 
        ]);
        
        
        
        
    }
    
    
    
    public function search(Request $request){
        
        
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
            
        $posts1 = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('title', 'LIKE',"%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->get();
            
        $idCategoryNews = 9;
        $postsNews = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id','=', $idCategoryNews)
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->get(['posts.*']);
        
        // return $posts1;
        
        
    
        // Return the search view with the resluts compacted
        // return view('client.search.index', compact('posts','postsNews'),['searchValue'=>$search]);
        return view('client.search.index', compact('posts1','postsNews'),['searchValue'=>$search]);
    }
}
