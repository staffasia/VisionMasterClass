<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class ProfileController extends Controller {

    public $successStatus = 200;

    public function index() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

}
