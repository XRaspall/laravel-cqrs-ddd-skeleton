<h1 align="center">
  Laravel 12 DDD & CQRS Skeleton
</h1>

<hr>

<p align="center">
  This repository contains a <strong>PHP application structured following Domain-Driven Design (DDD) and Command Query Responsibility Segregation (CQRS) principles</strong>.
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
4. Build the Docker containers
```bash
docker-compose up -d
```
5. Install the PHP dependencies
```bash
docker-compose exec app composer install
```

## Project structure and explanation
