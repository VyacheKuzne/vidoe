<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User_client;
use App\Models\restoran;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function submit(Request $req)
{
    $valiidateFields = $req->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if(User_client::where('email', $valiidateFields['email'])->exists()){
        return redirect(route('log_in.registr'))->withErrors([
            'forError' => 'Ошибка при регистрации'
        ]);
    }
 
    $user = User_client::create($valiidateFields);

    if ($user) {
        Auth::login($user);
        return redirect(route('log_in.index'));
    }

    return redirect(route('log_in.login'))->withErrors([
        'forError' => 'Ошибка при регистрации'
    ]);
}
public function index(Request $req){
    $restoran = restoran::orderBy('created_at', 'asc')->get();
    $data = []; // инициализируйте $data
    return view('pages.index', compact('restoran', 'data'));
}
public function guest(Request $req){
    $restoran = restoran::orderBy('created_at', 'desc')->get();
    $data = []; // инициализируйте $data
    return view('pages.index', compact('restoran', 'data'));
}


public function video($id)
{
    $restoran = restoran::find($id);
    return view('create.video', compact('restoran'));
}


public function create()
{
    if (Auth::check()) {
        return redirect(route('log_in.create_restoran'));
    }
    return view('aotitification.login');
}
public function add_vidoe()
{
    if (Auth::check()) {
        return redirect(route('log_in.add_vidoe'));
    }
    return view('aotitification.login');
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
    
        return view('pages.index', ['restoran' => $all_restoran, 'path' => $path, 'imgpath' => $imgpath]);
    }
}
