<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(7);
        $categories = Category::all();
        return view('admin.index', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->name . '%')
                    ->orWhere('last_name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);
        $categories = Category::all();
        return view('admin.index', compact('contacts', 'categories'));
    }

    public function reset()
    {
        return redirect('/admin');
    }

    public function delete(Request $request)
    {
        Contact::destroy($request->id);
        return redirect('/admin');
    }
}
