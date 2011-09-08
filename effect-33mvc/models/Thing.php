<?php

class Thing {

  private static $database_name  = 'newmuse';
  private static $database_user  = 'root';
  private static $database_pw    = 'annu2011';

  public static function retrieve(array $data = array()) {
    $dbc = mysql_connect('yallara.cs.rmit.edu.au:51886', self::$database_user, self::$database_pw);
    mysql_select_db(self::$database_name);

    $sql = 'SELECT * FROM things';
    if (count($data)) {
      $count = 0;
      foreach ($data as $key => $value) {
        $value = mysql_real_escape_string($value);
        if ((++$count) == 1) {
          $sql .= " WHERE {$key} = {$value}";
        } else {
          $sql .= " AND {$key} = {$value}";
        }
      }

      $result = @mysql_query($sql);
      $rows = array();
      while ($row = @mysql_fetch_array($result, MYSQL_ASSOC)) {
        $rows[] = $row;
      }

      return $rows;
    }
  }

  public static function create(array $data) {

  }

}
