<?php

namespace App\Http\Controllers;

use App\Http\Libraries\BaseApi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = (new BaseApi)->index("/user"); // /user = url di fake API nya
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = [
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'picture' => $request->input('picture')
        ];
        
        $response = (new BaseApi)->create('/user/create', $payload);

        if ($response->failed()) {
            $errors = $response->json('data');
            $messages = "<ul>";

            foreach ($errors as $key => $msg) {
                $messages .= "<li>$key: $msg</li>";
            }

            $messages .= "</ul>";

            return redirect()->back()->with('error', "<b>Failed Saved Data</b> <br> $messages");
        }

        return redirect(route('users.index'))->with('success', 'Data Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = (new BaseApi)->detail('/user', $id);

        return view('user.show', ['user' => $response->json()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = (new BaseApi)->detail('/user', $id);

        return view('user.edit', ['user' => $response->json()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payload = [
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'picture' => $request->input('picture')
        ];
        
        $response = (new BaseApi)->update("/user", $id, $payload);

        if ($response->failed()) {
            $errors = $response->json('data');
            $messages = "<ul>";

            foreach ($errors as $key => $msg) {
                $messages .= "<li>$key: $msg</li>";
            }

            $messages .= "</ul>";

            return redirect()->back()->with('error', "<b>Failed Updated Data</b> <br> $messages");
        }

        return redirect(route('users.index'))->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = (new BaseApi)->delete('/user', $id);

        if ($response->failed()) {
            return redirect('users')->with('error', 'Failed Deleted Data');
        }

        return redirect('users')->with('success', 'Data Deleted Successfully');
    }
}
