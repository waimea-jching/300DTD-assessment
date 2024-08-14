<div id="libraryMapContainer">
    <div class="child">
        <div id="mapDetails">
    <?php

        require_once 'lib/db.php';

        $db = connectToDB();

        $query = 'SELECT * FROM libraryAreas';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $libraryAreas = $stmt->fetchAll();

        if (isset($libraryAreas)){
            foreach ($libraryAreas as $area){
                echo '<button
                        hx-get="/areaDesc?areaId='. $area['id'] .'"
                        hx-target="#descriptionBox"
                        hx-swap="innerHTML"
                        >'.$area['name'].'</button>';
            }
        }

    ?>
        </div>

        <div id="descriptionBox"></div>
    </div>

    <img class="child" id="libraryMap" src="images/library_maps/LibraryMap(2).png" alt="library map">
</div>