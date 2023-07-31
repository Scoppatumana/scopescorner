<?php
    require("connection.php");

    // Temporary Printing
    function printTemp($value){
        echo "<pre>", print_r($value, true) ,"</pre>";
    }

    // Execute Query
    function executeQuery($sql, $data){
        global $conn;
        $stmt = $conn->prepare($sql);
        $conditionValues = array_values($data);
        $type = str_repeat("s", count($conditionValues));
        $stmt->bind_param($type, ...$conditionValues);
        $stmt->execute();
        return $stmt;
    }



    // Function To Select All Row From The Database With/Without Conditions
    function selectAll($table, $conditions= []){
        global $conn;
        $sql = "SELECT * FROM $table";
        if(empty($conditions)){
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }else{
            $i = 0;
            foreach ($conditions as $key => $value) {
                if ($i === 0) {
                    $sql = $sql . " WHERE $key =?";
                }else{
                    $sql = $sql . " AND $key =?";
                }
                $i++;
            }
            $stmt = executeQuery($sql, $conditions);
            $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $record;
        }
        
        
    }

    // Function to Select Just One Row
    function selectOne($table, $conditions= []){
        global $conn;
        $sql = "SELECT * FROM $table";
        $i = 0;
      
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key =?";
            }else{
                $sql = $sql . " AND $key =?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT 1";
        
        $stmt = executeQuery($sql, $conditions);
        $record = $stmt->get_result()->fetch_assoc();
        return $record;
    }

    $conditions = [
        'lastname' => 'Sadeeqiin',
        'username' => 'Zheaghearl'
    ];



    $users = selectOne("users", $conditions);
    printTemp($users);

?>