<div class="main-content container">
  <div class="row">
          <div class="col-12">
            <div class="project-list">
              <?php if($this->session->userdata('user_id') == 1): ?>
              <div style="float: right;"><a href="<?= base_url(); ?>tasks/add"><button class="btn btn-space btn-primary"><i class="icon icon-left s7-plus"></i>&nbsp; Add tasks</button></a></div>
            <?php endif; ?>
              <div class="project-list-title">Project Progress</div>
              <?php foreach($tasks as $task): ?>
              <div class="project-item">
                <div class="project-item-title"><span class="name"><a href="<?= base_url(); ?>tasks/<?= $task['id']; ?>"><?= $task['title']; ?></a></span></div>
                <div class="project-item-user">
                  <div class="user-avatar"><img src="assets/img/avatars/<?= $task['user_img']; ?>" alt="avatar"></div>
                  <div class="user-info"><span class="name"><?= $task['user_name']; ?></span><span class="position description"><?= $task['user_role']; ?></span></div>
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
            </div>
          </div>
        </div>
      </div>