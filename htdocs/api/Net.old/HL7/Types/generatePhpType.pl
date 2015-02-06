#!/opt/local/bin/perl


$classname = $ARGV[0];
@var = split(",",$ARGV[1]);


print "<?php\n\n";
print "class Net_HL7_Types_$classname\n";
print "{\n";

for ($i= 0; $i < 0+@var; $i++) {
print "     private \$$var[$i];\n";
}

print "\n";
print "     public function __construct(\$components)\n";
print "     {\n";

for ($i= 0; $i < 0+@var; $i++) {
print "         \$this->$var[$i] = (empty(\$components[$i])) ? \"\" : \$components[$i];\n";
}

print "     }\n\n";

print "    /**                     \n";
print "     * \@return Net_HL7_Types_$classname   \n";
print "     */                     \n";
print "     public static function template() {           \n";
print "         return new Net_HL7_Types_$classname(array());     \n";
print "     }                                             \n\n";

print "    /**                                           \n";
print "     * \@return array                              \n";
print "     */                                           \n";
print "    public function toArray() {                   \n";
print "        \$components = array();                    \n";

for ($i= 0; $i < 0+@var; $i++) {
print "        \$components[$i] = \$this->$var[$i];                \n";
}

print "        return \$components;                        \n";
print "    }                                               \n\n";

for ($i= 0; $i < 0+@var; $i++) {
print "    /**                                                            \n";
print "     * \@param \$$var[$i] string                            \n";
print "     */                                                            \n";
print "    public function set" . ucfirst($var[$i]) . "(\$$var[$i])     \n";
print "    {                                                              \n";
print "        \$this->$var[$i] = \$$var[$i];           \n";
print "    }                                                              \n\n";

print "    /**                                                            \n";
print "     * \@return string                                              \n";
print "     */                                                            \n";
print "    public function get" . ucfirst($var[$i]) . "()                        \n";
print "    {                                                              \n";
print "        return \$this->$var[$i];                          \n";
print "    }                                                              \n\n";
}

print "}                                                                  \n";
print "?>\n";