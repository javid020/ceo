          <div class="main-content container">
        <div class="row">
          <div class="col-12">
            <div class="project-list">
              <div class="project-list-title">Project Progress</div>
              <?php foreach($tasks as $task): ?>
              <div class="project-item">
                <div class="project-item-title"><span class="name"><a href="<?= base_url(); ?>tasks/<?= $task['id']; ?>"><?= $task['title']; ?></a></span></div>
                <div class="project-item-user">
                  <div class="user-avatar"><img src="assets/img/avatars/<?= $task['user_img']; ?>" alt="avatar"></div>
                  <div class="user-info"><span class="name"><a href="<?= base_url(); ?>user/<?= $task['user_id']; ?>"><?= $task['user_name']; ?></a></span><span class="position description"><?= $task['user_role']; ?></span></div>
                </div>
                <div class="project-item-state"><span class="name"><?php if($task['done'] == 0): ?>In Progress <?php else: ?> Done <?php endif; ?></span><span class="description"><?= $task['title']; ?></span></div>
                <div class="project-item-date"><span class="date"><?= $task['deadline']; ?></span></div>
                <div class="project-item-progress">
                  <a target="_blank" href="<?= base_url(); ?>assets/documents/<?= $task['attach']; ?>"><?= ellipsize($task['attach'], 20, .5); ?></a>
                </div>
                <?php if($this->session->userdata('user_id') == 1): ?>
                <div class="project-item-actions"><a href="tasks/edit/<?= $task['id']; ?>"><span class="icon s7-note"></span></a><a href="tasks/delete/<?= $task['id']; ?>"><span class="icon s7-close"></span></a></div>
              <?php endif; ?>
              </div>
            <?php endforeach; ?>
              <div>
                <a href="tasks"><button class="btn btn-space btn-primary"><i class="icon icon-left s7-angle-down-circle"></i> Load More</button></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="widget widget-fullwidth todo-list">
              <div class="widget-head"><span class="title">Todo List</span></div>
              <div class="todo-list-container">
                <ul class="todo-tasks">
                  <?php foreach($todolists as $todolist): ?>
                  <li class="todo-task">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input todos-item" value="<?= $todolist['id']; ?>">
                      <span class="custom-control-indicator"></span><span class="custom-control-description"><?= $todolist['title']; ?></span>
                    </label><a href="#" id="<?= $todolist['id']; ?>" class="close todo-delete"><span class="icon s7-close"></span></a>
                  </li>
                <?php endforeach; ?>
                </ul>
              </div>
              <?php if($this->session->userdata('user_id') == 1): ?>
              <div class="todo-new-task">
                <div class="input-group">
                  <input type="text" placeholder="Add a new task..." class="form-control todo-add-input"><span class="input-group-addon"><a class="todo-add" href="#"><i class="icon s7-plus"></i></a></span>
                </div>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
