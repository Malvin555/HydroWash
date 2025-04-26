<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? '';
        $order = $request->input('sort') ?? 'desc';
        $perPage = 6;

        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'desc';
        }

        // Force page to 1 if it's an AJAX request
        if ($request->ajax()) {
            $request->merge(['page' => 1]);
        }

        $users = User::where('role', 'user')
            ->search($search)
            ->orderBy('created_at', $order)
            ->paginate($perPage)
            ->withQueryString()
            ->setPath(url(route('manage-users')));


        $paginationHtml = null;
        if ($request->ajax() && $users->count() > 0) {
            $paginationHtml = $users->links('pagination.history-user-pagination')->toHtml();
        }

        // For AJAX requests, at search feature. 
        if ($request->ajax()) {
            return response()->json([
                "status" => "success",
                "message" => "Canceled services retrieved successfully",
                "data" => $users->items(),
                'pagination' => $paginationHtml,
            ], 200);
        }
        return view('pages.manage-users-admin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username-add' => 'required|string|max:255',
            'email-add' => 'required|email|unique:users,email',
            'password-add' => 'required|min:6',
        ], [
            'username-add.required' => 'Username is required',
            'username-add.string' => 'Username must be a string',
            'username-add.max' => 'Username maximum 255 characters',

            'email-add.required' => 'Email is required',
            'email-add.email' => 'Email is not valid',
            'email-add.unique' => 'Email already registered',

            'password-add.required' => 'Password is required',
            'password-add.min' => 'Password minimum 6 characters',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput()->with('show_modal', 'modalAddUser');
        }

        User::create([
            'name' => $request->input('username-add'),
            'email' => $request->input('email-add'),
            'role' => 'user',
            'password' => Hash::make($request->input('password-add')),
            'created_who' => $request->username_add,
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::withCount(['laundry', 'ironing', 'feedback', 'canceled'])
            ->withSum('transaction', 'price_transaction')
            ->findOrFail($id);

        $serviceCreated = $user->laundry_count + $user->ironing_count;
        $feedbackCreated = $user->feedback_count;
        $canceledService = $user->canceled_count;
        $amountPayedTotal = $user->transaction_sum_price_transaction;

        return response()->json([
            "status" => "success",
            "message" => "Canceled services retrieved successfully",
            "data" => $user,
            'serviceCreated' => $serviceCreated,
            'feedbackCreated' => $feedbackCreated,
            'canceledService' => $canceledService,
            'amountPayedTotal' => $amountPayedTotal
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            "status" => "success",
            "message" => "User retrieved successfully",
            "data" => $user,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');

        if (empty($id)) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'nullable|string|max:255',
            'telp' => ['nullable', 'regex:/^(\+62|62|08)[0-9]{9,13}$/'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput()->with('show_modal', 'modalEditUser');
        }

        $user = User::findOrFail($id);
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->telp = $request->input('telp');
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('role', 'user')->findOrFail($id);

        if ($user->laundry()->exists() || $user->ironing()->exists()) {
            return redirect()->back()->with('error', 'User cannot be deleted because it has laundry or ironing data.');
        }

        $user->feedback()->delete();
        $user->transaction()->delete();
        $user->delete();

        return redirect()->back()->with('success', 'User and related data deleted successfully.');
    }
}
