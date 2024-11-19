# LIVLINE Coding Test - Task Management API

This project implements a Task Management API using Laravel. It provides CRUD (Create, Retrieve, Update, Delete) operations for managing tasks, adhering to RESTful API design principles. The project demonstrates skills in request handling, validation, error handling, and RESTful API development.

## API Reference

#### Get all Task

```http
  GET /api/tasks
```

#### Retrieve a Task by ID

```http
  GET /api/tasks/${id}
```

| Parameter | Type  | Description                       |
| :-------- | :---- | :-------------------------------- |
| `id`      | `int` | **Required**. Id of task to fetch |

#### Update a Task

```http
  PUT /api/tasks/${id}
```

| Parameter | Type  | Description                       |
| :-------- | :---- | :-------------------------------- |
| `id`      | `int` | **Required**. Id of task to fetch |

#### Delete a Task

```http
  DELETE /api/tasks/${id}
```

| Parameter | Type  | Description                       |
| :-------- | :---- | :-------------------------------- |
| `id`      | `int` | **Required**. Id of task to fetch |
