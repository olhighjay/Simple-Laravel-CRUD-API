<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PersonResourceCollection;
use App\Http\Resources\PersonResource;
use App\Models\Person;

class PersonController extends Controller
{
    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    public function index():PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate(25));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
        ]);

        $person = Person::create($request->all());
        return new PersonResource($person);
    }

    public function update(Request $request, Person $person)
    {
        $person->update($request->all());
        return new PersonResource($person); 
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return response()->json();
    }

    public function somePersons()
    {
        $persons  = Person::find([1,3,5,7,9]);
        $data = $persons;
        return new PersonResource($persons); 
    }


}
