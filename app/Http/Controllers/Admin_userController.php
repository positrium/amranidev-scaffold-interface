<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin_user;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Admin_userController.
 *
 * @author  The scaffold-interface created at 2017-05-31 03:25:51am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Admin_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - admin_user';
        $admin_users = Admin_user::paginate(6);
        return view('admin_user.index',compact('admin_users','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - admin_user';
        
        return view('admin_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin_user = new Admin_user();

        
        $admin_user->name = $request->name;

        
        $admin_user->mail = $request->mail;

        
        
        $admin_user->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new admin_user has been created !!']);

        return redirect('admin_user');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - admin_user';

        if($request->ajax())
        {
            return URL::to('admin_user/'.$id);
        }

        $admin_user = Admin_user::findOrfail($id);
        return view('admin_user.show',compact('title','admin_user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - admin_user';
        if($request->ajax())
        {
            return URL::to('admin_user/'. $id . '/edit');
        }

        
        $admin_user = Admin_user::findOrfail($id);
        return view('admin_user.edit',compact('title','admin_user'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $admin_user = Admin_user::findOrfail($id);
    	
        $admin_user->name = $request->name;
        
        $admin_user->mail = $request->mail;
        
        
        $admin_user->save();

        return redirect('admin_user');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/admin_user/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$admin_user = Admin_user::findOrfail($id);
     	$admin_user->delete();
        return URL::to('admin_user');
    }
}
