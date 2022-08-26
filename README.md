# TODO: 
- DEPLOY THE BACKEND TO HEROKU!
- ALLOW THE VERSEL APP TO ACCESS OUR BACKEND THROUGH LARAVEL ENV
- CONFIGURE THE DATABASE AND MAKE IT WORK!!
------TOMORROW!

<p align="center">
    <img src="https://user-images.githubusercontent.com/35831811/186013587-ff898e23-1c50-4465-9e4a-9829ec4f872f.png">
</p>
<p align="center">
    BUILT WITH
</p>
<p align="center"> 
       <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200">              <img src="https://positivethinking.tech/wp-content/uploads/2021/01/Logo-Vuejs.png" width="100">
</p>

# LaraBloG

Welcome here!

frontend only : https://lara-blog.vercel.app/ , backend is coming soon!

![Vercel](http://therealsujitk-vercel-badge.vercel.app/?app=lara-blog)

This is another awesome blogging web application running on top of laravel and vue!

We adopted to completely separate backend and frontend in order to explore the
the power and extensibility of both frameworks (note that we could have compiled the vue components
in blade templates but that's not my favorite way to do it :haha )

Here's why separating things is the right idea:

- The same exposed API endpoint can serve multiple purposes i.e. mobile app, web app and any other API consumer
- We fully explore the power of Vue SPA with all the benefits of SPAs
- The frontend can be deployed anywhere as a static site
- Single Page applications are fast!


## Features (MVP)

- Website Responsivess
- User authorization and authentication
- Blog creation, edition and deletion
- Cross platform access


## Getting started

In order to run this project on your local environment ensure you have the following tool installed:
 - PHP (At least PHP 7.3) and make sure you can access it globaly in your terminal https://kinsta.com/blog/install-php/
- Composer for PHP package management https://getcomposer.org/
- A SQL database Management system (We have prefered MySQL) https://www.mysql.com/fr/downloads/
- NPM & Node JS https://nodejs.org/en/
- Vue-CLi (optional) https://cli.vuejs.org/guide/
- Git bash https://git-scm.com/downloads

Before you continue make sure you can run the following
```bash
  php --version
```
```bash
  node --version
```
```bash
  npm --version
```
```bash
  composer --version
```
```bash
  mysql --version
```
```bash
  git --version
```
In case one this command rise an error, please address the issue before continue

# Installation
First you have to clone the project in a given folder on your local machine by

```bash
  git clone https://github.com/ElvisAns/LaraBlog.git 
```

Then navigate inside the folder and run
(Make sure you are having composer 2.x) to avoid error on runing composer install

```bash
  composer install
```
```bash
  cd frontend
```
```bash
  npm install
```

The root folder contain our main backend application (laravel) while inside the frontend
folder we have our vue application 

In both root and frontend you will found a file **.env.example**, rename them as **.env** and start using
them as template.

While the frontend **.env** file can be left as is, the laravel **.env** file(from the root folder) need
to be adjusted to your local setup.

Open it and make sure the database credentials are correctl .

**we assume you have already created 
an empty database so you can use it inside the .env config at root(laravel env).if no, check on this [blog](https://www.inmotionhosting.com/support/server/databases/create-a-mysql-database/)**

Next
____

Being in the root folder run the following command:

```bash
  php artisan migrate
```
This command will first check if the app can access the database you have configured and if so,
it will create necessary tables for us!

*Cool, Dont you see? hahhaa*

Next if, migration successed you can seed your database with mock datas as many time as you want 
by running 

```bash
  php artisan db:seed
```
Now our app backend is ready, you can start the server by running

```bash
  php artisan serve
```

Excited to get started? Please continue reading!
To now serve our frontend, make sure the php artisan serve is keeping running!
If you are using VS Code you can easily open two terminal windows.

Now open a new terminal and move inside the frontend folder and run the following command

```bash
  npm run serve
```

Bingo!!!

If you did not change any configuration about urls you can access the website at **http://localhost:8080/** 

Enjoy!


![image](https://user-images.githubusercontent.com/35831811/186032058-27a4e1e7-703e-4f53-bcfd-e4e49a572327.png)


Remember that anytime you need to add new mock datas inside the database, you can always run **php artisan db:seed**
and the terminal will show the user account created so you can easily login without having to signup directly from the website.

Play around with this MVP website with simple yet powerfull blog feature!




    
## Running Tests

To run tests against our backend api, run the following command at root (Our tests has been defined as feature so we need --testsuite=Feature)

```bash
  php artisan test --testsuite=Feature
```
Attention : Running test will wipe all the datas inside the database, so make sure
you seed the database after perfoming tests!
## TODO

There are still some functionalities that we are planning to implement soon:
- Comments features
- User access capacity (admin,publisher, reviewer etc..)
- A nice text editor plugin
- Enhance profile component and make it look like a dashboard


**And many more that i didn't spot, right?**


## Contributing

if you answered `YES!` come and join me building amazing blog website :-)

Feel free to fork the repo, report any bug, propose a feature so  we make it better!

Email me at ansimapersic@gmail.com

&copy; 2022 -  [ElvisAnsima](https://github.com/ElvisAns)

--
PLAY THE HARD GAME
--
