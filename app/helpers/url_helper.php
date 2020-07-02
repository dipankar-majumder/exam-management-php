<?php
// Simple page redirect
function redirect($page)
{
  echo 'Redirecting to: ' . URLROOT . '/' . $page;
  header('location:' . URLROOT . '/' . $page);
}
