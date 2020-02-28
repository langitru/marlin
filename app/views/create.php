<?php $this->layout('layout', ['title' => 'Create post']) ?>

    <div class="col-8 offset-2">
      <h1>Add post</h1>
      <?= flash()->display();?>
      <form action="/postnew" method="POST">
        <div class="form-group row">
          <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="title">
          </div>
        </div>
        <button type="submit" class="btn btn-success">Create post</button>
      </form>
    </div>