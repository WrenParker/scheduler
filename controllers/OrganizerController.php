<?php


class OrganizerController
{

  public static function viewOrganizer()
  {
    $top = Event::getEventsByClicks();
    $disabled = Event::getDeletedEvents();

    include '../views/Organizer.php';
  }

  public function toggleEvent($id)
  {
    Event::toggleAttribuite($id, 'isActive');

    header('Location: routes.php?action=viewOrganizer');
  }

}


 ?>
