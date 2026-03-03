<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::with('category');

        // =============================
        // キーワード（名前・メール）
        // =============================
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ['%' . $request->keyword . '%'])
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        // =============================
        // 性別
        // =============================
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // =============================
        // カテゴリ
        // =============================
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // =============================
        // 日付
        // =============================
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7)   // 1ページ7件表示
            ->onEachSide(2) // ← 前後2ページずつ表示（合計5）
            ->appends($request->query());

        $categories = Category::all();

        return view('admin.admin', compact('contacts', 'categories'));
    }

    public function show(Contact $contact)
    {
        return view('admin.show', compact('contact'));
    }
}
