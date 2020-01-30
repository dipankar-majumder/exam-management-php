<?php
class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $data = [
      'title' => 'Exam Management',
      'description' => 'Lorem ipsum dolor sit amet, 
      consectetur adipiscing elit, 
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt.'
    ];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About Us',
      'description' => 'Lorem ipsum dolor sit amet, 
      consectetur adipiscing elit, 
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt.'
    ];

    $this->view('pages/about', $data);
  }
  public function test()
  {
    $this->view('pages/test');
  }
}
