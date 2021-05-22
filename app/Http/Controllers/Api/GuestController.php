<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGuestRequest;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function store(CreateGuestRequest $request)
    {
        return User::create($request->validated());
    }
}
