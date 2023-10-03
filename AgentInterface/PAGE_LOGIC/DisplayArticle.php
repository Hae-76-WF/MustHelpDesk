<?php
include_once "LgKnowledgeBase.php";
$knowledge = new LgKnowledgeBase();
if (isset($_GET["id"])){
    $knowID = $_GET["id"];
    $knwBase = $knowledge->getKnowledgeBase("", $knowID);
    $content = $knowledge->getKnowledgeBaseContent($knowID);

    if($knwBase != null && $content != null) {
        $rs = '<div class="card">
                <div class="card-header">
                    <h4 class="card-title text-capitalize">' . $knwBase['title'] . '</h4>

                </div>
                <div class="card-body">
                    <h5 class="card-subtitle text-dark text-capitalize p-2">' . $content['section_title'] . '</h5>
                    <div class="card-text p-1">
                        ' . $content['content'] . '
                    </div>
                    <div class="card-img">
                        <img src="../../Uploads/knowledgeBase/' . $content['images'] . '" class="card-img">
                    </div>

                </div>

            </div>';
        echo $rs;
    }else echo "<h6 class='text-dark text-capitalize'>Nothing to show</h6>";

}
else echo "<div class='text-dark '>Nothing to show</div>";
