<?php

class registry
{
   private static $registered = array();
   
   public static function register($object, $params = false)
   {
    $object = $object == "config" ? "configs" : $object;

    if(empty(self::$registered[$object]))
    {
        if(!$params)
        {
           self::$registered[$object] = new $object();
        }
        else
        {
           self::$registered[$object] = new $object($params);
        }
      }
      
      return self::$registered[$object];
   }
}