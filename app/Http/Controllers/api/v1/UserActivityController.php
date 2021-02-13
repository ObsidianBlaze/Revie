<?php

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
            'firstName' => 'bail|required|string|min:2',
            'lastName' => 'bail|required|string|min:2',
            'email' => 'bail|email|required',
            //Binding the password and confirm password together.
            'password' => 'bail|required|string|min:8|required_with:Confirm_Password|same:confirmPassword',
            'confirmPassword' => 'bail|required|string|min:8',
            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);

        $error_message = ['RULES' => [
            'firstName' => 'first name can not be empty, must be a string, can not be less than 1 character',
            'lastName' => 'last name can not be empty, must be a string, can not be less than 1 character',
            'email' => 'email can not be empty, must be a valid email',
            'password' => 'password can not be empty, must be a string, minimum of eight characters, must match confirm password',
            'confirm_password' => 'confirm_password can not be empty, must match password',
        ]];

        //Returning an error when the user provides wrong data.
        if ($register->fails())
            //Response if the users input does not match the validation.
            return response()->json([["message" => "Account not created"], $error_message, ["error" => true]], 400);

        //Creating an instance of the User's model.
        $user = new User();

        //Checking if a user account already exists.
        if ($user::where('email', $request->email)->first()) {

            //Response if the users already exists.
            return response()->json(
                [["message" => "User's record already exist."], ["error" => true]], 400);
        }
        //populating the columns of the users table.
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
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

}
