<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $returnUrl;
    public $fileRepo;

    public function prepare($request, $fillable): array
    {
        $this->returnUrl = url()->previous();
        $this->fileRepo = $fillable;
        return $request->only($fillable);
    }
}
