# Simple Laravel API with Job Queue, Database, and Event Handling

## Objective

This project demonstrates proficiency with Laravel's job queues, database operations, migrations, and event handling. The Laravel API has a single endpoint to process and save data using jobs and events.

## Features

- **API Endpoint**: `api/v1/submit`
- **Data Validation**: Ensures `name`, `email`, and `message` are present.
- **Database Setup**: Uses migrations to create a `submissions` table.
- **Job Queue**: Dispatches a job to process and save data asynchronously.
- **Event Handling**: Triggers an event after successful data save, with a listener logging the success message.

## Project Setup

### Requirements

- Docker
- Docker Compose

## Setup Instructions
```bash
cp .env.example .env
```

Build project:
```bash
make build
```

Run project:
```bash
make up
```

Install dependencies:
```bash
make install
```

Stop project:
```bash
make stop
```

Enter project app container with `bash`:
```bash
make bash
```

Run unit tests:
```bash
make run-php-unit
```

Check the code for standard violations:
```bash
make phpcs
```

Automatically fix code according to the defined standards:
```bash
make phpcbf
```

## Usage

API Endpoint
Endpoint: ```http://127.0.0.1:8000/api/v1/submit```

Method: ```POST```

Payload:

````
{
"name": "John Doe",
"email": "john.doe@example.com",
"message": "This is a test message."
}
````

Run worker to process jobs:
```bash
make run-worker
```

Run command to see lat 10 logs:
```bash
make logs
```

#### Responses
Success: ```HTTP 202 Accepted```
Validation Errors: ```HTTP 422 Unprocessable Entity```


