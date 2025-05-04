<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use phpseclib3\Net\SSH2;

class Ssh_library {

    protected $ssh;

    public function __construct() {
        $this->ssh = new SSH2(config_item('ssh_host'));

        if (!$this->ssh->login(config_item('ssh_username'), config_item('ssh_password'))) {
            return false; // Unable to connect
        }
    }

    public function executeCommand($command) {
        if (!$this->ssh) {
            return false; // Connection not established
        }

        $output = $this->ssh->exec($command);
        return $output; // Return command output
    }
}
