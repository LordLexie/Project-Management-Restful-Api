<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Http\Requests\V1\CustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    public function index()
    {
        return new CustomerCollection(Customer::all());
    }

    public function show(Customer $customer)
    {
        return CustomerResource::make($customer);
    }

    public function store(CustomerRequest $request)
    {
        $data = $request->validated();
        $customer = new Customer();

        $customer->first_name = $request->has('first_name') ? $request['first_name'] : null;
        $customer->other_name = $request->has('other_name') ? $request['other_name'] : null;
        $customer->last_name = $request->has('last_name') ? $request['last_name'] : null;
        $customer->phone = $request->has('phone') ? $request['phone'] : null;
        $customer->email = $request->has('email') ? $request['email'] : null;
        $customer->organization = $request->has('organization') ? $request['organization'] : null;
        $customer->address_one = $request->has('address_one') ? $request['address_one'] : null;
        $customer->address_two = $request->has('address_two') ? $request['address_two'] : null;
        $customer->folder_id = Str::uuid();
        $customer->save();

        return CustomerResource::make($customer);
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $data = $request->validated();

        $customer->first_name = $request->has('first_name') ? $request['first_name'] : null;
        $customer->other_name = $request->has('other_name') ? $request['other_name'] : null;
        $customer->last_name = $request->has('last_name') ? $request['last_name'] : null;
        $customer->phone = $request->has('phone') ? $request['phone'] : null;
        $customer->email = $request->has('email') ? $request['email'] : null;
        $customer->organization = $request->has('organization') ? $request['organization'] : null;
        $customer->address_one = $request->has('address_one') ? $request['address_one'] : null;
        $customer->address_two = $request->has('address_two') ? $request['address_two'] : null;
        $customer->update();

        return CustomerResource::make($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
    }
}
