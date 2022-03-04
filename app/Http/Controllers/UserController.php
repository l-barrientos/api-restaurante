<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //Se emulan datos de una base de datos con el siguiente array:
    public $users =  [
        [
            "nombre" => "user1",
            "email" => "user1@mail.com",
        ],
        [
            "nombre" => "user2",
            "email" => "user2@mail.com",
        ],
        [
            "nombre" => "user3",
            "email" => "user3@mail.com",
        ],
    ];

    public function allUsers()
    {
        //En vez de utilizar el modelo, se devuelve el array $users emulando 
        //una llamada a la base de datos, pero en un caso real se haría una llamada
        //al método ::all() del modelo User

        return $this->users;
    }
    public function getUserById($id)
    {
        //Emulamos el método ::find($id) del modelo User
        return $this->users[$id - 1];
    }
    public function postSomething(Request $request)
    {
        //En el argumento $request, se almacenan todos los datos enviados por el método post
        // Ej. se pasa por post el parámetro "edad" con valor 21. $request->edad será igual a 21.

        //Una vez obtenidos estos datos de la variable $request, se puede operar con ellos a través del 
        //modelo. Por ejemplo se podrían pedir datos para un nuevo usuario (nombre, email), 
        //crear una instancia del modelo y asignarle los valores de la request a las porpiedades pertinentes
        //y guardarlo en la bbdd con el método ->save()

        //Finalmente, se devuelve un json con un código de estado y los datos enviados para confirmar 
        // que se ha realizado correctamente una acción

        return response()->json([
            "status" => "OK",
            "nombre" => $request->nombre,
            "email" => $request->email
            //probar a devolver también el campo apellidos
        ]);
    }
    public function postOtherThing(Request $request)
    {
        // Crear una función en la que si se pasa el parámetro "premium" a true en el $request, 
        // devuelva un código de estado "OK" y un mensaje "el usuario es premium". 
        // En caso de que se le pase premium false, devolver un código de estado "KO" y mensaje "error: usuario no premium"
    }
    public function deleteSomething(Request $request)
    {
        // igual que la función anterior pero con un método de tipo delete 
    }
}
