# First-website-php
This is a basic website that was hosted on my local server via xampp implementing MySQL database tables, php code, and front-end web development tools. 

The website displays information on my hometown of Kobe, Japan. There are 4 database tables, which includes a table for users, a table for comments, a table for flight details that gets emailed to the user, and a table used for the contact form.

There are 8 php files under the following names:
1. mainpage.php

This file contains the html content for the website. It includes some php code for viewing the login inputs. It also uses php to show if a user is signed in or not through starting a session. It is the equivalent of the index file. 

2. comments.inc.php

This file includes all the functions used in all the files regarding adding/deleting/updating of the database tables.

signup($conn)

This function takes in the inputs from the signup.php file and stores the values into a database table named "user".

setComments($conn)

This function takes in the comments typed into the comment box on the mainpage to store them into a database table named "commentstab".The user id (which is the pimary key of the "user" table) is stored in the table along with the date (datetime) of when the comment was typed in. 

getComments($conn)

This function allows the comments on the "commentstab" to be posted on the mainpage at the bottom. The comments only display the delete and edit buttons if the user is signed in and the user will only be able to edit and delete his/her own comment posts through the if statements. In this function, the deleteComments($conn) function is used as well. The editcomments.php file can be accessed through this function because to edit a comment, it will be done on a different page. 

editComments($conn)

Updates a the selected comments element on the commentstab database table. 

replyComments($conn)

Adds a new comment on the commentstab table. However, I was not able to implement this under the getComments function. 

deleteComments($conn)

Deletes a comment in the commentstab database table. 

getLogin($conn)

selects a certain username and password under the user table. It then compares what the user typed in the username/password input fields on the mainpage to the username/password in the user table. If it matches, it starts a session under the username and password accessed. If it does not match, it states on the mainpage that "you are not logged in".

userLogout()

Destroys the session started when signing in. 

flights($conn)

Adds the specific information that user inputs in the flights.php to the flights database table. 

contact($conn)

Adds the specific information that user inputs in the contactform.php to the contact database table. 

3. dbh.inc.php

Establishing connection with my database. Database information is the following: 

  host = localhost
	user = root
	passwd = no password
	database = commentdb

4. editcomment.php

Opens a page where the user is able to make changes to his/her comments. 

5. flights.php

Opens a page where the user is able to add the flights detail of when they will be arriving Kobe, Japan. 

6. contactform.php

Opens a page where the user is able to put his/her details to get contacted for more information on Kobe, Japan. 

7. replycomment.php

Opens a page where the user is able to type in a reply comment to an existing comment. 

8. signup.php

Opens a page where the user is able to create a username and password to the website. 
