<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class AddressController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/users/{}/address";
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user): View
    {
        $addrs = $user->addrs;
        return view('backend.addresses.index', ["addrs" => $addrs, "user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user): View
    {
        return view('backend.addresses.insert_form', ["user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(User $user, AddressRequest $request): RedirectResponse
    {
        $addr = new Address();
        $data = $this->prepare($request, $addr->getFillable());
        $addr->fill($data);
        $addr->save();

        $this->editReturnUrl($user->user_id);
        return Redirect::to($this->returnUrl);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Address $address): View
    {
        return view('backend.addresses.update_form', ["user" => $user, "addr" => $address]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, User $user, Address $address): RedirectResponse
    {
        $data = $this->prepare($request, $address->getFillable());
        $address->fill($data);

        $address->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Address $address): JsonResponse
    {

        $address->delete();
        return response()->json(["message" => "Done", "id" => $address->address_id]);
    }

    private function editReturnUrl($id)
    {
        $this->returnUrl = "/users/$id/addresses";
    }
}
