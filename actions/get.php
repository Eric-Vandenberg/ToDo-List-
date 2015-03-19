<?php
//    $todo_json = file_get_contents('../data/todo.json');

    require_once('connect.php');

    $sql = 'SELECT * FROM todo_items';

    $results = mysqli_query($con, $sql);
    
    $output=[];
    
    $html='<div class="row row-header">
            <div class="col-md-4">Title</div>
            <div class="col-md-4">Date</div>
            <div class="col-md-4">Details</div>
        </div>';

    while($todo_row = mysqli_fetch_assoc($results)){
        
        $ID = $todo_row['ID'];
        $title = $todo_row['title'];
        $timestamp = $todo_row['timestamp'];
        $details = $todo_row['details'];
        
        $todo_item_html = 
                "<div class='row todo-record' data-id='$ID'>
                    <div class='col-md-4 todo-title'>$title</div>
                    <div class='col-md-4 todo-date'>".date('Y-m-d H:i:s',$timestamp)."</div>
                    <div class='col-md-4 todo-details'>".nl2br($details)."</div>
                </div>\n";
            $html.=$todo_item_html;
    }

    if(mysqli_num_rows($results) > 0){
        $output=['success'=>true, 'html=>$html'];
    }else{
        $output=['success'=>false, 'message'=>'No todo records!'];
    }
    echo($html);














?>