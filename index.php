<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>

        <title>DiscordBans - Home</title>
    </head>

    <body>
        <?php
            require("api.php");
            require("header.php");
        ?>

        <div class="jumbotron">
            <div class="container">
                <h1>DiscordBans</h1>
                <p>Online ban records for Discord Guilds.</p>
            </div>
        </div>

        <div class="container">
          <form action="search.php" method="post">
            <table class="table table-bordered">
                <tr>
                    <th>Profile Picture</th>
                    <th>Username</th>
                    <th>Snowflake ID</th>
                    <th>Number of Bans </th>
                    <th>Date</th>
                    <th>Explore Entry</th>
                </tr>

                <?php
                  $api = new API();
                  $cons = $api->get_mysql();

                  $bans = $api->get_bans();
                  $icons = $api->get_icons();

                    while (($ban = $bans->fetch_assoc()) && $icon = $icons->fetch_assoc()) {
                ?>
                        <tr>
                            <td> <img src="<?php echo $icon["favicon"] ?>" style="width:100px;height:100px;"/></td>
                            <td><?php echo $ban["user"];?></td>
                            <td> <?php echo $ban["discordID"] ?></td>
                            <td><?php echo $ban["ban_count"] ?></td>
                            <td><?php echo $ban["lastbandate"] ?></td>
                            <td><button class="btn btn-primary" type=submit name="discord_button" value="<?php echo $ban["discordID"]?>"> Request </button> </td>
                        </tr>
                <?php }?>
            </table>
          </form>
        </div>
    </body>
</html>
