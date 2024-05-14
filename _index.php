<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPSC431-01 Final Project</title>
</head>
<body>
<div class="container">
    <h1>Todo List</h1>
    <form action="todo.php" method="POST">
        <input type="text" name="task" placeholder="Enter a new task" required>
        <input type="submit" value="Add Task">
    </form>
    <ul>
        <li>
            <input type="checkbox">
            <span>Task 1</span>
            <a href="todo.php?delete=1">Delete</a>
        </li>
        <li>
            <input type="checkbox">
            <span>Task 2</span>
            <a href="todo.php?delete=2">Delete</a>
        </li>
        <li>
            <input type="checkbox">
            <span>Task 3</span>
            <a href="todo.php?delete=3">Delete</a>
        </li>
</div>

</body>
</html>