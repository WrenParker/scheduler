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
        <?php foreach ($bookmarks as $bookmark): ?>
          <div class="text-center">
            <a href="routes.php?action=viewEvent&id=<?php echo $bookmark->id ?>">
              <div class="mt-1 mx-1 mb-0 p-2 bookmark bookmarked-event">
                <div class="row mx-2 justify-content-between">
                  <div class="col px-2">
                    <?php echo $bookmark->name ?>
                  </div>
                </div>

              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
      <?php include 'include/schedule/full-schedule.php' ?>
    </div>
    <?php include 'include/footer.php'; ?>
  </body>
</html>
