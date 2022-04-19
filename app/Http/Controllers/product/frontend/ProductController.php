<?php

namespace App\Http\Controllers\product\frontend;

use App\Components\Comment as CommentHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $comment;
    public function __construct()
    {
        $this->comment = new CommentHelper();
    }
    public function index($slug = "", $id = 0)
    {
        $detail = Product::where('slug', $slug)->first();
        if (!isset($detail)) {
            return redirect()->route('homepage.index');
        }
        //comment
        $comment_view =  $this->comment->comment(array('id' => $detail->id, 'sort' => 'id'));
        //end
        $seo['canonical'] = route('productFrontend.index', ['slug' => $slug, 'id' => $id]);
        $seo['meta_title'] =  !empty($detail['meta_title']) ? $detail['meta_title'] : $detail['title'];
        $seo['meta_description'] = !empty($detail['meta_description']) ? $detail['meta_description'] : cutnchar(strip_tags($detail->description));
        $seo['meta_image'] = $detail['image'];
        return view('product.frontend.product.index', compact('detail', 'seo', 'comment_view'));
    }
    public function getListComment(Request $request)
    {
        $sort = $request->sort;
        $comment_view =  $this->comment->comment(array('id' => $request->productid, 'sort' => $sort));
        return view('product.frontend.product.comment.data', compact('comment_view', 'sort'))->render();
    }
}
