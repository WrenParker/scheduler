<?php


class OrganizerController
{

  // shows organizer page
  public static function viewOrganizer()
  {
    $top = Event::getEventsByClicks();
    $disabled = Event::getDisabledEvents();
    $admin = false;

    include '../views/Organizer.php';
  }

  // swaps state of event
  public function toggleEvent($id)
  {
    Event::toggleAttribuite($id, 'isActive');

    header('Location: routes.php?action=viewOrganizer');
  }

}


 ?>
