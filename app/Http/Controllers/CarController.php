<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function list() {
        $cars = Car::all();
        return view('list', ['cars' => $cars]);
    }

    public function insert(Request $request) {
        $data = $request->validate([
            'mark' => 'required', 
            'model' => 'required',
            'type' => 'required',
            'hp' => 'required|numeric',
            'price' => 'required|numeric', 
        ]);
        

        $newCar = Car::create($data);
        return redirect(route(('list')));
    }

    public function insertInterface(Request $request) {
        return view('insert');
    }

    public function updateInterface(Request $request) {
        return view('insert');
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'mark' => 'nullable', 
            'model' => 'nullable',
            'type' => 'nullable',
            'hp' => 'nullable|numeric',
            'price' => 'nullable|numeric', 
        ]);

        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('car.list')->with('error', 'Car not found!');
        }

        $car->update($data);
        return redirect(route(('list')));
    }

    public function remove(Request $request) {
        $car = Car::findOrFail($request->id);
        $car->delete();

        return redirect(route(('list')));
    }
}
