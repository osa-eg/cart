<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaseModel;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class ToggleUserActiveController extends Controller
{

    public function __invoke(User $user)
    {
        $user->update(['active' => !$user->active]);
        updated();
        return back();
    }
}
