<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;
use App\Events\UserAndAdminPostComment;

class ApplicationNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $notes = Note::where('application_id', $id)->with(['application.user','admin'])->get();
        $notes = Note::where('liquor_application_id', $id)->with(['liquorApplication.user','admin'])->get();
        return $notes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // return $request->all();
        try {
            $this->validate($request, [
                'message'   => 'required'
            ]);

            $note = new Note;
            $note->liquor_application_id = $id; 
            $note->message = $request->message;
            $note->admin_id = Auth::guard('admin')->user() ? Auth::guard('admin')->user()->id : null;
            $note->user_id = Auth::guard('web')->user() ? Auth::guard('web')->user()->id : null;
            $note->save();

            event(new UserAndAdminPostComment($note));
    
            return response()->json(["note" => $note, "message" => "You have posted a comment."]);
            
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Error',
                'errors' => $exception->errors(),
            ], 422);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
