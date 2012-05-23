<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *
 * This library wrapper is based on a submission to the Codeigniter Forum
 * http://codeigniter.com/forums/viewthread/115311/
 *
 */

class Inviter
{
    var $CI;
    var $imported;

    public function __construct()
    {
        $this->CI=& get_instance();
    }

    public function grab_contacts($provider, $username, $password)
    {
        require_once($this->CI->config->item('absolute_url').'OpenInviter/openinviter.php');

        $oi = new OpenInviter();
        $oi_services = $oi->getPlugins();
        $oi->startPlugin($provider);
        if($oi->login($username,$password))
        {
            $array = $oi->getMyContacts();

            if(is_array($array) && count($array)>=1)
            {
                $this->imported = $array;

                //$this->store_all_imported();

                return($this->imported);

            }else{
                return;
            }
        }
        else
        {
        return 'ERROR on login.';
        }
    }

    private function store_all_imported()
    {
        foreach($this->imported as $mail=>$name)
        {
            $contacts    =    array(
                            'name' => $name,
                            'email' => $mail,
                            'status' => 0,
                            'time_imported' => date('Y-m-d H:i:s'));

            $this->CI->db->insert('ospc_imported', $contacts);
            unset($contacts);
        }
    }
}
?>