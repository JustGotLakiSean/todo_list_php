<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task</title>
</head>

<body>
  <main id="main_task">
    <section id="inbox_container">
      <header>
        <h1>Inbox</h1>
      </header>
      <form action="" method="POST" id="task_form">
        <div id="link_container">
          <div id="task_link_container">
            <a href="#" id="task_link">Task</a>
          </div>
          <div id="done_link_container">
            <a href="#" id="done_link">Done</a>
          </div>
        </div>

        <div>
          <input type="text" name="txt_task" id="txt_task" placeholder="Add new item" />
          <input type="submit" name="btn_add_task" id="btn_add_task" value="+" />
        </div>

        <!-- gawin na to pag nasa back-end na -->
        <!-- <div id="task_container">

        </div> -->
      </form>
    </section>
  </main>
</body>

</html>