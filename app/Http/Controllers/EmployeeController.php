<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        return Employee::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employee::find($id);
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
        $employee = Employee::find($id);

        $employee->update($request->all());

        return $employee;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Employee::destroy($id);
    }

    /**
     * Search for a email.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function search($email)
    {
        return Employee::where('email', 'like', '%'.$email.'%')->get();
    }

    /**
     * Attach to restaurant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attach(Request $request)
    {
        $fields = $request->validate([
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
        }
        else if($employee->restaurants()->count() == 3){
            $response = ['state' => 'Employee connected with max count of restaurants.'];
            return response($response, 405);
        }
        else if($restaurant->employees()->count() == 5){
            $response = ['state' => 'No place in the restaurant for new employee.'];
            return response($response, 405);
        }
        else if($restaurant->employees->contains($fields['employee_id'])){
            $response = ['state' => 'Connection already exists.'];
            return response($response, 405);
        }
        else{
            $employee->restaurants()->attach($fields['restaurant_id']);
            $response = ['state' => 'Connected successfully.'];
            return response($response, 201);
        }
    }

     /**
     * Detach to restaurant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detach(Request $request)
    {
        $fields = $request->validate([
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
        }
        else if(!$restaurant->employees->contains($fields['employee_id'])){
            $response = ['state' => 'Connection no exists.'];
            return response($response, 405);
        }
        else{
            $employee->restaurants()->detach($fields['restaurant_id']);
            $response = ['state' => 'Disconnected successfully.'];
            return response($response, 201);
        }
    }
}
