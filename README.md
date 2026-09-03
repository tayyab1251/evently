# Evently

Evently is a Laravel-based event discovery and booking application where users can browse events and book tickets for free or paid events.

For paid events, Evently uses Stripe Checkout for payment. Free events are booked directly without going through Stripe.

The application also includes an admin dashboard for managing events and a user dashboard that is currently under development.

## Features

* Public homepage with featured and upcoming events
* Event details with related event suggestions
* Event categories and cities
* Free and paid events
* Event status: Upcoming, Ongoing, Completed, and Not Scheduled
* Event capacity and remaining seats tracking
* Event image and cover image upload
* Image preview and drag & drop upload
* User and admin authentication
* Admin dashboard
* Admin event management (Create, Read, Update, Delete)
* Free event booking without payment
* Paid event booking with Stripe Checkout
* Duplicate booking prevention
* Seat availability validation
* Booking confirmation page
* Invoice-style booking details
* Form Request validation
* Custom validation messages
* Eloquent relationships
* Database seeders
* DataTables for admin event listing
* SweetAlert2 notifications and confirmation dialogs

## How Evently Works

Users can browse events from the public website and open an event to see its details.

Events can either be **Free** or **Paid**.

### Free Events

Free events don't require any payment.

```text
User
  ↓
Event Details
  ↓
Book Event
  ↓
Booking Created
  ↓
Booking Confirmation
```

When a free event is booked, Evently checks the user's existing bookings and the event's available capacity before creating the booking.

### Paid Events

Paid events use Stripe Checkout.

```text
User
  ↓
Event Details
  ↓
Checkout
  ↓
Stripe Checkout
  ↓
Payment
  ↓
Booking Confirmation
  ↓
Invoice
```

A pending booking is created before sending the user to Stripe. After a successful payment, Evently verifies the Stripe Checkout Session and confirms the booking.

Stripe webhooks are not currently implemented. Payment confirmation is handled when the user returns to the success route.

## Admin Dashboard

The admin dashboard is protected using Laravel authentication and a custom `admin` middleware.

Admins can:

* View recently created events
* View all events in a DataTable
* Create events
* View event details
* Edit events
* Delete events
* Upload and replace event images
* Manage event information such as category, city, schedule, price, type, and capacity

The event table includes searching, pagination, and DataTables functionality.

Delete actions and other admin feedback use SweetAlert2.

## User Dashboard

**Under Development**

The user dashboard is currently not fully implemented.

The protected `/dashboard` route currently returns the authenticated user. User booking history and account management screens are planned for the dashboard.

## UI & Frontend

Evently uses Blade views with JavaScript-based interactions.

Some of the frontend features include:

* Bootstrap
* Bootstrap Icons
* jQuery
* DataTables
* SweetAlert2
* ApexCharts
* Flatpickr
* Lucide icons
* Vite

DataTables are used in the admin event listing for searching, pagination, and other table controls.

SweetAlert2 is used for notifications and delete confirmations.

Event create/edit forms also include image preview and drag & drop upload functionality.

The booking success page includes a print option for the invoice-style booking details.

## Tech Stack

* PHP 8.3+
* Laravel 13
* MySQL
* Blade
* JavaScript
* jQuery
* Bootstrap
* DataTables
* SweetAlert2
* Stripe PHP SDK
* Vite
* Composer
* NPM

Stripe is integrated directly using the Stripe PHP SDK. **Laravel Cashier is not used.**

## Requirements

Before running Evently, make sure you have:

* PHP 8.3 or later
* Composer
* Node.js and NPM
* MySQL
* Stripe account for testing paid events

## Installation & Setup

### 1. Clone the Repository

```bash
git clone <https://github.com/tayyab1251/evently>
cd evently
```

### 2. Install Dependencies

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

### 3. Setup Environment

Copy the example environment file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

### 4. Configure MySQL

Update your `.env` file with your MySQL database details:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=evently
DB_USERNAME=root
DB_PASSWORD=
```

Create the `evently` database in MySQL before running the migrations.

### 5. Run Migrations and Seeders

Run the migrations:

```bash
php artisan migrate
```

Seed the database:

```bash
php artisan db:seed
```

Or run both from a fresh database:

```bash
php artisan migrate:fresh --seed
```

The seeders add development data such as:

* Categories
* Cities
* Events
* Admin/user accounts

### 6. Storage Link

Create the storage symlink for uploaded event images:

```bash
php artisan storage:link
```

### 7. Configure Stripe

Add your Stripe test credentials to `.env`:

```env
STRIPE_PUBLISHABLE_KEY=your_publishable_key
STRIPE_SECRET_KEY=your_secret_key
```

Use Stripe test keys while developing locally.

Never commit your real Stripe secret key to the repository.

### 8. Run the Application

Start Vite:

```bash
npm run dev
```

In another terminal, start Laravel:

```bash
php artisan serve
```

The application will normally be available at:

```text
http://127.0.0.1:8000
```

For a production frontend build:

```bash
npm run build
```

## Database

Evently currently uses MySQL.

The main database tables include:

* `users`
* `categories`
* `cities`
* `events`
* `bookings`

Some of the main relationships are:

```text
Category
   ↓
hasMany
   ↓
Events

City
   ↓
hasMany
   ↓
Events

Event
   ↓
belongsTo
   ↓
Category

Event
   ↓
belongsTo
   ↓
City

Booking
   ↓
belongsTo
   ↓
Event
```

Bookings also belong to users through the user relationship defined in the application.

## Booking & Payment

The checkout route is protected by Laravel's `auth` middleware, so users must be authenticated before starting the booking process.

Before creating a booking, Evently checks:

* Whether the event exists
* Whether the user has already booked the event
* Whether seats are still available

### Free Event

For a free event:

* No Stripe Checkout Session is created
* The booking is confirmed immediately
* `payment_status` is set to `not_required`
* The remaining attendee count is updated

### Paid Event

For a paid event:

* A pending booking is created
* A Stripe Checkout Session is created
* The user is redirected to Stripe
* After payment, the success route retrieves the Stripe session
* The payment status is checked
* The booking is confirmed
* Stripe payment information is stored
* Remaining capacity is updated

## Routes

The main application routes are defined in:

```text
routes/web.php
```

Some of the main routes include:

### Public

```text
GET  /
GET  /event/details/{id}
```

### User Authentication

```text
GET/POST  /register
GET/POST  /login
GET       /logout
GET       /dashboard
```

### Admin

```text
GET/POST  /admin/register
GET/POST  /admin/login
POST      /admin/logout
```

Admin event management is handled through the resource routes under:

```text
/admin/events
```

These routes are protected by both `auth` and `admin` middleware.

### Booking & Checkout

```text
POST  /checkout
GET   /checkout/success
```

Both checkout routes require authentication.

## Validation

Evently uses Laravel Form Requests for request validation.

Custom validation messages and attributes are also used where needed to provide clearer validation feedback.

## Demo

Screenshots and demo images are available in the [`demo`](./demo) directory.

The demo folder contains screenshots of different parts of Evently, including:

* Homepage
* Event details
* Authentication pages
* Checkout
* Booking success/invoice
* Booking notifications
* Admin functionality

## Development Commands

```bash
# Install PHP dependencies
composer install

# Install frontend dependencies
npm install

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Run seeders
php artisan db:seed

# Fresh database with seed data
php artisan migrate:fresh --seed

# Create storage link
php artisan storage:link

# Start Vite
npm run dev

# Build frontend assets
npm run build

# Start Laravel development server
php artisan serve

# Run tests
php artisan test

# Clear Laravel caches
php artisan optimize:clear
```

## Contributing

Contributions and improvements are welcome.

If you want to contribute to Evently:

### 1. Clone the repository

```bash
git clone <https://github.com/tayyab1251/evently>
cd evently
```

### 2. Create a feature branch

Create a branch for your feature or fix:

```bash
git checkout -b feature/event-filters
```

Examples:

```text
feature/event-filters
feature/booking-history
fix/stripe-checkout
fix/booking-validation
```

### 3. Make your changes

Implement your feature or fix and test it locally.

### 4. Commit your changes

```bash
git add .
git commit -m "Add event filters"
```

### 5. Push your branch

```bash
git push origin feature/event-filters
```

### 6. Create a Pull Request

Open a Pull Request with a short description of your changes and any relevant screenshots or testing information.

Please keep Pull Requests focused on the feature or issue being worked on.

## Current Status

Evently is currently under active development.

The main event management, booking, authentication, and Stripe payment flows are implemented.

The **User Dashboard is still under development**, including user booking history and account-related functionality.

More features and improvements will be added as the project continues to develop.

### Contributing

If you want to contribute:

1. Clone the repository.

```bash
git clone <https://github.com/tayyab1251/evently>
cd evently
```

2. Create a feature or fix branch.

```bash
git checkout -b feature/event-filters
```

Examples:

```text
feature/event-filters
feature/booking-history
feature/admin-dashboard
fix/booking-validation
fix/stripe-checkout
```

3. Make your changes and test them locally.

4. Commit your changes with a clear commit message.

```bash
git add .
git commit -m "Add event filters"
```

5. Push your branch.

```bash
git push origin feature/event-filters
```

6. Open a Pull Request against the main repository.

In your Pull Request, briefly explain what you changed and why. For UI changes, screenshots are welcome.

Please keep contributions focused and follow the existing Laravel project structure and coding style.

### Permissions

* You may view and study the source code.
* You may fork the repository for the purpose of contributing.
* You may create feature/fix branches and submit Pull Requests.
* You may not use Evently or its source code as your own personal, commercial, or production project without permission from the author.
* You may not redistribute or publish modified copies of Evently as a separate project without permission from the author.

For permissions outside contribution to this repository, please contact the author.
