<?php 

    // CRUD methods for phonebook

    function getContactsFromDatabase($searchTerm = ""){
        global $db_connection;
        $user_id = $_SESSION['user']['id'];
        $sql = "SELECT  
                    contacts.id,
                    contacts.first_name,
                    contacts.last_name,
                    contacts.email,
                    contacts.profile_photo,
                    cities.name as city_name,
                    countries.name as country_name
                    FROM `contacts` 
                    LEFT JOIN cities ON contacts.city_id = cities.id
                    LEFT JOIN countries ON countries.id = cities.country_id
                    AND user_id = $user_id";

        if($searchTerm != ""){
            $term = strtolower($searchTerm);
            $sql .= " AND lower(first_name) like '%$term%' OR lower(last_name) like '%$term%' ";
        }

        $res = mysqli_query($db_connection, $sql);

        $contacts = [];
        while($contact = mysqli_fetch_assoc($res)){
            $contacts[] = $contact;
        }

        return $contacts;
    }

    function saveContactToDatabase($first_name, $last_name, $email, $user_id, $city_id, $profile_photo){
        global $db_connection;
        $sql = "INSERT INTO contacts (first_name, last_name, email, user_id, city_id, profile_photo) 
                VALUES ('$first_name', '$last_name', '$email', $user_id, $city_id, '$profile_photo')
                ";
        return mysqli_query($db_connection, $sql);
    }

    function findContactById($id){
        global $db_connection;
        $sql = "SELECT contacts.*, countries.id as country_id 
                FROM contacts,cities,countries 
                WHERE contacts.id = $id
                AND contacts.city_id = cities.id
                AND countries.id = cities.country_id
                ";
        $res = mysqli_query($db_connection, $sql);

        return mysqli_fetch_assoc($res);
    }

    function updateContact($first_name, $last_name, $email, $id, $city_id, $profile_photo){
        global $db_connection;
        $sql = "UPDATE contacts SET 
                first_name = '$first_name', 
                last_name = '$last_name', 
                email = '$email',  
                city_id = $city_id,
                profile_photo = '$profile_photo'
            WHERE id = $id ";
        return mysqli_query($db_connection, $sql);
    }

    function deleteContact($id){
        global $db_connection;

        deletePhotoForUser($id);

        $sql = "DELETE FROM contacts WHERE id = $id";
        return mysqli_query($db_connection, $sql);
    }

    function findUserByUsernameAndPassword($username, $password){
        global $db_connection;
        $sql = "SELECT * FROM users 
                    WHERE username = '$username' 
                    AND `password` = '$password' 
                ";
        $res = mysqli_query($db_connection, $sql);
        return mysqli_fetch_assoc($res);
    }

    function getCountries(){
        global $db_connection;
        $sql = "SELECT * FROM countries ORDER BY name";
        return mysqli_query($db_connection, $sql);
    }

    function getCitiesByCountry($country_id){
        global $db_connection;
        $sql = "SELECT * FROM cities WHERE country_id = $country_id ORDER BY name";
        return mysqli_query($db_connection, $sql);
    }

    function saveCountryToDB($name){
        global $db_connection;
        $sql = "INSERT INTO countries (name, id,) 
                VALUES ('$name', 'id',)
                ";
        return mysqli_query($db_connection, $sql);
    }



    function deleteCountry($id){
        global $db_connection;

        $sql = "DELETE FROM countries WHERE id = $id";
        return mysqli_query($db_connection, $sql);
    }

    function getCities($id){
        global $db_connection;

        $sql = "SELECT * FROM cities ORDER BY NAME";
        return mysqli_query($db_connection, $sql);
    
    }

    function saveCitiesToDB($id, $name, $country_id){
        global $db_connection;
        $sql = "INSERT INTO contacts (id, name, country_id) 
                VALUES ('$id', '$name', $country_id)
                ";
        return mysqli_query($db_connection, $sql);
    }

    
    function deleteCity($id){
        global $db_connection;

        $sql = "DELETE FROM cities WHERE id = $id";
        return mysqli_query($db_connection, $sql);
    }

    function updateCountry($name, $id){
        global $db_connection;
        $sql = "UPDATE countries SET 
                name = '$name', 
               
            WHERE id = $id ";
        return mysqli_query($db_connection, $sql);
    }

    function updateCity($name, $id, $country_id){
        global $db_connection;
        $sql = "UPDATE cities SET 
                name = '$name', 
                country_id = '$country_id'
               
            WHERE id = $id ";
        return mysqli_query($db_connection, $sql);
    }


    
?>