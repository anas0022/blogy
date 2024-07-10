Project Overview

This is a simple blog application built with Laravel 8.x. The application allows users to register, log in, create blogs, and comment on blogs.

Setup and Run

Clone the repository: git clone https://github.com/anas0022/blogy.git
Install the dependencies: composer install
Create a new database and update the .env file with the database credentials.
Run the migrations: php artisan migrate
Seed the database with some sample data: php artisan db:seed
Start the development server: php artisan serve
Open the application in your web browser: http://localhost:8000
Implemented Features

User Management
Registration: Users can register with a name, email, and password.
Login: Registered users can log in with their email and password.
Logout: Logged-in users can log out.
Blog Management
Create Blog: Logged-in users can create a new blog with a title and content.
View Blogs: All users can view a list of all blogs.
View Blog Details: Users can view the details of a specific blog, including comments.
Comment Management
Create Comment: Logged-in users can create a new comment on a blog.
View Comments: Users can view a list of all comments on a blog.
Routing
The application uses the following routes:

/: Registration page
/registerpost: Handle registration form submission
/login: Login page
/loginpost: Handle login form submission
/dashboard: Dashboard page for logged-in users
/profile: Profile page for logged-in users
/blog: Create blog page for logged-in users
/blogpost: Handle blog creation form submission
/comment: Handle comment creation form submission
/blogs/{blog}: View blog details page
/logout: Handle logout request
Database Schema

The application uses the following database schema:

users table: id, name, email, password
blogs table: id, head, blog, user_id
comments table: id, comment, blog_id, user_id
Controllers

The application uses the following controllers:

UserController: Handles user registration, login, and logout.
BlogController: Handles blog creation, viewing, and commenting.
Models

The application uses the following models:

User: Represents a user in the database.
Blog: Represents a blog in the database.
Comment: Represents a comment in the database.
