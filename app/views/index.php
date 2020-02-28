<?php $this->layout('layout', ['title' => 'All Posts']) ?>


    <h1>All posts</h1>
    
<!--     <?php //if (FlashMessages::show()):?>
      <div class="box-messages alert alert-success" role="alert">
        <?php //echo FlashMessages::show();?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php //endif;?>

 -->
    <table class="table">
      <a href="/create" class="btn btn-success">Add post</a>
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($posts as $post):?>
        <tr>
          <th scope="row"><?= $post['id'];?></th>
          <td><a href="/postshow?id=<?= $post['id'];?>"><?= $post['title'];?></a></td>
          <td>
            <a href="/postedit?id=<?= $post['id'];?>" class="btn btn-warning">Edit</a>
            <a href="/postdelete?id=<?= $post['id'];?>" 
              class="btn btn-danger" 
              onclick="return confirm('Вы действительно ходите удалить запись?')">Delete
            </a>
          </td>
        </tr>
        <?php endforeach;?>

      </tbody>
    </table>

