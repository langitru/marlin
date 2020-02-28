<?php $this->layout('layout', ['title' => 'Edit post']) ?>

      <div class="col-8 offset-2">
      <h1>Edit post </h1>
      <?= flash()->display();?>
      <form action="/postupdate" method="POST">
        <div class="form-group row">
        <input type="hidden" value="<?= $post['id'];?>" name="id" >
          <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="title" value="<?= $post['title'];?>">
          </div>
        </div>
        <button type="submit" class="btn btn-warning">Save post</button>
      </form>
    </div>
 