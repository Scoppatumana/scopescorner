<?php 
require('connection.php');
    // Function For Temporary Printing
    function printResult($value){
        echo "<pre>", print_r($value, true), "</pre>";
    }

    // Function to execute Query
    function executeQuery($sql, $data){
        global $conn;
        $stmt = $conn->prepare($sql);
        $values = array_values($data);
        $type = str_repeat("s", count($values));
        $stmt->bind_param($type, ...$values);
        $stmt->execute();
        return $stmt;
    }

    // Function To Select All Rows
    function selectAll($table, $conditions = []){
        global $conn;
        $sql = "SELECT * FROM $table";
        if (empty($conditions)) {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }else{
            $i = 0;
          
            foreach ($conditions as $key => $value) {
                if ($i === 0) {
                   $sql = $sql . " WHERE $key = ?";
                }else{
                   $sql = $sql . " AND $key = ?";
                }
                $i++;
            }

            $stmt = executeQuery($sql, $conditions);
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }

    
    // Function To Select One Rows
    function selectOne($table, $conditions){
        global $conn;
        $sql = "SELECT * FROM $table";
        $i = 0;
        
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key = ?";
            }else{
                $sql = $sql . " AND $key = ?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT 1";
        $stmt = executeQuery($sql, $conditions);
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
            
    }

    $conditions = [
         'admin' => 0,
    ];
    
    $users = selectOne("users", $conditions);
    printResult($users);

    // $users = selectAll("users");
    // printResult($users);


?>