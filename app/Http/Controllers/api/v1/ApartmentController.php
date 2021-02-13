<?php
//Creating an apartment.
/**
 * @OA\Post(
 * path="/api/v1/apartment/create",
 * summary="Creating an address for an apartment",
 * description="Credentials: address",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"address"},
 *       @OA\Property(property="address", type="string", format="text", example="15, unity road, Ikorodu Lagos."),
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *     )
 * )
 */

namespace App\Http\Controllers\api\v1;

use App\Apartments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApartmentController extends Controller
{
    //Creating an address for the apartment.
    public function create(Request $request){
        //Validating and storing a users data in a variable
        $create = Validator::make($request->all(), [
            'address' => 'bail|required|string|min:5',
            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);

        $error_message = ['RULES' => [
            'address' => 'address can not be empty, must be a string, can not be less than 5 characters',
        ]];

        //Returning an error when the user provides wrong data.
        if ($create->fails())
            //Response if the users input does not match the validation.
            return response()->json(["message" => "Address not created", $error_message, "error" => true], 400);

        //Creating instance of the Apartment
        $apartment = new Apartments();

        //populating the columns of the apartments table.
        $apartment->address = $request->address;

        $apartment->save();

        //Response when the user registers correctly.
        return response(['message' => "Address Created", 'error' => false]);


    }

}
