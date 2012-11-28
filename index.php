<?php
    session_start();
    include 'config.php';

    $pageTitle = 'HOME | landing page';
?>


<!-- Add your site or application content here -->
<?php include 'templates/pagetop.php' ?>
<?php include 'templates/header.php' ?>

<div id="wrapper_middle">
    <div class="wrapper_content">
        <div class="wrapper_landing">
            <ul class="wrapper_entities">
                <li>
                    <figure>
                        <figcaption>People</figcaption>
                        <img width="176" height="176" src="img/icon_people.png" alt="players-managers" title="people" />
                    </figure>
                </li>
                <li>
                    <figure>
                        <figcaption>Team</figcaption>
                        <img width="176" height="176" src="img/icon_team.png" alt="teams" title="teams" />
                    </figure>
                </li>
                <li>
                    <figure>
                        <figcaption>Matches</figcaption>
                        <img width="176" height="176" src="img/icon_matches.png" alt="matches" title="matches" />
                    </figure>
                </li>
                <li>
                    <figure>
                        <figcaption>Tournament</figcaption>
                        <img width="176" height="176" src="img/icon_tournament.png" alt="tournament" title="tournament" />
                    </figure>
                </li>
                <li>
                    <figure>
                        <figcaption>Stadium</figcaption>
                        <img width="176" height="176" src="img/icon_stadium.png" alt="stadium" title="stadium" />
                    </figure>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php 
    echo SQL_SERVER;
?>


<?php include 'templates/pagebottom.php' ?>