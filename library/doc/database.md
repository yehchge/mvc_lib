#### JREAM Library
* * *

# jream/Database
Makes using PDO a lot easier

    Database::insert($table, $data_array);
    Database::update($table, $data_array, $where_array);
    Database::delete($table, $where_string, $optional_bind_params);
    Database::insertUpdate($table, $data_array);
    
#### Insert
Just pass the table name and a key/value array!

    $db->insert('table', array(
        'name' => 'jesse'
        'age' => 28
    );
    
    $db->id(); // That insert ID
    
#### Update
Same thing as inserting, just supply a key/value for the WHERE.

    $db->update('table', array(
        'name' => joe
    ), array('id' => 1);
    
#### Delete
The only difference is that the WHERE is a string because it is
customizable!

    $db->delete('table', "id = :id", array("id" => 5));

    
#### InsertUpdate
If you have a table with unique pairs, this is very handy

    $db->insertUpdate('table', array('email' => 'unique@me.com');
 
#### Other
The Database wrapper extends PDO, so you can use all the other PDO transactions:

    $db->beginTransaction();
    $db->commit();
    $db->rollBack();
    $db->prepare();


* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)
