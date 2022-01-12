<?php


class AdminController
{

  public static function viewAdmin()
  {
    $res = Event::getAllEvents();
    $events = Event::buildEventJsonByDay($res);
    $disabled = Event::getDisabledEvents();

    $admin = true;
    include '../views/Admin.php';
  }

  public static function createEvent($id, $name, $description, $location, $startTime, $duration, $hosts)
  {
    if(isset($name) && isset($description) && isset($location) && isset($startTime) && isset($duration))
    {
      if($id!=='')
      {
        Event::updateEvent($id, $name, $description, $location, $startTime, $duration, $hosts);
      }
      else
      {
        Event::createEvent($name, $description, $location, $startTime, $duration, $hosts);
      }
    }

    header('Location: routes.php?action=viewAdmin');
  }

  public static function toggleEvent($id)
  {

    Event::toggleAttribuite($id, 'isActive');

    header('Location: routes.php?action=viewAdmin');
  }

}




 ?>
