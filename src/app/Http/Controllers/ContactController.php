<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact.index', compact('categories'));
    }
    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        // 電話番号を結合
        $contact['tel'] =
            $request->tel1 . '-' .
            $request->tel2 . '-' .
            $request->tel3;

        // カテゴリ名を取得
        $category = Category::find($request->category_id);
        $contact['category_name'] = $category->content;
        return view('contact.confirm', compact('contact'));
    }
    public function store(Request $request)
    {
        $tel = $request->tel1 . $request->tel2 . $request->tel3;
        Contact::create([
            'category_id' => $request->category_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $tel,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->detail,
        ]);

        return view('contact.thanks');
    }
}
