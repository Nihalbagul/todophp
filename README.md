# To-Do List Application

## Description
A simple and intuitive to-do list application built with PHP and MySQL. The application allows users to register, log in, and manage their tasks. Users can add, edit, delete, and view their tasks through a user-friendly dashboard. The application also includes a logout feature and has been styled for a clean and modern look.

## Features
- User registration and login system
- Dashboard to view all tasks
- Add new tasks
- Edit existing tasks
- Delete tasks
- Logout functionality
- Responsive design for mobile and desktop users

## File Structure


## File Structure
```plaintext
/todophp
|-- /includes
|   |-- config.php           # Database connection settings
|   |-- functions.php        # Reusable functions
|   |-- header.php           # Common header part
|   |-- footer.php           # Common footer part
|-- /css
|   |-- style.css            # Main stylesheet
|-- /js
|   |-- script.js            # Main JavaScript file (if needed)
|-- /uploads                 # Directory for uploaded files (optional)
|-- /migrations
|   |-- create_database.sql  # SQL script to create the database and tables
|   |-- seed_database.sql    # SQL script to insert initial data (optional)
|-- index.php                # Home page
|-- login.php                # Login page
|-- register.php             # Registration page
|-- dashboard.php            # User dashboard
|-- add_task.php             # Add new tasks
|-- edit_task.php            # Edit existing tasks
|-- delete_task.php          # Delete tasks
|-- logout.php               # Logout functionality
|-- README.md                # Documentation and setup instructions


### `/includes/`
- **`config.php`**: Contains the database connection settings.
- **`functions.php`**: Contains reusable functions used across the application.
- **`header.php`**: HTML header part included in various pages.
- **`footer.php`**: HTML footer part included in various pages.

### `/css/`
- **`style.css`**: Main stylesheet for styling the application.

### `/js/`
- **`script.js`**: Contains JavaScript code for client-side interactions.

### `/uploads/`
- **(Optional)**: Directory for storing uploaded files, if your application supports file uploads.

### `/migrations/`
- **`create_database.sql`**: SQL script to create the database and tables.
- **`seed_database.sql`**: SQL script to insert initial data into the database.

### Root Files
- **`index.php`**: The entry point of the application, typically the home page.
- **`login.php`**: Page for user login.
- **`register.php`**: Page for user registration.
- **`dashboard.php`**: Page for displaying tasks and user dashboard features.
- **`add_task.php`**: Page for adding new tasks.
- **`edit_task.php`**: Page for editing existing tasks.
- **`delete_task.php`**: Page or script to handle task deletion.
- **`logout.php`**: Script for logging out users.
- **`README.md`**: Documentation file.

## Database Setup

### 1. Create Database
Run the `create_database.sql` script to set up the database structure:
```bash
mysql -u username -p < migrations/create_database.sql
3. Configuration
Update includes/config.php with your database connection details:

php
Copy code
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_app";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
Running the Application
Place the files in your web server's root directory (e.g., www or htdocs).
Access the application via your browser at http://localhost/todophp.
Screenshots
(Include some screenshots here to showcase the UI of your application.)

Troubleshooting
404 Errors: Ensure all file paths (e.g., CSS, JS) are correct.
Database Connection Issues: Verify database credentials in config.php.
Session Issues: Ensure sessions are properly started with session_start() at the beginning of each page.