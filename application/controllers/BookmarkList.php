<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BookmarkList extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookmarkListModel');
    }

    public function ShowList()
    {
      $data = $this->BookmarkListModel->getAllBookmarks();
      if ($data === false)
      {
        echo 'Failed to retrieve bookmarks.';
      }
      else
      {
        // echo $data[0]->url;
        $this->load->view('BookmarkList', array('data'=>$data));
      }
      
    }
}
?>