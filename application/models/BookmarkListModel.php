<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookmarkListModel extends CI_Model{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function getAllBookmarks()
  {
    $query = $this->db->query(
      'SELECT * FROM bookmarks ORDER BY id DESC'
    );

    if (!$query)
    {
      return false;
    }
    else{
      return $query->result();
    }
  }
}
?>