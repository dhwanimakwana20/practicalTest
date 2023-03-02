<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminders = Reminder::where('user_id',auth()->user()->id)->get();
        return view('index',compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'datetime' => 'required'
        ]);
        $reminder = new Reminder;
        $reminder->title = $request->title;
        $reminder->user_id = auth()->user()->id;
        $reminder->description = $request->description;
        $reminder->datetime = $request->datetime;
        $reminder->save();

        return redirect('home')->with('status','Reminder has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reminder = Reminder::find($id);
        return view('edit',compact('reminder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'datetime' => 'required'
        ]);
        $reminder = Reminder::find($request->id);
        $reminder->title = $request->title ?? '';
        $reminder->description = $request->description ?? '';
        $reminder->datetime = $request->datetime ?? '';
        $reminder->save();

        return redirect('home')->with('status','Reminder has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reminder = Reminder::find($id);
        if($reminder){
            $reminder->delete();
        }
        
        return response()->json(['status' => 'User Deleted Successfully!']);
    }
}
