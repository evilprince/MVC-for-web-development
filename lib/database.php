<?php
/**
 * 
 * database functionality using PDO library
 * 
 * @author shubham
 *
 */

class Database extends PDO
{

    /**
     *
     * Database Class Constructor
     * @property Database Connection using PDO Class
     */
    public function __construct()
    {
        $dsn=db_service.':dbname='.db_name.';host='.db_host;

        parent::__construct($dsn, db_user, db_pass,array(PDO::ATTR_PERSISTENT));

        //begining of transaction
        parent::beginTransaction();
    }

    /**
     * 
     * Select function using prepared statement
     * @param string $tb_name Table Name to Select
     * @param array $data Associative array
     * @param string $where where to select
     * @return array Array containing fetched data
     */
    public function select($tb_name, $data, $where)
    {
        $field_coloumn=':'.implode(':,', array_keys($data));


        try{

            $sth = $this->prepare("SELECT $field_coloumn FROM $tb_name WHERE $where");
            $sth->execute();
            $this->commit();

        }catch(Exception $e)
        {
           $this->rollBack();
            throw new Exception("error selection");
               return false;
        }
         
        return$sth->fetch();
    }

    /**
     *
     * Update function with prepared statement
     * @param string $tb_name name of the table
     * @param array $data associative array with values
     * @param string $where where part
     * @throws Exception error in updating
     */
    public function update($tb_name, $data, $where)
    {
        $field_option_values=null;

        foreach ($data as $key => $value)
        {
            $field_option_values.=",$key".'=:'.$value;
        }
        $field_option_values = ltrim($field_option_values,',');

        try {
            $sth = $this->prepare("UPDATE $tb_name SET $field_option_values WHERE $where ");

            foreach ($data as $key => $value)
            {
                $sth->bindValue(":$key", $value);

            }

            $sth->execute();
            $this->commit();

        }catch (Exception $e)
        {
            $this->rollBack();
            throw new Exception('error in updating');

        }


    }
    /**
     *
     * insert function using prepared statements
     * @param string $tb_name Name of the table to insert in
     * @param array $data Associative array of data to insert
     */
     
    public function insert($tb_name, $data)
    {
        $field_values =':'. implode(',:', array_keys($data));
        $field_options = implode(',', array_keys($data));

		
        try{

            $sth = $this->prepare("INSERT INTO $tb_name ($field_options) VALUE ($field_values)");

            
            foreach ($data as $key => $value )
            {
            	
                $sth->bindValue(":$key", $value);
            }
           
            //execution
            $sth->execute();
            $this->commit();

        }catch (Exception $e)
        {
            //for rolling back the changes during transaction

            $this->rollBack();


            throw new Exception("error in inseting");
        }
         


    }

    /**
     *
     * Delete database entery using prepared statement
     * @param string $tb_name
     * @param string $where
     * @throws error in deleting
     */
    public function delete($tb_name, $where)
    {

        try {
            $sth = $this->prepare("DELETE FROM $tb_name WHERE $where");
            $sth->execute();

            $this->commit();

        }
        catch (Exception $e)
        {
            $this->rollBack();

            throw new Exception("error in deleting");

        }

    }

}
