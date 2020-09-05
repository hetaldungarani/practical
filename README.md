You can register in app through http://localhost/register.
User will be able to register in the app by filling the details like Name, Email, Gender, Hobbies,Password and Confirm password.
User's hobby will be  added into user_hobby table.
When user will be logged in, dashboard screen will show list of all other users with the options to send request or accept the request (if anyone sent) or Block the user. These data will be saved into user_requests table.

I am managing one table "user_request" to manage all the actions performed by user.
In table "user_request", fields are (from_id,to_id,request_type,is_latest,created_date). App is managing all the actions by assigning enum values to request_type field. In the same table, you can find historical data for all actions between users and it's managing field is_latest = 1 which is the latest action between two users. 
Values for request_type are (1-if request sent, 2- if request is approved, 3-if user is blocked).