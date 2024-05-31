<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comments;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Display all blogs
    public function index()
    {
        $blogs = Blog::all();
        return view('index', ['blogs' => $blogs]);
    }

    // Show the form for creating a new blog
    public function create()
    {
        $categories = Category::all();
        return view('blogcreate', ['categories' => $categories]);
    }

    // Get all categories and display them
    public function getAllCategories()
    {
        $categories = Category::all();
        return view('tags', ['categories' => $categories]);
    }

    // Store a newly created blog in storage
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'blog_header' => 'required|string|max:255',
            'blog_tekst' => 'required|string',
            'category_id' => 'required',
        ]);

        // Get the ID of the currently authenticated user
        $authorId = auth()->user()->id;

        // Create a new blog post
        Blog::create([
            'author_id' => $authorId,
            'blog_header' => $validatedData['blog_header'],
            'blog_tekst' => $validatedData['blog_tekst'],
            'category_id'  => $validatedData['category_id']
        ]);

        // Redirect to the index route with a success message
        return redirect()->route('index')->with('success', 'Blog created successfully');
    }

    // Store a newly created comment in storage
    public function commentStore(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'blog_id' => 'required|integer',
            'user_name' => 'required|string',
            'user_id' => 'required|integer',
            'comment' => 'required|string',
        ]);

        // Create a new comment
        Comments::create([
            'comment' => $validatedData['comment'],
            'blog_id' => $validatedData['blog_id'],
            'user_id' => $validatedData['user_id'],
            'user_name' => $validatedData['user_name'],
        ]);

        // Redirect back to the previous page
        return back();
    }

    // Display the specified blog along with its comments
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $comments = Comments::where('blog_id', $blog->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate time ago for each comment
        foreach ($comments as $comment) {
            $comment->createdAt = Carbon::parse($comment->created_at);
            $comment->timeAgo = $comment->createdAt->diffForHumans();
        }

        // Return the view with the blog and its comments
        return view('show', compact('blog', 'comments'));
    }

    // Remove the specified comment from storage
    public function destroy($id)
    {
        $comment = Comments::findOrFail($id);
        $comment->delete();

        // Redirect back to the previous page with a success message
        return back()->with('success', 'Comment deleted successfully.');
    }

    // Update the specified comment in storage
    public function update(Comments $comment, Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'comment' => 'nullable',
        ]);

        // Update the comment
        $comment->update($data);

        // Redirect back to the previous page with a success message
        return back()->with('success', 'Comment updated successfully.');
    }

    // Get blogs by the specified category
    public function getBlogsByCategory($categoryId)
    {
        $blogs = Blog::where('category_id', $categoryId)->get();
        return view('BlogsByCategory', ['blogs' => $blogs]);
    }

    // Get blogs by the specified author
    public function getBlogsByAuthor($authorId)
    {
        $blogs = Blog::where('author_id', $authorId)->get();
        return view('BlogsByAuthor', ['blogs' => $blogs]);
    }

    // Get comments for the specified blog post
    public function getComments($postId)
    {
        $comments = Comments::where('blog_id', $postId)->get();
        return view('show', ['comments' => $comments]);
    }
}

