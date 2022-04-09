<?php

function get_free_incidents(){
    global $db;
    $query = "SELECT * FROM customers inner join incidents on customers.customerID = incidents.customerID where incidents.techID is NULL"; 

    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $incidents = $statement->fetchAll();
        return $incidents;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }

}

function get_free_incidents_with_product_code(){
    global $db;
    $query = "SELECT * FROM customers  join incidents on customers.customerID = incidents.customerID  join products on products.productCode = incidents.productCode where incidents.techID is NULL";
    
    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }

}
function get_assigned_incidents_with_product_code(){

    global $db;
    $query = "SELECT cus.*, tec.firstname as tecF, tec.lastName as tecL, pro.*, inc.* FROM customers cus join incidents inc on cus.customerID = inc.customerID join products pro on pro.productCode = inc.productCode join technicians tec on tec.techID = inc.techID";

    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }

}
function count_assigned_incidents_by_technicians() {
    global $db;
    $query = 'SELECT t.techID, t.firstName, t.lastName, 
    COALESCE(i.openIncidents, 0) AS openIncidents FROM
                (SELECT * FROM technicians) t
                LEFT JOIN
                (SELECT techID, COUNT(*) AS openIncidents 
                    FROM incidents 
                    WHERE techID is not null 
                    GROUP BY techID) i
                ON t.techID = i.techID
                ORDER BY i.openIncidents';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $technicians = $statement->fetchAll();
        return $technicians;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_technician($id) {
    global $db;
    $query = 'SELECT * FROM technicians
              WHERE techID = :id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_incident($id) {
    global $db;
    $query = 'SELECT *
              FROM incidents 
              WHERE incidentID = :id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_customer($customer_id) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE customerID = :customer_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}


function assign_incident($incident_id, $technician_id) {
    global $db;
    $query =
        'UPDATE incidents
         SET techID = :technician_id
         WHERE incidentID = :incident_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':incident_id', $incident_id);
        $statement->bindValue(':technician_id', $technician_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_incidents_unassigned() {
    global $db;
    $query = 'SELECT c.firstName, c.lastName,
                     p.name AS productName,
                     i.*
              FROM incidents i
                  INNER JOIN customers c ON c.customerID = i.customerID
                  INNER JOIN products p ON p.productCode = i.productCode
              WHERE techID IS NULL';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_incidents_assigned($id) {
    global $db;
    $query = 'SELECT c.firstName AS customerFirstName, c.lastName AS customerLastName,
                     t.firstName AS techFirstName, t.lastName AS techLastName,
                     p.name AS productName,
                     i.*
              FROM incidents i
                  INNER JOIN customers c ON c.customerID = i.customerID
                  INNER JOIN products p ON p.productCode = i.productCode
                  INNER JOIN technicians t ON t.techID = i.techID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function update_incident($incident_id, $date_closed, $description) {
    global $db;
    $query =
        'UPDATE incidents
         SET dateClosed = :date_closed,
             description = :description
         WHERE incidentID = :incident_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':date_closed', $date_closed);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':incident_id', $incident_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>



