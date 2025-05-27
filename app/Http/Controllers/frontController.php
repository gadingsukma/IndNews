<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\BannerAdvertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class frontController extends Controller
{
  public function index()
  {
    $categories = Category::all();

    $articles = ArticleNews::with(['category'])
      ->where('is_featured', 'not_featured')
      ->latest()
      ->take(3)
      ->get();

    $featured_articles = ArticleNews::with(['category'])
      ->where('is_featured', 'featured')
      ->latest()
      ->take(3)
      ->get();

    $authors = Author::all();

    $bannerAds = BannerAdvertisement::where('is_active', 'active')
      ->where('type', 'banner')
      ->inRandomOrder()
      ->first();

    $kesehatan_articles = ArticleNews::whereHas('category', function ($query) {
      $query->where('name', 'Kesehatan');
    })
      ->where('is_featured', 'not_featured')
      ->latest()
      ->take(6)
      ->get();

    $kesehatan_featured_articles = ArticleNews::whereHas('category', function ($query) {
      $query->where('name', 'Kesehatan');
    })
      ->where('is_featured', 'featured')
      ->inRandomOrder()
      ->first();



    return view('front.index', compact(
      'categories',
      'articles',
      'authors',
      'featured_articles',
      'bannerAds',
      'kesehatan_articles',
      'kesehatan_featured_articles'
    ));
  }

  public function details($slug)
  {
    return view('front.details', compact('slug'));
  }

  public function category($slug)
  {
    return view('front.category', compact('slug'));
  }

  public function author($slug)
  {
    return view('front.author', compact('slug'));
  }

  public function search(Request $request)
  {
    $query = $request->input('query');
    return view('front.search', compact('query'));
  }
}
