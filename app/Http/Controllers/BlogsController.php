<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogsController extends Controller
{
    public function index()
    {
        return response()->json([
            'blogs' => Blog::take(8)->with('author')->with('categorie')->orderByDesc('created_at')->get()
        ], Response::HTTP_OK);
    }

    public function fetchBlogPosts()
    {
        if (isset($_GET['catfilter'])) {
            $catFilter = $_GET["catfilter"];
        } else {
            $catFilter = 'all';
        }

        if (isset($_GET['authfilter'])) {
            $authFilter = $_GET["authfilter"];
        } else {
            $authFilter = 'all';
        }

        $blogs = Blog::with('author')
            ->with(['categorie' => function ($query) {
                $query->select('name');
            }]);

        if ($catFilter != 'all') {
            $catFilter = json_decode($catFilter);
            $blogs = $blogs->whereHas('categorie', function ($query) use ($catFilter) {
                $query->whereIn('category_id', $catFilter);
            });
        }

        if ($authFilter != 'all') {
            $authFilter = json_decode($authFilter);
            $blogs = $blogs->whereHas('author', function ($query) use ($authFilter) {
                $query->whereIn('author', $authFilter);
            });
        }

        $blogs = $blogs->orderByDesc('created_at')->paginate(10);

        return response()->json(['blogs' => $blogs], Response::HTTP_OK);

    }

    public
    function fetchCategories()
    {
        return response()->json([
            'categories' => Category::has('blogs')->select('id', 'name')->get()
        ], Response::HTTP_OK);
    }

    public
    function fetchAuthors()
    {
        return response()->json([
            'authors' => User::has('blogs')->select('id', 'name')->get()
        ], Response::HTTP_OK);
    }

    public
    function create()
    {
        //
    }

    public
    function store(Request $request)
    {
        //
    }

    public
    function show(Blog $blog)
    {
        if (!isset($_GET['id'])) {
           return null;
        }

        return response()->json([
            'blog' => Blog::where('id', htmlspecialchars($_GET['id']))->with('author')->with('categorie')->get()
        ], Response::HTTP_OK);

    }

    public
    function edit(Blog $blog)
    {
        //
    }

    public
    function update(Request $request, Blog $blog)
    {
        //
    }

    public
    function destroy(Blog $blog)
    {
        //
    }
}
