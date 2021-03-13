<?php
session_start();
// include('config/db.php');
include('./controllers/task.php');
// $connection = new db();
$display_task = $connection->displayTask($_SESSION['uid'], $_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task</title>
  <style>
    <?php include 'styles/task.css'; ?>
  </style>
</head>

<body>
  <main id="main_task">
    <section id="inbox_container">
      <form action="" method="POST" id="task_form">
        <h1 id="task_title">ToDo</h1>
        <div id="link_container">
          <div id="task_link_container">
            <a href="#" id="task_link">Task</a>
            <div id="task_underline"></div>
          </div>
          <div id="done_link_container">
            <a href="#" id="done_link">Done</a>
          </div>
        </div>

        <div id="task_group">
          <input type="text" name="txt_task" id="txt_task" placeholder="Add new item" required />
          <input type="hidden" name = "txt_date_added" id="txt_date_added" value="<?=date("Y-m-d");?>" />
          <input type="hidden" name = "txt_date_completed" id="txt_date_completed" value="<?=date("Y-m-d");?>" />
          <input type="hidden" name="txt_taskby_uid" id="txt_taskby_uid" value="<?=$_SESSION['uid'];?>" />
          <input type="hidden" name="txt_taskby_username" id="txt_taskby_username" value="<?=$_SESSION['username'];?>" />
          <input type="submit" name="btn_add_task" id="btn_add_task" value="+" />
        </div>

        <!-- gawin na to pag nasa back-end na -->
        <div id="task_container">
          <div id="item">
            <?php
            while($row = $display_task->fetch_array(MYSQLI_ASSOC)):
              $task_name = $row['task_name'];
              $task_id = $row['task_id'];
              $taskby_uid = $row['taskby_uid'];
              $taskby_username = $row['taskby_username'];
              $is_task_completed = $row['is_task_completed'];
              $date_added = $row['date_added'];
              $date_completed = $row['date_completed'];
              $show_completed_task = $row['show_completed_task'];
              $task_deleted = $row['task_deleted'];
            ?>
            <input type='submit' name='btn_check_task' id='btn_check_task' value='CHECK' />
            <input type='text' name='task_name' id='task_name' value='<?=$task_name;?>' />
            <input type='hidden' name='txt_task_id' id='txt_task_id' value='<?=$task_id;?>' />
            <input type='hidden' name='txt_taskby_uid' id='txt_taskby_uid' value='<?=$taskby_uid;?>' />
            <input type='hidden' name='txt_taskby_username' id='txt_taskby_username' value='<?=$taskby_username;?>' />
            <input type='hidden' name='txt_is_task_completed' id='txt_us_task_completed' value='<?=$is_task_completed;?>' />
            <input type='hidden' name='txt_date_added' id='txt_date_added' value='<?=$date_added;?>' />
            <input type='hidden' name='txt_date_completed' id='txt_date_completed' value='<?=$date_completed;?>' />
            <input type='hidden' name='txt_show_completed_task' id='txt_show_completed' value='<?=$show_completed_task;?>' />
            <input type='hidden' name='txt_task_deleted' id='txt_task_deleted' value='<?=$task_deleted;?>' />
            <input type='submit' name='btn_complete_task' id='btn_complete_task' value='COMPLETE' />
            <?php endwhile; ?>
          </div>
        </div>

      </form>
    </section>

    <section id="logout_section">
      <div>
        <a href="./logout.php" >Logout</a>
      </div>
    </section>
  </main>
</body>

</html>