<?php
require_once "Net/HL7/Message.php";

/**
 * Class Net_HL7_Messages_ORU_R01
 *
 * Construct a blank ORU_R01 message
 */
class Net_HL7_Messages_ORU_R01
{

    /**
     * @return Net_HL7_Message
     *
     */
    public static function template()
    {
        return new Net_HL7_Message("MSH||||||||ORU^R01^ORU_R01|\rPID|1|\rPV1|1|\rORC|1|\rOBR|1|\rTQ1|1|\rOBX|1|\rSPM|1|\r");

    }

}


?>

