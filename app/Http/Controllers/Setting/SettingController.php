<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Repository\Setting\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $Setting;

    public function __construct(SettingRepositoryInterface $Setting)
    {
        return $this->Setting = $Setting;
    }

    public function index()
    {
        return $this->Setting->index();
    }

    public function update(Request $request)
    {
        return $this->Setting->update($request);
    }
}
