<?php
function adminer_object()
{
    // required to run any plugin
    include_once "./plugins/plugin.php";

    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }

    $plugins = array(
        // specify enabled plugins here
        new AdminerDumpAlter,
        new AdminerJsonColumn,
        new AdminerTablesFilter,
        new AdminerRestoreMenuScroll,
        new AdminerTheme,
    );

    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
     */

    class AdminerLoginWithoutPassword extends AdminerPlugin
    {
        function permanentLogin(){
            return 'e13d443a13a676035c13add461bcdd16';
        }

        function credentials() {
          // server, username and password for connecting to database
          return array('localhost', 'root', 'vbyasp');
        }

        function login($login, $password){
            return true;
        }
    }

    return new AdminerLoginWithoutPassword($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer.php";
