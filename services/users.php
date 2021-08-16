<?php
require_once 'db.php';

$db = OpenCon();
$user = null;
$session = null;


function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}


function hash_password(string $password) : string {
    return hash('md5', $password);
}


function create_user(bool $is_anon, string $username = null, string $password = null): array {
    global $db;

    if (isset($password)) {
        $password = "\"" . hash_password($password) . "\"";
    } else {
        $password = 'null';
    }

    $user_uid = uniqid();
    if (isset($username)) {
        $username = "\"$username\"";
    } else {
        $username = 'null';
    }
    $sql_str = "INSERT INTO users (
        is_anon,
        uid,
        username,
        password
    ) VALUES (
        $is_anon,
        \"$user_uid\",
        $username,
        $password
    );";
    $db->exec($sql_str);
    $user_data = [
        'is_anon' => $is_anon,
        'username' => $username,
        'uid' => $user_uid
    ];
    
    return $user_data; 
}


function create_session(string $user_uid) {
    global $db;

    $session_token = random_str();
    $sql_query = "INSERT INTO sessions (
        user_uid,
        token
    ) VALUES (
        \"$user_uid\",
        \"$session_token\"
    );";
    $db->exec($sql_query);
    $session_data = [
        'user_uid' => $user_uid,
        'token' => $session_token
    ];
    return $session_data;
}


function make_anon_user_session() {
    global $user;
    global $session;
    $user = create_user(true);
    $session = create_session($user['uid']);
    setcookie('Session', $session['token'], time()+60*60*24*30);
}

if (!isset($_COOKIE['Session'])) {
    make_anon_user_session();
} else {
    $sql_query = "SELECT 
        sessions.id as session_id,
        sessions.token as session_token,
        users.uid as user_uid,
        users.username as username,
        users.is_anon as user_is_anon
    FROM sessions 
    JOIN users ON users.uid = sessions.user_uid 
    WHERE sessions.token = \"{$_COOKIE['Session']}\";";

    $found_session = $db->query(
        $sql_query
    );
    $found_session = $found_session->fetch();
    if ($found_session) {
        $session = [
            'id' => $found_session['session_id'],
            'token' => $found_session['session_token']
        ];
        $user = [
            'uid' => $found_session['user_uid'],
            'username' => $found_session['username'],
            'is_anon' => $found_session['user_is_anon']
        ];
    } else {
        make_anon_user_session();
    }
}

print_r($user);

?>