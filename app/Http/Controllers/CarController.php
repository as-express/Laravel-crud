<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function list() {
        $cars = auth()->user()->cars;
        return view('list', ['cars' => $cars]);
    }

    public function insert(Request $request) {
        $data = $request->validate([
            'mark' => 'required', 
            'model' => 'required',
            'type' => 'required',
            'hp' => 'required|numeric',
            'price' => 'required|numeric'
        ]);
        $data['user_id'] = auth()->id();

        $newCar = Car::create($data);
        
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() .'_'. $file->getClientOriginalName();
            $path = $file->storeAs('avatars', $filename, 'public');

            $newCar->avatar = $path;
            $newCar->save();
        };

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
            'avatar' => 'nullable',
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
        if($car->avatar) {
            Storage::disk('public')->delete($car->avatar);
        }

        $car->delete();
        return redirect(route(('list')));
    }
}
