<?php

abstract class model {

    public function save()
    {
        if ($this)->id != ''){
        $sql = $this->update();
        } else {
        $sql = $this->insert();
    }
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $array = get_object_vars($this);
        foreach (array_flip($array) as $key=>$value) {
            $statement->bindParam(":$value", $this->$value);
        }
        $statement->execute();
        $id = $db->lastInsertId();
        return $id;

        }
    }

}