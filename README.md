# Test Task Application

## Purpose

This project is a School Schedule Generator designed 
to efficiently assign lessons to classes 
while preventing scheduling conflicts. 
The system ensures that:

- A teacher cannot be assigned to two different classes 
at the same time.
- A class cannot have multiple lessons scheduled 
for the same period.

## Technologies

The project uses the following technologies:

- **PHP 8.3** with **Laravel 11.9** framework.
- **Docker** for containerizing the application.
- **MySQL** as the database.

## How to Run

### 1. Clone the Repository

Clone the project repository:

```bash
git clone git@github.com:SerhioHalcyon/school-scheduler-test-task.git
cd school-scheduler-test-task
```
### 2. Set Up the Environment

Create the .env file by copying the .env.example:

```bash
cp .env.example .env
```

The parameters for accessing containers are already prescribed 
in the example file

### 3. Launch with Docker

The project uses Docker Compose to manage services. 
Use the following commands to build and start the containers:

```bash
docker-compose up -d --build
```

### 4. Install Dependencies

Once the containers are running, install Laravel dependencies:

```bash
docker-compose exec app composer install
```

### 5. Run Migrations and Seeders

To create the necessary database tables 
and seed them with state data:

```bash
docker-compose exec app php artisan migrate --seed
```
