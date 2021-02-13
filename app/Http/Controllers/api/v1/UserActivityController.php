<?php
//Registering a user.
/**
 * @OA\Post(
 * path="/api/v1/user/register",
 * summary="Register a user",
 * description="Credentials: name, email, password",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"name","email","password"},
 *       @OA\Property(property="name", type="string", format="text", example="John"),
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *     )
 * )
 */

//login documentation
/**
 * @OA\Post(
 * path="/api/v1/user/login",
 * summary="Sign in",
 * description="Login by email, password",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"email","password"},
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     )
 * )
 */

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserActivityController extends Controller
{
    //Register a user
    public function register(Request $request)
    {
        //Validating and storing a users data in a variable
        $register = Validator::make($request->all(), [
            'name' => 'bail|required|string|min:2',
            'email' => 'bail|email|required',
            'password' => 'bail|required|string|min:8',
            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);

        $error_message = ['RULES' => [
            'name' => 'last name can not be empty, must be a string, can not be less than 2 characters',
            'email' => 'email can not be empty, must be a valid email',
            'password' => 'password can not be empty, must be a string, minimum of eight characters.',
        ]];

        //Returning an error when the user provides wrong data.
        if ($register->fails())
            //Response if the users input does not match the validation.
            return response()->json(["message" => "Account not created", $error_message, "error" => true], 400);

        //Creating an instance of the User's model.
        $user = new User();

        //Checking if a user account already exists.
        if ($user::where('email', $request->email)->first()) {

            //Response if the users already exists.
            return response()->json(
                ["message" => "User's record already exist.", "error" => true], 400);
        }
        //populating the columns of the users table.
        $user->name = $request->name;
        $user->email = $request->email;

        //Encrypting the password
        $user->password = bcrypt($request->password);

        //Sending the validated data to the database.
        $user->save();

        //Generating an access token
        $accessToken = $user->createToken('authToken')->accessToken;

        //Response when the user registers correctly.
        return response(['user' => $user, 'access_token' => $accessToken]);
    }

    //Login function
    public function login(Request $request)
    {
        //Validating and storing a users data in a variable
        $loginData = $request->validate([
            'email' => 'bail|email|required',
            'password' => 'bail|required|string|min:8|',
            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);
        //Response to wrong login.
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'The Email / Password Incorrect.']);
        }
        //Generating an access token
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        //Response when the user logins in correctly.
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

}
