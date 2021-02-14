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
 *    response=401,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     )
 * )
 */

//Reviewing an apartment.
/**
 * @OA\Post(
 * path="/api/v1/user/review",
 * summary="Review an apartment",
 * description="Credentials: user_id, apartment_id, comment, reviews_type_id, video, image",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"user_id","apartment_id","comment"},
 *       @OA\Property(property="user_id", type="integer", format="number", example="1"),
 *       @OA\Property(property="apartment_id", type="integer", format="number", example="1"),
 *       @OA\Property(property="comment", type="string", format="text", example="This was a lovely place to stay"),
 *    ),
 * ),
 * @OA\Response(
 *    response=401,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Not authorized"),
 *    )
 *
 *     )
 * )
 */

//Getting all the reviews
/**
 * @OA\Get(
 * path="/api/v1/review/all",
 * summary="Get all reviews records",
 * description="shows all records of available reviews",
 * operationId="getreviews",
 * tags={"Reviews"},
 * @OA\Response(
 *    response=200,
 *    description="success",
 *    @OA\JsonContent(
 *       @OA\Property(property="reviews", type="object", format="text"),
 *    ),
 *    @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/ReviewResource")
 *      ),
 * )
 * )
 */

//view single review
/**
 * @OA\Get(
 * path="/api/v1/review/{id}",
 * summary="Getting a single review",
 * description="Getting a review atributed to the id.",
 * operationId="authLogin",
 * tags={"Reviews"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Credentials: id",
 *    @OA\JsonContent(
 *       required={"id"},
 *       @OA\Property(property="id", type="int", format="number", example="1"),
 *    ),
 * ),
 * @OA\Response(
 *    response=401,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong ID. Please try again")
 *        )
 *     )
 * )
 */

//Marking a review helpful.
/**
 * @OA\Post(
 * path="/api/v1/review/helpful/{id}",
 * summary="Review an apartment",
 * description="Credentials: id, checked",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"id","checked"},
 *       @OA\Property(property="id", type="integer", format="number", example="1"),
 *       @OA\Property(property="checked", type="text", format="string", example="yes"),
 *    ),
 * ),
 * @OA\Response(
 *    response=401,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Not authorized"),
 *    )
 *
 *     )
 * )
 */

//Deleting a review
/**
 * @OA\Delete(
 *      path="/api/v1/review/delete/{id}",
 *      operationId="deleteReview",
 *      tags={"Review"},
 *      summary="Delete existing review",
 *      description="Deletes a record and returns no content",
 *      @OA\Parameter(
 *          name="id",
 *          description="Review id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=204,
 *          description="Successful operation",
 *          @OA\JsonContent()
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Resource Not Found"
 *      )
 * )
 */

//Updating a review
/**
 * @OA\Put(
 *      path="/api/v1/review/update/{id}",
 *      operationId="updateReview",
 *      tags={"Reviews"},
 *      summary="Update existing review",
 *      description="Returns updated reviews data",
 *      @OA\Parameter(
 *          name="id",
 *          description="Review id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Resource Not Found"
 *      )
 * )
 */

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Reviews;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            'name' => 'name can not be empty, must be a string, can not be less than 2 characters',
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
        if ($user::where('email', $request->email)) {

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

    public function review(Request $request)
    {
        //Validating and storing a users data in a variable
        $review = Validator::make($request->all(), [
            'user_id' => 'bail|required|numeric',
            'apartment_id' => 'bail|required|numeric',
            'comment' => 'bail|required|string|min:2',
            'reviews_type_id' => 'numeric',
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            'image' => 'image|max:2048',
            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);

        $error_message = ['RULES' => [
            'user_id' => 'can not be empty',
            'apartment_id' => 'can not be empty',
            'comment' => 'comment can not be empty, must be a string',
        ]];

        //Returning an error when the user provides wrong data.
        if ($review->fails())
            //Response if the users input does not match the validation.
            return response()->json(["message" => "Review not made", $error_message, "error" => true], 400);

        //Creating an instance of the reviews table.
        $reviews = new Reviews();

        $imageName = "";
        $videoName = "";

//Processing the image and sending to the database.
        if ($request->image != null) {
            //Getting the image and the extension of the image from the user
            $imageName = time() . '.' . $request->image->extension();
            //Moving the image to the folder in the project
            $request->image->move(public_path('res/img/'), $imageName);
        }
//Processing the video and sending to the database.
        if($request->video != null){
            //Getting the video and the extension of the image from the user
            $videoName = time() . '.' . $request->video->extension();
            //Moving the video to the folder in the project
            $request->video->move(public_path('res/vid/'), $videoName);
        }


        //populating the columns of the reviews table.
        $reviews->user_id = $request->user_id;
        $reviews->apartment_id = $request->apartment_id;
        $reviews->comment = $request->comment;
        $reviews->reviews_type_id = $request->reviews_type_id;
        $reviews->video = $videoName;
        $reviews->image = $imageName;

        //Sending the validated data to the database.
        $reviews->save();

        //Response when the user palces a review correctly.
        return response(['message' => "Review made successfully.", 'error' => false]);

    }

    //Getting all review
    public function getAllReview(){
        //Storing all the reviews into a variable.
        $reviews = Reviews::all();
        //Checking for reviews
        if ($reviews)
            //returning all the reviews.
            return response()->json(["reviews" => $reviews], 200);
        //Response if no product is on the table.
        else {
            //response if no reviews.
            return response()->json(["reviews" => "No reviews on the database"], 404);

        }

    }

    //Getting a single review
    public function getSingleReview($id)
    {
        //Checking if an id exist
        $review = Reviews::find($id);
        if ($review) {
            //Response if review exists.
            return response()->json(["review" => $review], 200);
        } else {
            //Response if the review does not exist in the database
            return response()->json([["message" => "review does not exist"], ["error" => true]], 404);
        }

    }

    //Marking a review helpful
    public function markHelpful(Request $request, $id){
        //Validating and storing a users data in a variable
        $review = Validator::make($request->all(), [
            'checked' => 'bail|required|string',
            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);

        $error_message = ['RULES' => [
            'checked' => 'can not be empty',
        ]];

        //Returning an error when the user provides wrong data.
        if ($review->fails())
            //Response if the users input does not match the validation.
            return response()->json(["message" => "Helpful review not made", $error_message, "error" => true], 400);

        //Checking if an id exist
        $review = Reviews::find($id);
        $helpfulCounter = $review['helpful'];

        if ($review) {
            //Manipulating the users data to update
            $review->fill([
                'helpful' => $helpfulCounter + 1,
            ]);

            $review->save();
            //Response if review is updated.
            return response()->json(["message" => "review updated and marked as helpful"], 200);
        } else {
            //Response if the review does not exist in the database
            return response()->json(["message" => "review does not exist", "error" => true], 404);
        }
    }

    //Deleting a review
    public function deleteReview($id)
    {
        //Checking if an id exist
        $review = Reviews::findOrFail($id);

        //Checking for the Review, deleting and sending a response.
        if ($review) {
            $review->delete($id);
            return response()->json(["message" => "Review deleted", "error" => false], 200);
        } //Response if no review was found
        else {
            return response()->json(["message" => "Review does not exist", "error" => true], 404);
        }

    }

    //Updating a review
    public function updateReview(Request $request, $id){
        //Validating and storing a users data in a variable
        $review = Validator::make($request->all(), [
            'comment' => 'bail|required|string|min:2',
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            'image' => 'image|max:2048',
            //Note the bail keyword is used to terminate the validation if one of the fields does not meet the requirement.
        ]);

        $error_message = ['RULES' => [
            'comment' => 'comment can not be empty, must be a string',
        ]];

        //Returning an error when the user provides wrong data.
        if ($review->fails())
            //Response if the users input does not match the validation.
            return response()->json(["message" => "Review not updated", $error_message, "error" => true], 400);

        //Checking if an id exist
        $reviews = Reviews::find($id);

        if ($reviews) {
            $videoName = "";
            $imageName = "";
            //Logic to update photos and videos
            if($request->image == null){
                $imageName = $reviews['image'];
            }
//            Logic if the user inserts a new photo
            else{
                    //Deleting the old image from the folder
                    File::delete('res/img/' . $reviews['image']);

                //Getting the image and the extension of the image from the user
                $imageName = time() . '.' . $request->image->extension();
                //Moving the image to the folder in the project
                $request->image->move(public_path('res/img/'), $imageName);

            }
            if($request->video == null){
                $videoName = $reviews['video'];
            }
            //Logic if the review has a new video.
            else{
                    //Deleting the old video from the folder
                    File::delete('res/vid/' . $reviews['video']);

                //Getting the video and the extension of the image from the user
                $videoName = time() . '.' . $request->video->extension();
                //Moving the video to the folder in the project
                $request->video->move(public_path('res/vid/'), $videoName);

            }
            //Manipulating the users data to update
            $reviews->fill([
                'comment' => $request->comment,
                'video' => $videoName,
                'image' => $imageName,
            ]);

            $reviews->save();
            //Response if review is updated.
            return response()->json(["message" => "review updated"], 200);
        } else {
            //Response if the review does not exist in the database
            return response()->json(["message" => "review does not exist", "error" => true], 404);
        }


    }

}
