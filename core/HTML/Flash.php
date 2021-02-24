<?php

class Flash {

    
    public static function setFlash( $message, $type = "success" ) {

        $_SESSION['flash']['message'] = $message;
        $_SESSION['flash']['type'] = $type;
    }

    public static function getFlash() {

        if ( isset( $_SESSION['flash'] ) ) {

            extract( $_SESSION['flash'] );
            //recupere et créé les variables correspondantes
            unset( $_SESSION['flash'] );
            return "<div class='alert alert-$type alert-dismissible fade show' role='alert'>
                        $message
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        }
    }
}

?>