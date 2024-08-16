<div id="libraryMapContainer">
    <div class="child" id="libraryButtons">
        <div id="mapDetails">
            <?php
            require_once 'lib/db.php';

            $_SESSION['game']['currentQuestion'] = 0;

            $db = connectToDB();

            $query = 'SELECT * FROM libraryAreas';
            $stmt = $db->prepare($query);
            $stmt->execute();
            $libraryAreas = $stmt->fetchAll();

            if (isset($libraryAreas)){
                foreach ($libraryAreas as $area){
                    echo '<button
                            class="libraryButton"
                            hx-get="/areaDesc?areaId='. $area['id'] .'"
                            hx-target="#descriptionBox"
                            hx-swap="innerHTML"
                            >'.$area['name'].'</button>';
                }
            }

            ?>
            <a href="/questions" id="beginButton" role="button">Begin</a>
        </div>

        <div 
            id="descriptionBox"
            hx-get="/descriptionBoxText"
            hx-swap="innerHTML"
            hx-trigger="load"
        ></div>

    </div>

    <img class="child" id="libraryMap" src="images/library_maps/LibraryMap(2).png" alt="library map">
</div>