<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth')->except(['index']);
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();
        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get();

        //$customers = Customer::all();

        //long way
        // return view('internals.customers', [
        //     'activeCustomers' => $activeCustomer,
        //     'inactiveCustomers' => $inactiveCustomer,
        // ]);
        //return view('customers.index', compact('activeCustomers', 'inactiveCustomers'));
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer(); //create an empty customer


        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        //valdate the request
        //$data =
        //dd($data);
        $customer = Customer::create($this->validateRequest());

        event(new NewCustomerHasRegisteredEvent($customer));

        //long form
        // $customer = new Customer();
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->title = request('title');
        // $customer->phone = request('phone');
        // $customer->active = request('active');

        //$customer->save();

        //return redirect('customers');
        //dd(request('name'));
    }

    public function show(Customer $customer) //we are doing route model binding, this is where the web route parameter and this typed hinting is the same
    {
        //dd($customer);

        //fetch the customer
        //$customer = Customer::find($customer);
        //$customer = Customer::where('id', $customer)->firstOrFail();
        //dd($customer);

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {


        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'title' => 'required|min:2',
            'phone' => 'required',
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }
}
