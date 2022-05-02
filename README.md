# karma
 Get the overall user position

Hello I am Azad Alketaan, this is the project that you have asked for.
I have finished all the require requirments and the extra requirments (Bonus).

The steps to run the project:

1. Run command: composer install.
2. Run command: php artisan migrate.
3. Run command: php artisan serve.
4. Go to the Following URL: http://127.0.0.1:8000
    ( the Url takes you to the index page that show you the overall users positions with the score and position for each user).
5. Click on the button "Generate Fake Data" it will Generate 100000 images and users 
    (the number depend on the document (I can make it dynamic)).
    Noting that: the Api might take several times depend on the resources of the devise or the server.
6. Reload the page on this URL http://127.0.0.1:8000 to show the data.
    Noting that: the user ID is generating automaticly and the value will be between 1 and 100000, and the value of count = 5 (default value).
7. try the follwing API http://127.0.0.1:8000/api/KarmaPosition?user_id=30&count=5  to get the overall user position,
    you can edit the values of user_id , count.
8. Run command: php artisan test, to test the API,
    you can find the Test case in the following path: tests\Unit\KarmaRankingTest.php


Please if there any thing missed or unclear call me on +963994274555.

Regards,
Azad Alketaan.