# Revie
## API for leaving reviews about apartments

# Revie Documentation<br><br>
##Over view
This app is used to review an apartment, the landlord, the environment and the quality of the apartment. 
Listed below is how to setup and get the app running.
Setting up the app.
* Create a database named revie with mysql and add the name to the .env file
* php artisan migrate to create the tables.
* php artisan passport:install
* To Use the app, populate the reviews type table in the order:
Landlord as id 1, 
Environment as id 2, and
Quality of amenities as id 3
Note: You cannot review without having an authorization. Bearer tokens are generated when you login. 
Marking a review helpful, create a checkbox with html. If the checkbox is ticked, set the value to yes else, no.


#Database Design.
For the database, I used mysql.
I made a database named revie with four major tables. Each of the tables have a timestamp to keep track of the time of creation and updates. The tables are
* Apartments
* Reviews
* ReviewsTypes
* Users

Each of these tables have columns to map out the functionalities of the requested web app.
Apartments table:  This table has just a column named address and apartment type to know the type of apartment. E.g Two bedroom flat. I use this to keep track of the address of a particular apartment and the type of apartment.
Users: This table has three important columns; name, email, and password. 
ReviewsTypes: This table keeps track of what could be reviewed. With this table, one could review a landlord, the environment, and the quality of the amenities in that apartment. 
Reviews: This table is used to keep track of reviews by users and visitors. It has columns; user_id, apartment_id, reviews_type_id, helpful, video, image.
User_id: This is a foreign key to map a user to the review being made.
Apartment_id: This is used to map an apartment to a review by a user.
Reviews_type_id: This is used to keep track of what is being reviewed. I.e.: Landlord, environment or quality of amenities. 
Comment: The users review.
Helpful: This column is used to keep track of how helpful a review is. The original count starts at 0 by default.
Video/Image: Are optional Columns (nullable).  This means, you can decide to leave images or videos about an apartment.

#Tools:
Laravel version 7 was used.
Swagger was used for documentations.
