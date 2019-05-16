<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerHasRegistedEvent;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{

    public function __construct()
    {

        $this->middleware('test');
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $customers = Customers::orderBy('updated_at', 'desc')->paginate(10);

        // $activeCustomers = Customers::where('active', 1)->get();

        $customers = Customers::with('company')->get();

        $activeCustomers = Customers::with('company')->active()->get();

        // $inactiveCustomers = Customers::where('active', 0)->get();

        $inactiveCustomers = Customers::with('company')->inActive()->get();

        $companies = Company::with('customers')->get();
        // $activeCustomers = [];
        // $inactiveCustomers = [];
        // $companies = [];

        return view('customers.index', compact(
            'activeCustomers',
            'inactiveCustomers',
            'companies',
            'customers'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $customer = new Customers();

        // dd($customer->active);

        return view('customers.create', compact('activeCustomers', 'inactiveCustomers', 'companies', 'customer'));
    }

    /**
     * validation for this controller
     *
     * @param Request $request
     * @return array
     */
    private function validateRequest(Request $request)
    {
        return  request()->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000'
        ]);
    }

    private function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/') . $customer->image)->fit(300, 300, null, 'top-left');
            // crop
            $image->save();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest($request);

        // dd($data);
        // dd(request());

        // $customer = new Customers($data);
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->active = request('active');
        // $customer->save();

        // mass assign
        $customer = Customers::create($data);

        $this->storeImage($customer);
        // return back();

        event(new NewCustomerHasRegistedEvent($customer));

        return redirect('customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customer)
    {

        // dd($customer);
        $data = $this->validateRequest($request);

        $customer->update($data);
        $this->storeImage($customer);

        return redirect('customers/' . $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customer)
    {
        $customer->delete();
        return redirect('customers');
    }
}
