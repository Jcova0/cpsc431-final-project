<?php
    require 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
        <div class="add-section">
            <form action="api/add_item.php" method="POST">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" name="name" placeholder="Add new item" />
                <button type="submit">Add Item</button>

                <?php }else{ ?>
                <input type="text" name="name" placeholder="Add new item" />
                <button type="submit">Add Item</span></button>
                <?php } ?>
            </form>
    </div>

    <?php
      $todos = $conn->query("SELECT * FROM todos ORDER BY idx DESC");
    ?>

    <div class="show-todo-section">
        <?php if($todos->rowCount() <= 0) { ?>
            <div class="todo-item">
                <div class="empty">
        
                </div>
            </div>
        <?php } ?>

        <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['idx']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['idx']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['name'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['idx']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['name'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $todo['created'] ?></small> 
                </div>
            <?php } ?>
    <script src="js/script.js"></script>
</body>
</html>