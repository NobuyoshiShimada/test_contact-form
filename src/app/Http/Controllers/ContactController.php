<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Controllers\ConfirmController;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact()
    {
        $categories = Category::all();

        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        // tel_1, tel_2, tel_3 を結合
        $tel = $request->input('tel_1') . $request->input('tel_2') . $request->input('tel_3');

        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'detail'
        ]);

        $contact['tel'] = $tel;

        // 性別名を取得
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];
        $contact['gender_name'] = $genderMap[$contact['gender']] ?? '';

        // カテゴリ名を取得
        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category->name ?? '';

        $categories = Category::all();

        return view('confirm', compact('contact', 'categories'));
    }


    public function store(Request $request)
    {
        // tel_1, tel_2, tel_3 が存在する場合は結合、そうでない場合は tel をそのまま使用
        if ($request->has('tel_1')) {
            $tel = $request->input('tel_1') . $request->input('tel_2') . $request->input('tel_3');
        } else {
            $tel = $request->input('tel');
        }

        Contact::create([
            'category_id' => $request->input('category_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'tel' => $tel,
            'address' => $request->input('address'),
            'building' => $request->input('building'),
            'detail' => $request->input('detail'),
        ]);

        return view('thanks');
    }
}
