<?php
require_once "Net/HL7/Message.php";

/**
 * Class Net_HL7_Messages_OML_O21
 *
 * Construct a blank OML_O21 message
 */
class Net_HL7_Messages_OML_O21
{

    /**
     * @return Net_HL7_Message
     *
     */
    public static function template()
    {
        return new Net_HL7_Message("MSH||||||||OML^O21^OML_O21|\rPID|1|\rPV1|1|\rIN1|1|\rORC|1|\rTQ1|1|\rOBR|1|\rSPM|1|\r");

    }

}


?>

