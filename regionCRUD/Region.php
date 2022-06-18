<?php
 
 class Region
 {
    public $id = null;
    public $name = null;
    public $slug = null;

    public static function getById($id) 
    {
      $query = "SELECT * 
                 FROM `regions`
                 WHERE `id`= ?";

      return DB::selectOne($query, [$id], 'Region');
    }

    public static function getAll() 
    {
      $query = "SELECT * 
                 FROM `regions`
                 WHERE 1";

      return DB::select($query, [], 'Region');
    }

    
    public function insert() 
    {
         $query = "INSERT INTO `regions` (`name`, `slug`) 
                   VALUES(?,?)";

         DB::insert($query, [$this->name, $this->slug]);
         $this->id = DB::lastInsertId();

    }

    public function update() 
    {
       if(empty($this->id)){
          return false;
       } else {
         $query = "UPDATE `regions` 
                   SET `name` = ?,
                      `slug` = ?
                   WHERE `id` = ?";

         DB::update($query, [$this->name, $this->slug, $this->id]);
       }
    }

    public function save() 
    {
       
       if($this->id) {
          $this->update();
       } else {
          $this->insert();
       }

    }
    public function delete() 
    {
      $query = "DELETE FROM `regions` 
                WHERE `id` = ? 
                LIMIT 1";
      
      if($this->id) {
         DB::delete($query, [$this->id]);
      } else {
         return false;
      }
    }
 }