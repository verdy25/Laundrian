<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $LaundryTypes = LaundryType::all();
        return $LaundryTypes;
    }
}
