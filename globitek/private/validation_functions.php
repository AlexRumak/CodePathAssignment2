<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  //My Custom Validation
  function valid_name_format($value){
    if(!has_valid_name_characters($value)){
      return false;
    } else if(!has_proper_capitalization($value)){
      return false;
    }
    return true;
  }

  function has_valid_name_characters($value) {
    if(preg_match("/[^A-Za-z]/", $value)){
      return false;
    }
    return true;
  }

  //My Custom Validations
  function has_proper_capitalization($value){
    if(preg_match("/[A-Z][a-z]*/", $value)){
      return true;
    }
    return false;
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    if(!no_double_special_email_characters($value)){
      return false;
    } else if (!valid_email_ending($value)){
      return false;
    }
    return strpos($value, '@') !== false;
  }

  //My Custom Validation
  function no_double_special_email_characters($value){
    if(preg_match("/\.\./", $value)) {
      return false;
    } else if (preg_match("/@.*@/", $value)) {
      return false;
    } else{
      return true;
    }
  }

  //My Custom Validation
  function ends_with_digits($value){
    if(preg_match("/\d+$/"), $value){
      return true;
    }
    return false;
  }

  //My Custom Validation
  function valid_email_ending($value){
    if(preg_match("/[A-Za-z0-9-]+$/", $value)){
      return true;
    }
    return false;
  }


  function has_valid_username_characters($value) {
    if (preg_match("/[^a-zA-Z0-9_]/", $value)){
      return false;
    }
    return true;
  }

  function has_valid_phone_characters($value) {
    if (preg_match("/[^0-9 ()-]/", $value)) {
      return false;
    }
    return true;
  }

  function has_valid_email_characters($value) {
    if(preg_match("/[^A-Za-z0-9@._-]/",$value)) {
      return false;
    }
    return true;
  }

  //My Custom Validation
  function is_digits($value) {
    if(preg_match("/[^0-9]/", $value)){
      return false;
    }
    return true;
  }

  //My Custom Validation
  function is_valid_territory_name($value) {
    if(preg_match("/[^a-zA-Z ]/", $value)){
      return false;
    }
    return true;
  }

?>
