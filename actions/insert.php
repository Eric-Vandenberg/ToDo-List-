<?php
    require_once('connect.php');
    $todo_json = file_get_contents('../data/todo.json');
    $output=[];
    if(strlen($todo_json)>0)
    {
        
        $todo_records = json_decode($todo_json,true);
        
        //connect to the database
//        $con = new mysqli("localhost", "root", "root", "todo");
        
        
        //remove all todo items by default, makes it easier to not duplicate content with multiple refreshes of this page
//        $con->query('TRUNCATE todo_items');
        
        mysqli_query($con, 'TRUNCATE todo_items');
        
        //allways thinkinga about errors and debugging
        $errors = [];
        
        //lets loop through the todo.json file and insert the contents into the database
        foreach($todo_records as $key=>$this_record)
        {
            
            $sql = ' INSERT INTO todo_items (`title`, `timestamp`, `details`) VALUES (';
            $sql .= '"'.$this_record['title'].'",';
            $sql .= $this_record['date'].',';
            $sql .= '"'.$this_record['details'].'");';                
            
//            $result = $con->query($sql);
            
            $result = mysqli_query($con, $sql);
            
            if(!$result){
                $errors[] = mysqli_error($result);
            }
        }
        
        
        //check for errors   
        if(count($errors) == 0){
            $output=['success'=>true, 'message'=>'Inserted content successfully'];
        }else{
            $output=['success'=>false, 'message'=>$errors];
        }
        
        //close the connection to the database
        $con->close();
    }
    else
    {
        $output=['success'=>false, 'message'=>'No todo records!'];
    }

    //respond to the request with output
    echo json_encode($output);
?>