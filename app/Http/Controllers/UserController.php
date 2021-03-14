<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
    use Illuminate\Support\Str;
    use Auth;

    class UserController extends Controller
    {

        public function store(Request $request) {

            $newUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $newUser->roles()->attach([1,2]);//admin e guest


            return $newUser;
        }

        public function login(Request $request){

            if ($key = auth()->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'key' => $key
                ], 200);
            }

            return response()->json([
                'message' => 'e-mail ou senha inválidos'
            ], 400);
        }

        public function show(Request $request) {
            #return auth()->user();
            dd(auth()->payload()->toArray());
        }
    }