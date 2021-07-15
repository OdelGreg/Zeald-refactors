<?php

class Team
{
    public function __construct(DbInterface $db)
    {
      $this->db = $db;
    }

    public function all()
    {
        $teamSql = "SELECT * FROM team";

        return $this->db->query($teamSql);
    }
}



