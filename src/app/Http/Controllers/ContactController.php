<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact.index', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->all();
        return view('contact.confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail',
        ]);
        Contact::create($contact);

        return redirect('/thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }
}
