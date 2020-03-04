<?php 

  $this->layout('layout', ['title' => 'All Posts', 'username' => $username]);
  // $this->layout('layout', ['vars' => ['title' => 'All Posts', 'username1' => $username]]);

 ?>

    
    <h1>All posts</h1>
    <?= flash()->display();?>
    <table class="table">
      <a href="/postcreate" class="btn btn-success">Add post</a>
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
          <td><a href="/postshow/<?= $post['id'];?>"><?= $post['title'];?></a></td>
          <td>
            <a href="/postedit/<?= $post['id'];?>" class="btn btn-warning">Edit</a>
            <a href="/postdelete/<?= $post['id'];?>" 
              class="btn btn-danger" 
              onclick="return confirm('Вы действительно ходите удалить запись?')">Delete
            </a>
          </td>
        </tr>
        <?php endforeach;?>

      </tbody>
    </table>

