<div class="row mt-5">
  <div class="col mx-2">
    <h1>Disabled Events</h1>
  </div>
</div>
<div class="row">
  <div class="col">
    <?php if (!empty($disabled)): ?>
      <?php foreach ($disabled as $event): ?>
        <a href="routes.php?action=viewEvent&id=<?php echo $event->id ?>">
          <div class="mt-1 mx-1 mb-0 p-2 event">
            <div class="row mx-2 justify-content-between">
              <div class="col px-2">
                <?php echo $event->name ?>
              </div>
              <div class="col px-2 text-right">
                <form class="" action="routes.php?action=restoreEvent" method="post">
                  <input type="hidden" name="id" value="<?php echo $event->id ?>">
                  <input type="hidden" name="admin" value="<?php echo $admin ?>">
                  <button class="btn btn-success" type="submit" name="button">Restore Event</button>
                </form>
              </div>
            </div>

          </div>
        </a>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="mx-2">
        No Events Available to Restore!
      </div>
    <?php endif; ?>
  </div>
</div>
