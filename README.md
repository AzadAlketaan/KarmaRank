# Welcome to KarmaRank Application
## Overview
KarmaRank is a website that lets you interact and rank with other users based on your karma score. You can comment, like, and follow other users, and see how your karma score changes over time. You can also use our API to integrate KarmaRank with your own front-end and mobile applications.
KarmaRank is a fun and engaging way to connect and compete with other users.
## How to Run the Project
### Steps
- Run the command: `composer install`.
- Run the command: `php artisan migrate`.
- Run the command: `php artisan serve`.
- Go to the following URL: http://127.0.0.1:8000. This URL takes you to the index page that shows you the overall users’ positions with the score and position for each user.
- Click on the button **Generate Fake Data**. It will generate 100000 images and users (the number depends on the document).
  Note that: the API might take some time depending on the resources of the device or the server.
- Reload the page on this URL http://127.0.0.1:8000 to show the data. Note that: the user ID is generated automatically and the value will be between 1 and 100000, and the value of count = 5 (default value).
- Try the following API http://127.0.0.1:8000/api/KarmaPosition?user_id=30&count=5 to get the overall user position. You can edit the values of user_id and count.
- Run the command: `php artisan test` to test the API. You can find the test case in the following path: tests\Unit\KarmaRankingTest.php.
## Notes about Karma_position API
- All items are arranged in descending order to know the position of each user for the rest of the users. (If the needed position is only for shown users, we can use rank in the SQL statement, but it will get the order for only shown users.)
- There are some cases when the scores are equal, the order of showing users might be different, but the order of position will not change. It will be in the correct order.
- Index is made on column karma_score to make the query faster.
