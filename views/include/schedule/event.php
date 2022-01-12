<div onclick="togglePopup(this)" class="col-md-4 col-10 my-2 event-wrapper">
  <div class="mt-1 mx-1 mb-0 p-2 <?php echo ($event->bookmarked == true && !$admin ? 'bookmarked-event' : 'event') ?>">
    <?php echo $event->name ?>
  </div>
  <div style="display:none;" class="mt-1 mx-1 mb-1 p-2 w-100 pop-up">
    <?php if ($event->hosts[0]!==''): ?>
    <p>Hosts:
    <?php for ($i=0; $i<count($event->hosts); $i++): ?>
       <?php
        echo $event->hosts[$i];
        echo (count($event->hosts) !== $i+1) ? "," : "";
       ?>
    <?php endfor; ?>
    </p>
    <?php endif; ?>
    <p>Description: <?php echo $event->description ?></p>
    <p>Location: <?php echo $event->location ?></p>
    <p>Duration: <?php echo $event->duration . ($event->duration == '1' ? ' Minute' : ' Minutes') ?></p>
    <?php if ($admin): ?>
      <div class="d-flex">
        <button onclick='editEvent(<?php echo json_encode($event) ?>)' class="btn btn-warning mr-1" type="button" data-toggle="collapse" data-target="#create-form">
          Edit Event
        </button>

        <form onsubmit="return confirm('Are you sure you want to delete?')" class="ml-1" action="routes.php?action=deleteEvent" method="post">
          <input type="hidden" name="event" value="<?php echo $event->id ?>">
          <button class="btn btn-danger" type="submit">Disable Event</button>
        </form>

      </div>
    <?php else: ?>
      <div class="d-flex">
        <a class="btn btn-success mr-1" href="routes.php?action=viewEvent&id=<?php echo $event->id ?>">
          View Event
        </a>

        <form class="ml-1" action="routes.php?action=bookmark" method="post">
          <input type="hidden" name="id" value="<?php echo $event->id ?>">
          <button class="btn btn-warning" type="submit"><?php echo ($event->bookmarked == true ? 'Unbookmark' : 'Bookmark') ?></button>
        </form>

      </div>
    <?php endif; ?>
  </div>
</div>
