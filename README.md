# Oil Change Challenge

A small Laravel app that determines whether a car is due for an oil change based on odometer readings and the date of the last oil change.

A car is due for an oil change if either of the following is true:
- It has been more than 5,000 km since the last oil change, or
- It has been more than 6 months since the last oil change.

## Tech Stack

- Laravel 12
- SQLite
- Blade templates (no JavaScript/frontend frameworks)

## Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd oil-change-challenge
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Create the SQLite database file**
   ```bash
   touch database/database.sqlite
   ```
   Make sure your `.env` has:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/database/database.sqlite
   ```
   (Laravel will typically resolve this automatically to `database/database.sqlite` if left blank, but setting it explicitly avoids ambiguity.)

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Visit the app**
   Open `http://127.0.0.1:8000` in your browser.

## Usage

1. Fill in the current odometer reading, the date of the previous oil change, and the odometer reading at the previous oil change.
2. Submit the form to see whether the car is due for an oil change.
3. Each submission is saved and assigned its own result page (`/result/{id}`), so the result persists even if you refresh the page or revisit the link later.
4. Use the "Check another car" link to return to a blank form.

## Routes

| Method | URI              | Description                        |
|--------|------------------|------------------------------------|
| GET    | `/`              | Show the form                      |
| POST   | `/check`         | Validate and save a submission     |
| GET    | `/result/{id}`   | Show the result for a submission   |

## Validation Rules

- All fields are required.
- Current odometer must be a non-negative integer greater than or equal to the previous odometer reading.
- Date of previous oil change must be a valid date in the past.

## Notes

- No authentication, user accounts, or listing of past checks is implemented, per the challenge scope.
- Records are not deleted; each submission remains accessible indefinitely at its own result URL.