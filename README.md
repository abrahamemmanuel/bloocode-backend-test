# Backend Developer Interview Task

## Project Overview:

An Employee Management System that allows admins to perform CRUD operations on employee records, assign roles, search for employees, and update employee status.

## Task Specifications:

1. Employee CRUD Operations:

-   Create endpoints to perform CRUD operations on employee records.
-   Ensure a well-structured payload for creating and updating employees.

2. Role Assignment:

-   Implemented an endpoint to allow admins to assign roles to employees.
-   Valid roles: [manager, developer, design, scrum master].

3. Search Functionality:

-   Created a single endpoint to find employees by name and ID.

4. Admin Dashboard:

-   Provided an admin dashboard with endpoints to:
    -   Retrieve total employees.
    -   Retrieve total available roles.
    -   Create and delete job roles.

5. Status Updates:

-   Implemented an endpoint allowing admins to update the status of an employee (employed or fired).

## Technical Guide for Laravel:

1. Clone the project repository:

```bash
git clone https://github.com/abrahamemmanuel/bloocode-backend-test.git
```

2. Install project dependencies:

```bash
composer install
```

3. Generate a new application key:

```bash
php artisan key:generate
```

4. Copy the `.env.example` file to a new `.env` file:

```bash
cp .env.example .env
```

5. Create a new database and update the `.env` file with your database credentials. Postgres was used by default.

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=bloo_code
DB_USERNAME=root
DB_PASSWORD=root
```

6. Run DB migrations:

```bash
php artisan migrate
```

7. Start the development server:

```bash
php artisan serve
```

8. Postman Collection:

-   Import the postman collection from the `postman` directory to test the API endpoints.
    [Postman Collection Link](https://documenter.getpostman.com/view/5744463/2sA35EZ2yG)
