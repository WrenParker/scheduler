<!DOCTYPE html>
<html lang="en" dir="ltr">
  <body>
    <?php include 'include/header.php'; ?>
    <div id="user_body" class="container">
      <div class="row">
        <div class="col">
          <h2>Bookmarks</h2>
        </div>
      </div>
      <hr>
      <div class="row my-4">
        <?php foreach ($bookmarks as $event): ?>
          <?php include 'include/schedule/event.php'; ?>
        <?php endforeach; ?>
      </div>
      <?php include 'include/schedule/full-schedule.php' ?>
    </div>
    <?php include 'include/footer.php'; ?>
  </body>
</html>
