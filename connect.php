<?php

    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $ldap = ldap_connect("domain_ip");

    $ldaprdn = "domain\\".$username;

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);

    if ($bind) {

        $filter = "(sAMAccountName=$username)";
        $result = @ldap_search($ldap, "OU=your_ou,OU=your_ou,DC=your_dc,DC=your_dc", $filter) or exit("error");
        $entries = ldap_get_entries($ldap,$result);

        $_SESSION['logged'] = true;

        $_SESSION['fullName'] = $entries[0]["cn"][0];  //display full name
        $_SESSION['title'] = $entries[0]["title"][0];  //display title

        @ldap_close($ldap);

        header('Location: form.php');
    }else{
        $_SESSION['error'] = '<span style="color:red;font-weight: bold;">Incorrect login or password</span>';
		header('Location: index.php');
        @ldap_close($ldap);
    }

?>