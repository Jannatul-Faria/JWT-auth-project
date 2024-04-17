

# Point Of Sale Application

This repository contains a Laravel-based Point of Sale (POS) application with JWT token-based authentication, Axios for HTTP requests, and Bootstrap for styling.

## Installation
Follow these steps to get the project up and running on your local machine:

### Prerequisites
- PHP (>=8.2)
- Composer
- git
- MySQL or another database of your choice

## Step 1: Clone the Repository
 ```bash
git clone https://github.com/Jannatul-Faria/POS_Application.git
cd POS_Application
```
## Step 2: Install Composer Dependencies
 ```bash
composer install
```
## Step 3: Set Up Environment Variables
- Copy the .env.example file to .env.
- Update the database connection details in the .env file.
 ```bash
cp .env.example .env
```
### Step 4: Generate Application Key
```
php artisan key:generate
```
### Step 5: Run Migrations and Seeders
```
php artisan migrate
php artisan db:seed
```
### Step 6: Start the Development Server
```
php artisan serve

```
### Usage
Access the application by visiting http://localhost:8000/dashboard in your web browser.

### Additional Notes
- Make sure your database server is running and accessible.
- Adjust the .env file with your database credentials and other settings.
- You may need to configure a virtual host or adjust the server configuration based on your setup (e.g., Apache, Nginx).

### Features Overview
- Product Category Listing
- Product Listing
- Sales & Invoice Management
- Business Reporting
- Multi-user System for Business Profiles
- Authentication: JWT token-based authentication for secure user sessions.
- API Requests: Axios is used for making asynchronous HTTP requests to the Laravel backend.
- Styling: Bootstrap is included for responsive and clean UI components.
### Database Designing
<img src="public\images\pos-application.png" alt="">

### Phase 01: User Authentication Backend Features
1. <b> User Registration</b> (Endpoint)
2. <b> User Login & JWT Token Generation</b> (Endpoint)
3. <b> Password Recovery Stage 01:</b> Sending OTP Code to Email (Endpoint)
4.  <b> Password Recovery Stage 02:</b> Verify OTP Code (Endpoint)
5.  <b> Password Recovery Stage 03:</b> Allow User to Reset Password (Endpoint)
6.  <b>Get User Profile Details </b>(Endpoint)
7.  <b>Update User Profile Details</b>(Endpoint)
### Phase 02: Product Categories
1. <b>Category Management Backend Development</b>
2. <b>Category Management Frontend Development</b>
### Phase 03: Customers
1. <b>Plan Customer Table</b>
2. <b>Customer Management Backend Development</b>
3. <b>Customer Management Frontend Development</b>
### Phase 04: Products
1. <b>Plan Product Table</b>
2. <b>Product Management Backend Development</b>
3. <b>Product Management Frontend Development</b>
### Phase 05: Invoicing
1. <b>Plan Invoice  Table</b>
2. <b>Invoice  Management Backend Development</b>
3. <b>Invoice  Management Frontend Development</b>
### Phase 06: Dashboard & Reporting
1. <b>Dashboard Summary: </b>Total Customers, Products, Sales, Categories
2. <b>Business Reports:</b> Date-to-Date Sales Report
### Contributing
Feel free to contribute to this project by forking the repository and submitting pull requests. Please follow the existing code style and conventions.