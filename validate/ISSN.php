<?php namespace lib\validate {
  
  class ISSN {
    
    public static function test( $ISSN ) {
      // strip formatting
      $ISSN = preg_replace( '{[^0-9X]}', '', $ISSN );
      // get length
      $length = strlen( $ISSN );
      // get checksum
      $checksum = ( $ISSN[( $length - 1 )] === 'X' ) ? 10 : intval( $ISSN[( $length - 1 )] );
      // calculate checksum
      if( $length === 8 ) {
        $sum = NULL;
        for( $i = 1; $i < $length; $i++ )
          $sum+= ( 8 - ( $i - 1 ) ) * $ISSN[( $i - 1 )];
        $sum = $sum % 11;
        if ($sum === 0) $sum = 11;
        $sum = 11 - $sum;
        return $sum === $checksum;
      }
      return FALSE;
    }
    
  }
  
} ?>
