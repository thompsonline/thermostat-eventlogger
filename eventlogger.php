<?php
  define("SECURITY_KEY",'<key>');
  define("DB_NAME","<db name>");
  define("DB_USER", "events");
  define("DB_PWD", "<db pwd for user Events>");

  $type = isset($_GET['type']) ? $_GET['type'] : NULL; 
  $device = isset($_GET['device']) ? $_GET['device'] : NULL;
  $info = isset($_GET['info']) ? $_GET['info'] : NULL;
  $key = isset($_GET['key']) ? $_GET['key'] : "";

  if ($key == SECURITY_KEY) { 
    if (isset($type) && isset($device) && isset($info)) {
      $db = new mysqli("localhost", DB_USER, DB_PWD, DB_NAME);
      if ($db->connect_errno) {
        echo "Unable to connect to database";
      } else {
        if ($stmt = $db->prepare("insert into Events(type,device,info) values (?,?,?)")) {
          if ($stmt->bind_param("sss", $type, $device, $info)) {
            if (!$stmt->execute()) {
              error_log("eventlogger. Unable to save. $stmt->error");
            }
          } else {
            error_log("eventlogger. Unable to bind. $stmt->error");
          }
          $stmt->close();
        }
        $db->close();
      }
    } else {
      error_log("eventlogger. Invalid parameter: ".print_r($_GET, true));
    }
  } else {
    error_log("eventlogger. Invalid key: ".$key);
  }
?>
