# LIVLINE Coding Test - Task Management API

This project implements a Task Management API using Laravel. It provides CRUD (Create, Retrieve, Update, Delete) operations for managing tasks, adhering to RESTful API design principles. The project demonstrates skills in request handling, validation, error handling, and RESTful API development.

## API Reference

#### Create a Task

```http
  POST /api/tasks/

```

#### Sample json body

```http
    {
        "title": "Task Title",
        "description": "Task description"
    }
```

| Parameter     | Type     | Description                       |
| :------------ | :------- | :-------------------------------- |
| `title`       | `string` | **Required**. Title of task       |
| `description` | `string` | **Optional**. Description of task |

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

| Parameter | Type  | Description                        |
| :-------- | :---- | :--------------------------------- |
| `id`      | `int` | **Required**. Id of task to update |

#### Sample json body

```http
    {
        "title": "Task Title",
        "description": "Task description"
    }
```

| Parameter     | Type     | Description                       |
| :------------ | :------- | :-------------------------------- |
| `title`       | `string` | **Required**. Title of task       |
| `description` | `string` | **Optional**. Description of task |

#### Delete a Task

```http
  DELETE /api/tasks/${id}
```

| Parameter | Type  | Description                       |
| :-------- | :---- | :-------------------------------- |
| `id`      | `int` | **Required**. Id of task to fetch |
