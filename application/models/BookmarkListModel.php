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
      'SELECT * FROM bookmarks ORDER BY id ASC'
    );

    if ($query==FALSE)
    {
      return false;
    }
    else{
      return $query->result();
    }
  }

  public function SerchBookmark($title)
  {
    $query = $this->db->query(
      'SELECT * FROM bookmarks WHERE title LIKE ? ORDER BY id ASC',
      array('%'.$title.'%')
    );
    if ($query == FALSE)
    {
      return false;
    }
    else
    {
      return $query->result();
    }
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

    public function deleteData($id)
    {
      $query = $this->db->query(
        'DELETE FROM bookmarks WHERE id = ?',
        $id
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