<?php

/**
 * This class performs static operations on the event table in the database, specifically performing CRUD operations.
 */
class Event
{

  //returns all event entries in the database.
  public static function getAllEvents()
  {
    $conn = (new DatabaseConnection())->connect();
    return $conn->query('SELECT * FROM `event` ORDER BY `start`');
  }

  // receives queryResults, outputs json to be passed to the views
  public static function buildEventJsonByDay($queryResults)
  {
    $events = array();
    while ($row = $queryResults->fetch_assoc()) {
      // filters out rows that are inactive or do not have start details
      if(isset($row['start']) && $row['isActive']) {
        $rowObject = Event::getEventObject($row);
        $dateTime = new DateTime($row['start']);

        // 'D' is 3 letter day of the week abbreviation, 'M' is 3 letter month abbreviation, 'j' is day# of month no leading zeroes.
        $date = $dateTime->format('D') . ", " . $dateTime->format('M') . " " . $dateTime->format('j');
        // 'g' is 12-hour hour no leading zeroes, 'i' is minutes within hour, 'A' is AM/PM for 12 hour format
        $time = $dateTime->format('g') . ":" . $dateTime->format('i') . $dateTime->format('A');

        // Creates a new array at a given time if it doesn't already exist
        if(!isset($events[$date][$time])) {
          $events[$date][$time] = array();
        }
        array_push($events[$date][$time], $rowObject);

      }
    }
    return $events;
  }

  // Swaps the state of the boolean attributes
  public function toggleAttribuite($eventId, $attribute)
  {
    $conn = (new DatabaseConnection())->connect();
    $statement = $conn->prepare('UPDATE `event` SET ' . $attribute . ' = !' . $attribute . ' WHERE `id`=?');
    $statement->bind_param('i', $eventId);
    $statement->execute();
  }

  // Aids the buildEventJsonByDay function. Takes in a row from the event table.
  public static function getEventObject($eventRow)
  {
    // Prepare host array for return object
    $hosts = array();
    if($queryResults = Event::getHosts($eventRow['id'])) {
      while ($row = $queryResults->fetch_assoc()) {
        array_push($hosts, $row['name']);
      }
    }

    // stdObject of all of the array attributes.
    return (object)['id'=>$eventRow['id'],
                    'name'=>$eventRow['name'],
                    'description'=>$eventRow['description'],
                    'location'=>$eventRow['location'],
                    'start'=>$eventRow['start'],
                    'duration'=>$eventRow['duration'],
                    'clicks'=>$eventRow['clicks'],
                    'shares'=>$eventRow['shares'],
                    'bookmarked'=>$eventRow['bookmarked'],
                    'isActive'=>$eventRow['isActive'],
                    'hosts'=>$hosts];
  }

  // returns list of disabled events
  public static function getDisabledEvents()
  {
    $conn = (new DatabaseConnection())->connect();
    $events = array();
    $queryResults = $conn->query('SELECT * FROM `event` WHERE `isActive`=false');
    while ($row = $queryResults->fetch_assoc()) {
      array_push($events, Event::getEventObject($row));
    }
    return $events;

  }

  public static function getBookmarkedEvents()
  {
    $conn = (new DatabaseConnection())->connect();
    $events = array();
    $queryResults = $conn->query('SELECT * FROM `event` WHERE `isActive`=true AND `bookmarked`=true');
    while ($row = $queryResults->fetch_assoc()) {
      array_push($events, Event::getEventObject($row));
    }
    return $events;
  }

  public static function getSingleEventDetails($eventId)
  {
    $conn = (new DatabaseConnection())->connect();

    $queryResults = $conn->query('SELECT * FROM `event` WHERE `id`=' . $eventId);
    Event::incrementEventAttribute($eventId, 'clicks');

    return Event::getEventObject($queryResults->fetch_assoc());
  }

  public static function incrementEventAttribute($eventId, $attribute)
  {
    $conn = (new DatabaseConnection())->connect();
    $statement = $conn->prepare('UPDATE `event` SET ' . $attribute . '=' . $attribute . ' + 1 WHERE `id`=(?)');
    $statement->bind_param('i',$eventId);
    $statement->execute();
  }

  public static function getEventsByClicks()
  {
    $conn = (new DatabaseConnection())->connect();
    $events = array();
    $queryResults = $conn->query('SELECT * FROM `event` ORDER BY `clicks` DESC');
    while ($row = $queryResults->fetch_assoc()) {
      array_push($events, Event::getEventObject($row));
    }
    return $events;
  }

  // posts a new event to the database
  public static function createEvent($name, $description, $location, $startTime, $duration, $hosts)
  {
    $conn = (new DatabaseConnection())->connect();
    $statement = $conn->prepare('INSERT INTO `event` (name, description, location, start, duration) VALUES (?, ? , ?, ?, ?)');
    $statement->bind_param('ssssi', $name, $description, $location, $startTime, $duration);
    $statement->execute();
    $eventId = $conn->insert_id;

    Event::addHosts($conn, $hosts, $eventId);
  }

  public static function updateEvent($id, $name, $description, $location, $startTime, $duration, $hosts)
  {
    $conn = (new DatabaseConnection())->connect();
    $statement = $conn->prepare('UPDATE `event` SET `name`=(?), `description`=(?), `location`=(?), `start`=(?), `duration`=(?) WHERE `id`=(?)');
    $statement->bind_param('ssssii', $name, $description, $location, $startTime, $duration, $id);
    $statement->execute();

    Event::updateHosts($conn, $hosts, $id);
  }

  public static function getHosts($eventId)
  {
    $conn = (new DatabaseConnection())->connect();
    return $conn->query('SELECT * FROM `host` WHERE `event_id`=' . $eventId . ';');
  }

  public static function addHosts($conn, $hosts, $eventId)
  {
    $arr = explode(',', $hosts);
    for($i=0; $i<count($arr); $i++) {
      $statement = $conn->prepare('INSERT INTO `host` (name, event_id) VALUES (?, ?)');
      $statement->bind_param('si', $arr[$i], $eventId);
      $statement->execute();
    }
  }

  public static function updateHosts($conn, $hosts, $eventId)
  {
    $conn->query('DELETE FROM `host` WHERE `event_id`=' . $eventId . ';');
    Event::addHosts($conn, $hosts, $eventId);
  }
}


 ?>
