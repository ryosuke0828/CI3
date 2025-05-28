<?php
defined('BASEPATH') or exit('no direct script access allowed');

class BookmarkModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function saveData($data)
    {
      $query = $this->db->query(
        'INSERT INTO bookmarks (url, title) values (?, ?)',
        array($data['url'], $data['title'])
      );

      if ($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
}


?>