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

    $opini_articles = ArticleNews::whereHas('category', function ($query) {
      $query->where('name', 'Opini');
    })
      ->where('is_featured', 'not_featured')
      ->latest()
      ->take(6)
      ->get();

    $opini_featured_articles = ArticleNews::whereHas('category', function ($query) {
      $query->where('name', 'Opini');
    })
      ->where('is_featured', 'featured')
      ->inRandomOrder()
      ->first();

    $pendidikan_articles = ArticleNews::whereHas('category', function ($query) {
      $query->where('name', 'Pendidikan');
    })
      ->where('is_featured', 'not_featured')
      ->latest()
      ->take(6)
      ->get();

    $pendidikan_featured_articles = ArticleNews::whereHas('category', function ($query) {
      $query->where('name', 'Pendidikan');
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
      'kesehatan_featured_articles',
      'opini_articles',
      'opini_featured_articles',
      'pendidikan_articles',
      'pendidikan_featured_articles'
    ));
  }

  public function details($slug)
  {
    return view('front.details', compact('slug'));
  }

  public function category(Category $category)
  {
    $categories = Category::all();

    $bannerAds = BannerAdvertisement::where('is_active', 'active')
      ->where('type', 'banner')
      ->inRandomOrder()
      ->first();

    return view('front.category', compact('category', 'categories', 'bannerAds'));
  }

  public function author(Author $author)
  {
    $categories = Category::all();

    $bannerAds = BannerAdvertisement::where('is_active', 'active')
      ->where('type', 'banner')
      ->inRandomOrder()
      ->first();

    return view('front.author', compact('author', 'categories', 'bannerAds'));
  }

  public function search(Request $request)
  {
    $request->validate([
      'keyword' => ['required', 'string', 'max:255']
    ]);

    $categories = Category::all();

    $keyword = $request->keyword;

    $articles = ArticleNews::with(['category', 'author'])
      ->where('name', 'like', '%' . $keyword . '%')->paginate((6));

    $bannerAds = BannerAdvertisement::where('is_active', 'active')
      ->where('type', 'banner')
      ->inRandomOrder()
      ->first();

    return view('front.search', compact('articles', 'categories', 'keyword', 'bannerAds'));
  }
}
