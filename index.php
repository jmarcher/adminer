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
        function login($login, $password){
            return true;
        }
    }

    return new AdminerLoginWithoutPassword($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer.php";
