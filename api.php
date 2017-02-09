<?php

  class API {

    // $db_host = "localhost";
    // $db_username = "root"; //TODO: DO NOT USE ROOT IN PRODUCTION
    // $db_password = ""; //TODO: USE A PASSWORD IN PRODUCTION
    // $db_table = "discordbans";

    function __construct() {}

    function get_mysql() { // In an actual production setting, better security would be implemented.
        $mysql = new mysqli("localhost", "root", "", "discordbans");

        if ($mysql->connect_error) {
            die($mysql->connect_error);
        }

        return $mysql;
    }

    function get_bans() {
      return $this->get_mysql()->query("select * from bans");
    }

    function get_icons() {
      return  $this->get_mysql()->query("select favicon from icons");
    }

    function get_guild_bans($id) {
      return  $this->get_mysql()->query("select * from `user_$id`");
    }

    function get_ban_table_by_ID($id) {
      return $this->get_mysql()->query("select * from bans where discordID = '$id'");
    }
  }
?>
