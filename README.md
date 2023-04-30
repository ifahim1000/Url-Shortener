# Description 
The web application has a form 
that accepts the long URL.It generates a short 
local URL and store the short URL and the long URL 
together in a persistent data store.It redirects 
visitors to the long URL when the short URL is 
visited.It also tracks the number of times the 
short URL is visited. The statistics show the 
short URL, the long URL, and the number of times 
the short URL was accessed.

<i> I have basic knowledge in php and MySQL. So,I choose this stack.</i>

#Live demo link : https://url-shortener-1.000webhostapp.com/  [It might have issueses]

Used Technologies
------------

- PHP7.4
- MySQL
- jQuery

Run Project
------------

- Download the project.
- Paste the folder in <i> XAMPP or MAMP's</i> `htdocs` folder.
- Start <i> XAMPP or MAMP</i> server.
- Goto `"localhost:8888/phpmyadmin"`.
- Create a database named as `urlshortener`.
- Export `"url.sql"` in the database.
- Finally run the project on your localhost server. Following path will be: `localhost:8888/url/`.


Output
------
- Home Page

![alt text](https://github.com/ifahim1000/Url-Shortener/blob/main/img/img2.png)

- Url Shortening Box

![alt text](https://github.com/ifahim1000/Url-Shortener/blob/main/img/img1.png)


**NOTES:**

- This paths given here are:
  - Considered that `port 80` is free.
  - It is running in MacOS.
  - In case of windows, replace `"localhost:8888"` with `"localhost"` in several files and paths.
