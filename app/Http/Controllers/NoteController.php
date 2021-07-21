<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Employee;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Note::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'employee_id' => 'required|integer',
            'restaurant_id' => 'required|integer'
        ]);

        $employee = Employee::find($fields['employee_id']);
        $restaurant = Restaurant::find($fields['restaurant_id']);

        if($employee == null){
            $response = ['state' => 'Employee not found.'];
            return response($response, 404);
        }
        else if($restaurant == null){
            $response = ['state' => 'Restaurant not found.'];
            return response($response, 404);
        }else{

            $note = Note::create($request->all());

            $response = [
                'state' => 'Note was added.',
                'note' => $note
            ];
            return response($response, 201);
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
        return Note::find($id);
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
        $note = Note::find($id);

        if($note != null){

            $fields = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'employee_id' => 'required|integer',
                'restaurant_id' => 'required|integer'
            ]);
    
            $employee = Employee::find($fields['employee_id']);
            $restaurant = Restaurant::find($fields['restaurant_id']);
    
            if($employee == null){
                $response = ['state' => 'Employee not found.'];
                return response($response, 404);
            }
            else if($restaurant == null){
                $response = ['state' => 'Restaurant not found.'];
                return response($response, 404);
            }else{
                $note->update($request->all());
                return $note;
            }

        }else{
            $response = ['state' => 'Note not found.'];
            return response($response, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Note::destroy($id);
    }
}
