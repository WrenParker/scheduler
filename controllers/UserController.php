<?php


class UserController
{

  public static function showAllEvents()
  {
    $res = Event::getAllEvents();
    $events = Event::buildEventJsonByDay($res);
    $admin = false;

    include '../views/User.php';
  }

  public static function viewEvent($eventId)
  {
    $event = Event::getSingleEventDetails($eventId);
    $timeStamp = strtotime($event->start);
    $date = date("F j, Y", $timeStamp);
    $time = date("g:i a", $timeStamp);

    include '../views/EventDetails.php';
  }

  public static function toggleBookmark($id)
  {
    Event::toggleBookmark($id);

    header('Location: routes.php?action=viewUser');
  }

  public function shareEvent($platform, $url, $id)
  {
    Event::incrementEventAttribute($id, 'shares');
    $event = Event::getSingleEventDetails($id);
    if($platform == 'email') {
      $link = 'mailto:?subject=' . urlencode($event->name . ' is coming up!') . '&body=' . urlencode('Wow, I sure am excited to attend ' . $event->name . ', check it out!');
      header('Location: ' . $link);
    } elseif ($platform == 'twitter') {
      $link = 'https://twitter.com/intent/tweet?url=' . $url . '&text=' . urlencode('Wow, I sure am excited to attend ' . $event->name . ', check it out!') . '&hashtags=eventscheduler,event';
      header('Location: ' . $link);
    } elseif ($platform == 'facebook') {
      $link = 'https://www.facebook.com/sharer.php?u=' . $url;
      header('Location: ' . $link );
    }

  }

}




 ?>
