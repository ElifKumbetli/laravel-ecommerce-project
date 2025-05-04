<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $returnUrl;
    public $fileRepo;

    /**
     * İstekten gelen verileri, modelin $fillable alanlarına göre hazırlar
     *
     * @param \Illuminate\Http\Request $request
     * @param array $fillables
     * @return array
     */

    public function prepare($request, $fillables): array
    {
        $data = array();
        foreach ($fillables as $fillable) {
            if ($request->has($fillable)) {
                $data[$fillable] = $request->get($fillable);
            } else {
                if (Str::of($fillable)->startsWith("is_")) { //boolean bir değer ise
                    $data[$fillable] = 0;
                }
            }
        }
        return $data;
    }
}
