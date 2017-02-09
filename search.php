<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>

        <title>DiscordBans - Search</title>
    </head>

    <body>
        <?php
            require_once("api.php");
            require("header.php");

            $api = new API();
            $post_id = null;

            if(isset($_POST["header-query"])){

              $post_id = $_POST["header-query"];

            } elseif (isset($_POST["discord_button"])) {

              $post_id = $_POST["discord_button"];

            } else {
              header("Location: error.php");
            }

            $guild_query = $api->get_guild_bans($post_id);

        ?>

        <div class="jumbotron">
            <div class="container">
                <h1>User Search: <?php echo $post_id ?>  </h1>
                <p>Here's what we found...</p>
            </div>
        </div>

        <div class="container">
            <table class="table table-bordered">
                <tr>
                  <th>Guild ID</th>
                  <th>Ban Date </th>
                </tr>
                <?php

                  while(($guild = $guild_query->fetch_assoc())) {
                 ?>

                 <tr>
                    <td><?php echo $guild["guildID"]; ?></td>
                    <td><?php echo $guild["ban_date"]; ?></td>
                 </tr>
                 <?php } ?>
            </table>
        </div>
    </body>
</html>
