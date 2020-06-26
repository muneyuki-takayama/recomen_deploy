<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function index() {
        $products = Product::all()->sortByDesc('created_at');

        return view('products/index', ['products' => $products]);
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('products.create', [
            'allTagNames' => $allTagNames,
        ]);
    }

    public function store(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->user_id = $request->user()->id;

        function resizeUpload($request, $product, $fileNum) {
            $image = $request->file($fileNum);
            $extension = $request->file($fileNum)->getClientOriginalExtension();
            $filename = $request->file($fileNum)->getClientOriginalName();
            $hash = md5($filename);

            $resize_img = Image::make($image)
                    ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode($extension);

            Storage::disk('s3')->put($hash, $resize_img, 'public');
            $product->$fileNum = Storage::disk('s3')->url($hash);
        }

        if($request->file('pic1'))
        {
            resizeUpload($request, $product, 'pic1');
        }

        if($request->file('pic2'))
        {
            resizeUpload($request, $product, 'pic2');
        }

        if($request->file('pic3'))
        {
            resizeUpload($request, $product, 'pic3');
        }
        
        $product->save();

        $request->tags->each(function ($tagName) use ($product) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $product->tags()->attach($tag);
        });

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $tagNames = $product->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('products.edit' , [
            'product' => $product,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());

        function resizeUpload($request, $product, $fileNum) {
            $image = $request->file($fileNum);
            $extension = $request->file($fileNum)->getClientOriginalExtension();
            $filename = $request->file($fileNum)->getClientOriginalName();
            $hash = md5($filename);

            $resize_img = Image::make($image)
                    ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode($extension);

            Storage::disk('s3')->put($hash, $resize_img, 'public');
            $product->$fileNum = Storage::disk('s3')->url($hash);
        }

        if($request->file('pic1'))
        {
            resizeUpload($request, $product, 'pic1');
        }

        if($request->file('pic2'))
        {
            resizeUpload($request, $product, 'pic2');
        }

        if($request->file('pic3'))
        {
            resizeUpload($request, $product, 'pic3');
        }

      $product->tags()->detach();
      $request->tags->each(function ($tagName) use ($product) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $product->tags()->attach($tag);
      });

     $product->save();

     return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function like(Request $request, Product $product)
    {
        $product->likes()->detach($request->user()->id);
        $product->likes()->attach($request->user()->id);

        return [
            'id' => $product->id,
            'countLikes' => $product->count_likes,
        ];
    }

    public function unlike(Request $request, Product $product)
    {
        $product->likes()->detach($request->user()->id);

        return [
            'id' => $product->id,
            'countLikes' => $product->count_likes,
        ];
    }
}
