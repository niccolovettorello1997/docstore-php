# DocStore-PHP

DocStore-PHP is a lightweight, framework-free **document storage microservice** written in PHP 8.
It provides a simple REST API for storing, retrieving, listing, and deleting documents using **PostgreSQL (JSONB)** as a flexible persistence layer.

This service is designed to act as the central storage component in a small microservice ecosystem.

---

## Features

* Store arbitrary JSON documents
* Retrieve documents by ID
* List documents
* Delete documents
* Uses PostgreSQL with JSONB
* Lightweight architecture, no frameworks
* Built for integration with other microservices

---

## Requirements

* PHP 8.3
* Composer
* PostgreSQL 14+
* Docker

---

## Installation

```bash
composer install
```

---

## Running with Docker

```bash
docker-compose up --build
```

---

## Basic API (draft)

| Method | Endpoint         | Description          |
| ------ | ---------------- | -------------------- |
| POST   | `/documents`     | Store a new document |
| GET    | `/documents/:id` | Retrieve a document  |
| GET    | `/documents`     | List documents       |
| DELETE | `/documents/:id` | Delete a document    |

---

## License

MIT © 2025 Niccolò Vettorello