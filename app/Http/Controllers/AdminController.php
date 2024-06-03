<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_admins;
use App\Models\user_client;
use App\Models\restoran;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function submit(Request $req)
    {
        // Validate and create the admin user
        $validateFields = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (user_admins::where('email', $validateFields['email'])->exists()) {
            return redirect(route('admin.registr_admin'))->withErrors([
                'forError' => 'Ошибка при регистрации'
            ]);
        }

        $user_admins = user_admins::create($validateFields);

        if ($user_admins) {
            // Log in the admin user using the admin guard
            Auth::guard('admin')->login($user_admins);
            $user_clients = user_client::orderBy('id', 'asc')->get();
            $data = []; // инициализируйте $data
            return view('admin.all_user', compact('user_clients', 'data'));
        }

        return redirect(route('admin.admin_login'))->withErrors([
            'forError' => 'Ошибка при регистрации'
        ]);
    }

    public function date()
    {
        if (Auth::guard('admin')->check()) {
            $user_clients = user_client::orderBy('id', 'asc')->get();
            return view('admin.all_user', compact('user_clients'));
        }
        return view('admin.admin_login');
    }

    public function show($id)
    {
        $user_client = user_client::find($id);
        return view('admin.user_table', ['data' => $user_client]);
    }

    public function update($id)
    {
        $user_client = user_client::find($id);
        return view('admin.update_user', ['data' => $user_client]);
    }

    public function update_submit($id, Request $req)
    {
        $user_client = user_client::find($id);
        $user_client->name = $req->input('name');
        $user_client->email = $req->input('email');
        $user_client->password = $req->input('password');
        $user_client->save();
        return redirect()->route('admin.login_date_show', $id);
    }

    public function user_delete($id)
    {
        user_client::find($id)->delete();
        return redirect()->route('admin.user_table');
    }

    public function show_all_restoran()
    {
        if (Auth::guard('admin')->check()) {
            $restoran = restoran::orderBy('id', 'asc')->get();
            return view('create.show_all_restoran', compact('restoran'));
        }
        return view('admin.admin_login');
    }

    public function create_restoran(Request $req)
    {
        $originalName = $req->file('file_video')->getClientOriginalName();
        $path = $req->file('file_video')->storeAs('public/video', $originalName);
        $imgoriginalName = $req->file('file_poster')->getClientOriginalName();
        $imgpath = $req->file('file_poster')->storeAs('public/img', $imgoriginalName);
        $data = [
            'tittle' => $req->input('tittle') ?? 'Default Title',
            'description' => $req->input('description'),
            'category' => $req->input('category'),
            'file_video' => $originalName,
            'file_poster' => $imgoriginalName,
        ];
    
        $restoran = restoran::create($data);
    
        if (!$restoran) {
            // The create method failed to insert the new record
            // You can check the error message by calling $req->getErrorMsg()
            return redirect()->back()->withErrors(['create_restoran' => $req->getErrorMsg()]);
        }
    
        // Retrieve all restoran objects from the database
        $all_restoran = restoran::all();
    
        return view('create.show_all_restoran', ['restoran' => $all_restoran, 'path' => $path, 'imgpath' => $imgpath]);
    }
    
    public function video($id)
    {
        $restoran = restoran::find($id);
        return view('create.video', compact('restoran'));
    }
    

    
    public function update_vidoe($id)
    {
        $restoran = restoran::find($id);
        return view('admin.update_video', ['data' => $restoran]);
    }

    public function update_video_submit($id, Request $req)
    {
        $restoran = restoran::find($id);
        $restoran->status = $req->input('status');
        $restoran->save();
        return redirect()->route('admin.restoran', $id);
    }
}