<h1 align="center">
  Laravel 12 DDD & CQRS Skeleton
</h1>

<hr>

<p align="center">
  This repository contains a <strong>PHP application structured following Domain-Driven Design (DDD) and Command Query Responsibility Segregation (CQRS) principles</strong>, powered by Caddy web server for optimal performance and security.
  <br /><br />
  <a href="https://github.com/XRaspall/laravel-cqrs-ddd-skeleton/issues">Report a bug</a> ·
  <a href="https://github.com/XRaspall/laravel-cqrs-ddd-skeleton/issues">Request a feature</a>
</p>

## Installation

### Requirements
- [Install Docker](https://www.docker.com/get-started)
- [Install Docker Compose](https://docs.docker.com/compose/install/)

### Steps

1. Clone the repository
```bash 
git clone https://github.com/XRaspall/laravel-cqrs-ddd-skeleton
```

2. Enter the project folder
```bash
cd laravel-cqrs-ddd-skeleton
```

3. Copy the `.env.example` file to `.env`
```bash
cp .env.example .env
```

4. Build and start the Docker containers
```bash
docker-compose up -d
```

5. Install the PHP dependencies
```bash
docker-compose exec php-laravel-cqrs composer install
```

6. Generate application key
```bash
docker-compose exec php-laravel-cqrs php artisan key:generate
```

7. Run database migrations
```bash
docker-compose exec php-laravel-cqrs php artisan migrate
```

8. Access the application:
   - Web application: http://localhost
   - PHPMyAdmin: http://localhost:8080
     - Username: laravel
     - Password: secret

### Development

The project uses Caddy as web server with the following features:
- Automatic HTTPS (disabled by default)
- FastCGI for PHP processing
- Gzip compression
- Static file serving

To view logs:
```bash
docker-compose logs -f
```

To stop the containers:
```bash
docker-compose down
```

## Project structure and explanation

```
├── .docker/                          # Docker configuration files
│   ├── caddy/                        # Caddy web server configuration
│   └── php/                          # PHP-FPM configuration
├── bootstrap/                        # Laravel Bootstraping
├── config/                           # Laravel configuration files
├── database/                         # Database migrations and seeders
├── public/                           # Public entry point and assets
├── resources/                        # Frontend resources
├── src/
│   ├── App/                          # Application modules
│   │   └── User/                     # User module
│   │       ├── Application/          # Application layer
│   │       │   ├── Commands/         # Command handlers and DTOs
│   │       │   └── Queries/          # Query handlers and DTOs
│   │       ├── Domain/               # Domain layer
│   │       │   ├── Entities/         # Domain entities
│   │       │   ├── Exception/        # Domain exceptions
│   │       │   └── Contracts/        # Domain interfaces
│   │       ├── Infrastructure/       # Infrastructure layer
│   │       │   ├── Providers/        # Infrastructure providers
│   │       │   ├── Repositories/     # Repositories implementations
│   │       │   └── Services/         # External services
│   │       └── Presentation/         # Presentation layer
│   │           ├── Controllers/      # HTTP controllers
│   │           ├── Requests/         # Form requests
│   │           └── Routes/           # Module routes
│   └── Shared/                       # Shared components and utilities
│       ├── Infrastructure/           # Shared infrastructure components
│       ├── Domain/                   # Shared domain components
│       └── Presentation/             # Shared domain presentation components
├── tests/                            # Test suites
│   ├── Unit/                         # Unit tests
│   ├── Integration/                  # Integration tests
│   └── Feature/                      # Feature tests
```

### Architecture Overview

This project follows a clean architecture approach with DDD and CQRS patterns, organized in modules:

#### App Layer (`src/App/`)
- Organized in modules (e.g., User)
- Each module follows clean architecture with four layers:
  - **Application**: Contains commands and queries
  - **Domain**: Contains business logic, entities, and interfaces
  - **Infrastructure**: Contains implementations of interfaces, repositories and external services
  - **Presentation**: Contains controllers, requests, and module routes

#### Shared Layer (`src/Shared/`)
- Contains reusable components across modules
- Includes shared infrastructure implementations
- Provides common domain components
- Reduces code duplication

### Key Features

- **Modular Architecture**: Each module is self-contained with its own layers
- **Clean Architecture**: Clear separation of concerns with four distinct layers
- **CQRS Pattern**: Separates read and write operations for better scalability
- **DDD Principles**: Rich domain model with encapsulated business logic
- **Docker Environment**: Development environment with Caddy, PHP-FPM, and MySQL
- **Testing Structure**: Organized test suites for different testing levels

### Development Guidelines

1. **Module Organization**
   - Keep module-specific code within its module
   - Follow the four-layer architecture in each module
   - Use shared components for common functionality

2. **Layer Responsibilities**
   - **Application**: Orchestrate use cases and handle commands/queries
   - **Domain**: Define business rules and interfaces
   - **Infrastructure**: Implement interfaces and handle external concerns
   - **Presentation**: Handle HTTP requests and responses

3. **Domain Logic**
   - Keep business rules in the domain layer
   - Use value objects for immutable concepts
   - Implement domain events for side effects

4. **Commands & Queries**
   - Commands should be named in imperative form (e.g., `CreateUserCommand`)
   - Queries should be named in question form (e.g., `GetUserByIdQuery`)
   - Use DTOs for data transfer between layers

5. **Testing**
   - Write unit tests for domain logic
   - Use integration tests for infrastructure
   - Implement feature tests for use cases

6. **Code Organization**
   - Keep related code close together
   - Use interfaces for dependencies
   - Follow SOLID principles
