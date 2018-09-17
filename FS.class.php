<?php

class FS
{
  public static function separator()
  {
    return DIRECTORY_SEPARATOR;
  }
  
  public static function toNativeSeparators($pname)
  {
    return str_replace(array('\\', '/'), static::separator(), $pname);
  }
  
  public static function rmDoubleSeparators($pname)
  {
    $doubleSeparators = static::separator() . static::separator();
    
    while (strpos($pname, $doubleSeparators) !== false) {
      $pname = str_replace($doubleSeparators, static::separator(), $pname);
    }
    
    return $pname;
  }
  
  public static function rmTrailingSeparator($pname)
  {
    return rtrim($pname, static::separator());
  }
  
  public static function checkTrailingSeparator($pname)
  {
    return static::rmTrailingSeparator($pname) . static::separator();
  }
  
  public static function rmLeadingSeparator($pname)
  {
    return ltrim($pname, static::separator());
  }
  
  public static function checkLeadingSeparator($pname)
  {
    return static::separator() . static::rmLeadingSeparator($pname);
  }
}
