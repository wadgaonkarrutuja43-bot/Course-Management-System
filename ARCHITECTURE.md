# Architecture — Course Management System

## Data flow
Browser requests PHP pages on a PHP web server. PHP pages use `dbconnection.php` and SQL queries to access MySQL tables including `addcourse`, `lesson`, `register`, `admin` and `feedback`. Shared headers and footers render the interface.

## Main components
- Admin dashboard and course management pages
- Add and edit courses and lessons
- Student registration, login, profile and password pages
- Course listing, details and lessons
- Student management and feedback pages
- Checkout and payment pages (presence of pages does not prove a payment gateway integration)

## API status
No standalone REST backend endpoints were found in the uploaded project.

## Security and deployment considerations
The uploaded `dbconnection.php` contains connection configuration. Never commit live credentials. No SQL schema dump was found in the archive; database setup must be documented or supplied separately. Do not claim a working third-party payment integration from page names alone.
