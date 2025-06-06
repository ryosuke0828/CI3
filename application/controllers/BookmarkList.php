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

    public function DeleteBookmark($id)
    {
      {
        $result = $this->BookmarkListModel->deleteData($id);
        if ($result === false)
        {
          echo 'Failed to retrieve bookmarks after deletion.';
        }
        else
        {
          redirect('BookmarkList/ShowList');
        }
      }
    }

    public function searchBookmarks()
    {
      $title = $this->input->post('search_title');
      $data = $this->BookmarkListModel->SerchBookmark($title);
      if ($data === false || empty($data))
      {
        echo 'No bookmarks found with that title.';
      }
      else
      {
        $this->load->view('BookmarkList', array('data'=>$data));
      }
    }

    public function favorite($id)
    {
      $result = $this->BookmarkListModel->favoriteData($id);
        if ($result === false)
        {
          echo 'Cannot retrieve';
        }
        else
        {
          redirect('BookmarkList/ShowList');
        }

      }
    }
?>