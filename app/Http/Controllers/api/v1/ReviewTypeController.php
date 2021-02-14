<?php
//Creating a review type a user.
/**
 * @OA\Post(
 * path="/api/v1/create",
 * summary="Creating a review type",
 * description="Credentials: review_type",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"review_type"},
 *       @OA\Property(property="review_type", type="string", format="text", example="Landlord"),
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *     )
 * )
 */

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Reviews_Type;
use App\ReviewsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewTypeController extends Controller
{
    public function createReviewType(Request $request){
        //Validating and storing a users data in a variable
        $create = Validator::make($request->all(), [
            'review_type' => 'bail|required|string',
            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);

        $error_message = ['RULES' => [
            'review_type' => 'review_type can not be empty, must be a string',
        ]];

        //Returning an error when the user provides wrong data.
        if ($create->fails())
            //Response if the users input does not match the validation.
            return response()->json(["message" => "Review type not created", $error_message, "error" => true], 400);

        //Creating an instance of the reviews type.
        $reviewType = new ReviewsType();

        //populating the columns of the reviews type table.
        $reviewType->review_type= $request->review_type;

        $reviewType->save();

        //Response when the user registers correctly.
        return response(['message' => "Reviews Type Created", 'error' => false]);


    }
}
