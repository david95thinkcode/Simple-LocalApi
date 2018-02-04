<?php

/**
 * REPRESENTS THE OBJECT USED TO RETURN RESPONSE FROM API SCRIPTS
 */
class XHRResponse
{
    public $_message;
    public $_data;

    function ReturnFailure()
    {
        $t = new stdClass();
        $t->data = null;
        $t->message = "FAILURE";

        echo (json_encode($t));
    }

    function ReturnSuccess($data)
    {
        $t = new stdClass();
        $t->data = $data;
        $t->message = "SUCCESS";

        echo (json_encode($t));
    }
}
