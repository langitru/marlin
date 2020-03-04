<?php $this->layout('layout', ['title' => 'Sign Up']) ?>

    <div class="col-8 offset-2">
      <h1>Sign Up</h1>
      <?= flash()->display();?>
      <form action="/signup" method="POST">
        <div class="form-group row">
          <label for="inputUsername" class="col-sm-2 col-form-label">username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputTitle" class="col-sm-2 col-form-label">email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputTitle" class="col-sm-2 col-form-label">password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password">
          </div>
        </div>                
        <button type="submit" class="btn btn-success">Sign Up</button>
      </form>
    </div>