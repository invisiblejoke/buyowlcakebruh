<?php
require 'vendor/autoload.php';

use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('your-key');
$domain = "your-domain";

                # Make the call to the client.
                $result = $mgClient->sendMessage("$domain",
                array('from'    => 'Name <email> ',
                        'to'      => 'Name <email>',
                        'subject' => 'subject',
                        'text'    => 'message'));



?>