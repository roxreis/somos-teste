<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function saveCategory(Request $request)
   {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create($request->all());
        return redirect()->route('createTask');
   }
}
