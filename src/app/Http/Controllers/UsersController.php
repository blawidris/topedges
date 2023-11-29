<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserKYC;
use App\Mail\DeleteAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('frontend.profile.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('frontend.profile.create', $data);
    }

    /**s
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        $validate = $this->validator($request->all());

        if ($validate->fails()) {
            return back()->with(['status' => 'error', 'message' => $this->validator($request->all())->errors()->first()], 400);
        }

        $image = null;

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
            ]);

            $request->dir = 'users/';

            // remove existing image
            $user = User::where('id', $request->user_id)->first();

            if ($user->image) {
                Storage::delete($user->image);
            }

            $image = $this->uploadImage($request);
        }

        $name = explode(' ', $request->name);
        $referal_code = $name[0].$this->generate_random_number(4);

        $data = [
            'f_name' => $name[0],
            'l_name' => $name[1],
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'image' => $image,
            'status' => 1,
            'referal_code' => strtolower($referal_code)
        ];

        if (User::where('id', $request->user_id)->update($data)) {
            return redirect('/profile/verify')->with(['status' => 'success', 'message' => 'Profile completed successfully']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = [
            'user' => Auth::user()
        ];

        return view('frontend.profile.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $validate = $this->validator($request->all());

        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'message' => $this->validator($request->all())->errors()->first()], 400);
        }

        $image = Auth::user()->image ?? null;

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
            ]);

            $request->dir = 'users';

            // remove existing image
            $user = User::where('id', $request->user_id)->first();

            if ($user->image) {
                Storage::delete($user->image);
            }

            $image = $this->uploadImage($request);
        }

        $name = explode(' ', $request->name);

        $data = [
            'f_name' => $name[0],
            'l_name' => $name[1],
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'image' => $image
        ];

        if (User::where('id', $request->user_id)->update($data)) {
            return redirect('/profile')->with(['status' => 'success', 'message' => 'Profile completed successfully']);
        }
    }

    /**
     * Account verification.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify_account()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('frontend.profile.kyc-verify', $data);
    }


    public function post_verify(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'type' => 'required|string',
            'number' => 'required|string|min:8',
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        if ($validator->fails()) {
            return back()->with(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        // image upload
        $request->dir = 'userskyc';
        $newImage = $this->uploadImage($request);

        $data = [
            'user_id' => $request->user_id,
            'identity_type' => $request->type,
            'identity_number' => $request->number,
            'identity_image' => $newImage,
            'status' => 1
        ];

        if (UserKYC::create($data)) {
            return redirect('dashboard')->with(['status' => 'success', 'message' => 'Verification details submitted successfully']);
        }
    }

    public function update_verify(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'type' => 'required|string',
            'number' => 'required|string|min:8',
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        if ($validator->fails()) {
            return back()->with(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        // image upload
        $request->dir = 'userskyc/';
        $newImage = $this->uploadImage($request);

        $data = [
            'user_id' => $request->user_id,
            'identity_type' => $request->type,
            'identity_number' => $request->number,
            'identity_image' => $newImage,
            'status' => 1
        ];

        if (UserKYC::where('user_id', Auth::id())->update($data)) {
            return redirect('dashboard')->with(['status' => 'success', 'message' => 'Verification details submitted successfully']);
        }
    }


    function change_password(Request $request){

    }

    function deleteAccount(){
        $user_id = Auth::id();

        $user =  Auth::user();

        Mail::to($user->email)->send(new DeleteAccount($user));
        return back()->with(['status' => 'info', 'message' => 'You have deleted your account']);
    }

    private function validator($data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'gender' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'address' => ['required'],
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);
    }
}
