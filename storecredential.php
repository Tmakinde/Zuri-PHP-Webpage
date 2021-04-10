<?php

  function data($id){
    return [
      $id => [
        "username" => $_POST['username'],
        "password" => $_POST['password']
      ]
    ];
  }

  function saveData(){
    $filename = "database.txt";
    $fileResource = fopen("database.txt", 'a');
    $countLine = count(file($filename));
    $checker = false;

    if ($countLine == 0) {
      fwrite($fileResource, json_encode(data($countLine+1)));
    }else{
      // read file
      $fileRead = fopen("database.txt", 'r');
      // loop through line
      while (!feof($fileRead)) {
        $line = fgets($fileRead);
        // check line for username
        foreach (json_decode($line) as $key => $value) {
          if ($value->username == $_POST['username']) {
            $checker = true;
          }
        }
      }
      // if username exist
      if ($checker) {
        fclose($fileResource);
        return "username has been used!";
      }else{
        //save details
        fwrite($fileResource, "\n".json_encode(data($countLine+1)));
        fclose($fileResource);
      }
      
    }
    return "<h3>you have successfully register</h3>";
  }

  function checkCredential(){
    // read file
    $fileRead = fopen("database.txt", 'r');
    $checker = false;
    // loop through line
    while (!feof($fileRead)) {
      $line = fgets($fileRead);
      // check line for username and password
      if(!empty($line)){
        foreach (json_decode($line) as $key => $value) {
          if ($value->username == $_POST['username'] && $value->password == $_POST['password']) {
            $checker = true;
          }
        }
      }
      
    }
    // if username exist
    if ($checker) {
      fclose($fileRead);
      return true;
    }else{
      fclose($fileRead);
      return false;
    }
    
  }

  function checkUsername(){
    // read file
    $fileRead = fopen("database.txt", 'r');
    $checker = false;
    // loop through line
    while (!feof($fileRead)) {
      $line = fgets($fileRead);
      // check line for username and password
      if (!empty($line)) {
        foreach (json_decode($line) as $key => $value) {
          if ($value->username == $_POST['username']) {
            $checker = true;
          }
        }
      }
      
    }
    // if username exist
    if ($checker) {
      fclose($fileRead);
      return true;
    }else{
      fclose($fileRead);
      return false;
    }
    
  }

  function resetpassword(){
    // read file
    $fileRead = fopen("database.txt", 'a+');
    $checker = false;
    // loop through line
    while (!feof($fileRead)) {
      $line = fgets($fileRead);
      // check line for username and password
      foreach (json_decode($line) as $key => $value) {
        if ($value->username == $_SESSION['username']) {
          // replace the password value
          $newData = [
            $key => [
              "username" => $_SESSION['username'],
              "password" => trim($_POST['password'])
            ]
          ];

          file_put_contents("database.txt", json_encode($newData));
          $checker = true;
        }
      }
    }
    // if username exist
    if ($checker) {
      fclose($fileRead);
      return true;
    }else{
      fclose($fileRead);
      return false;
    }

  }


?>