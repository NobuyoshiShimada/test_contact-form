<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // クエリビルダーの初期化
        $query = Contact::query();

        // キーワード検索（名前またはメールアドレス）
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('first_name', 'like', "%$keyword%")
                  ->orWhere('last_name', 'like', "%$keyword%")
                  ->orWhere('email', 'like', "%$keyword%");
        }

        // 性別フィルター
        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        // カテゴリーフィルター
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // 日付フィルター
        if ($request->filled('search_date')) {
            $query->whereDate('created_at', $request->input('search_date'));
        }

        $contacts = $query->get();
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }
}