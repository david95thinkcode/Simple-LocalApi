# CREATE LOCAL API AND GET DATAS FROM IONIC APP - EXAMPLE

## PART 1 : API implementation
Create API using php **is nothing more than returning data as JSON objects.**
That datas can be retrieved from a database like MySQL or others.
In this repo, you'll se how to retrieve datas:
- created directly in the php script
- stored in database.

Every other app built with web front-end framework like Angular, React, etc can use it because it returns JSON datas. 
## Prerequisites
- MySql : database management system
- PHP : programming language used in this repo

Just make sure you have a local web server running on your computer

## How to run it ?
- Download this repository
- Create a folder and rename it '**`local-api`**' inside your local webserver folder
- Move all files and folders from the downloaded repository to **`locap-api`** folder created previously
- From your web browser, past the following url [http://localhost/phpmyadmin](http://localhost/phpmyadmin)  and go to it
- From phpmyadmin dashboard, import the file **`db.sql`** which is inside **`Database`** folder. More details about **_`db.sql`_** [here](Database/README.md)

- Return to your web browser and past the following url in the search bar [http://localhost/local-api/coders.php](http://localhost/local-api/coders.php)
- If you get something like [this](screenshots/simple.png) or [this](screenshots/with-json-viewer.png), it's fine ! 

## PS 
I'm using Ubuntu and my local webserver folder is `/var/www/html`. On Windows, I think it's `C:\wamp\www` if you're using Wamp.
If you're using something else like **_laragon_**, read it's official doc.

## [PART 2 : Get datas from Ionic App](https://github.com/david95thinkcode/Simple-Ionic-UseLocalApi)