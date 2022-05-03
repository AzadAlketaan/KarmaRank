# karma
 Get the overall user position

Hello I am Azad Alketaan, this is the project that you have asked for.
I have finished all the required requirements and the extra requirements (Bonus).

The steps to run the project:

1. Run command: composer install.
2. Run command: php artisan migrate.
3. Run command: php artisan serve.
4. Go to the Following URL: http://127.0.0.1:8000
    ( the Url takes you to the index page that shows you the overall users positions with the score and position for each user).
5. Click on the button "Generate Fake Data" it will Generate 100000 images and users 
    (the number depends on the document (I can make it dynamic)).
    Noting that: the API might take several times depending on the resources of the device or the server.
6. Reload the page on this URL http://127.0.0.1:8000 to show the data.
    Noting that: the user ID is generating automatically and the value will be between 1 and 100000, and the value of count = 5 (default value).
7. try the following API http://127.0.0.1:8000/api/KarmaPosition?user_id=30&count=5  to get the overall user position,
    you can edit the values of user_id, count.
8. Run command: php artisan test, to test the API,
    you can find the Test case in the following path: tests\Unit\KarmaRankingTest.php.

Notes about Karma_position API:
1. All items are arranged in descending order to know the position of each user for the rest of the users.
2. There are some cases when the scores are equal the order of showing user might be different, but the order of position will not change it 
    will be in the correct order.
3. I have made an index on column karma_score to make the query faster.
4. There is another way, which is less complicated, and the method is:
   We create a table that contains the score and the position. Whenever we enter a new user or any update on the user’s score, we change the order of this table, so when we want to implement the API, we read from this table that contains the arranged values, so there is no need for a query that Arrange the items at each API request.
   Note: I did not use this method to adhere to the required database structure, but I have uploaded another version of the project using this method.
5. You can find the another way on the branch karma_v2 on this link: https://github.com/AzadAlketaan/karma.



Please if there any thing missed or unclear call me on +963994274555.

Regards,
Azad Alketaan.
