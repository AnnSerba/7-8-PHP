<?php
/**
 * Created by PhpStorm.
 * User: StarWind
 * Date: 26.05.2015
 * Time: 20:16
 */
function connectDB()
{
        $db_user = "root";
        $dsn            = 'mysql:dbname=lab6;host=127.0.0.1';
        $pdo = new PDO(
            $dsn, "root", "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return $pdo;
}

function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'   => $pattern
    );
}

class DataBase
{
    protected $table;
    function __construct($tb)
    {
        $this->table = $tb;
    }

    function getAll($pd)
    {
        $qr = ("select * from `{$this->table}`");
        $pdos = $pd->query($qr);
        return $pdos->fetchAll();
    }

    function getCount($pd)
    {
        $qr = ("select * from `{$this->table}`");
        $pdos = $pd->query($qr);
        return count($pdos->fetchAll());
    }

    function getWithLimit($pd, $startFrom, $limit)
    {
        $qr = ("select * from `{$this->table}` limit {$startFrom}, {$limit}");
        $pdos = $pd->query($qr);
        return $pdos->fetchAll();
    }

    function getWithLimitAndOrder($pd, $startFrom, $limit)
    {
        $qr = ("select * from `{$this->table}` order by DateTime DESC  limit {$startFrom}, {$limit} ");
        $pdos = $pd->query($qr);
        return $pdos->fetchAll();


    }

    function getById($pd, $id)
    {
        $qr = ("select * from `{$this->table}` where id =  {$id} ");
        $pdos = $pd->query($qr);
        return $pdos->fetchAll();
    }

    function updateBlogRecord($id, $title, $mes, $pd){
        $qr = ("update `{$this->table}` set topic = '{$title}', mes = '{$mes}' where id = {$id} ");
        $pd->exec($qr);
    }
}

class BlogRecord extends DataBase{
    private $topic;
    private $message;
    private $imagePath;
    private $date;
    function __construct($tb, $tc, $mes, $iP, $dt){
        $this->topic = $tc;
        $this->message = $mes;
        $this->imagePath = $iP;
        $this->date = $dt;
        $this->table = $tb;
    }

    function save($pd){
        $qr = ("insert into `{$this->table}` values (NULL, '$this->topic', '$this->message', '$this->imagePath', '$this->date')");
        $pd->exec($qr);
    }
}

class CommentRecord extends DataBase{
    private $name;
    private $email;
    private $comment;
    private $date;
    function __construct($tb, $nm, $mail, $cm, $dt){
        $this->name = $nm;
        $this->email = $mail;
        $this->comment = $cm;
        $this->date = $dt;
        $this->table = $tb;
    }
    function save($pd){
        $qr = ("insert into `{$this->table}` values (NULL, $this->name, $this->email, $this->comment, $this->date)");
        $pd->exec($qr);
    }
}

class TestRecord extends DataBase {
    private $name;
    private $firstQ;
    private $secondQ;
    private $thirdQ;
    private $date;
    function __construct($tb, $nm, $f, $s, $t, $dt){
        $this->name = $nm;
        $this->firstQ = $f;
        $this->secondQ = $s;
        $this->thirdQ = $t;
        $this->date = $dt;
        $this->table = $tb;
    }
    function save($pd){
        $qr = ("insert into `{$this->table}` values (NULL, '$this->name', $this->firstQ, $this->secondQ,$this->thirdQ, '$this->date')");
        $pd->exec($qr);
    }
}

class VisitRecord extends DataBase{
    private $DateTime;
    private $Page;
    private $IP;
    private $HostName;
    private $BrowserName;
    function __construct($Page) {
        $this->DateTime = date('Y-m-d H:i:s');
        $this->Page = $Page;
        $this->IP = $_SERVER['REMOTE_ADDR'];
        $this->HostName = gethostbyaddr($_SERVER['REMOTE_ADDR']);;
        $ua = getBrowser();
        $this->BrowserName = $ua['name'] . " " . $ua['version'];
        $this->table = "visits";

    }

    function save($pd) {
        $qr = ("insert into `{$this->table}` values ('$this->DateTime', '$this->Page', '$this->IP','$this->HostName', '$this->BrowserName')");
        $pd->exec($qr);
    }

    function getWithLimit($pd, $startFrom, $limit) {
        $qr = ("select * from `{$this->table}` limit {$startFrom}, {$limit}");
        $pdos = $pd->query($qr);
        return $pdos->fetchAll();
    }
}

class UserRecord {
    private $login;
    private $password;
    public $isAdmin;
    private $fullName;
    private $email;
    protected $table = "users";


    function fillGaps($login, $password, $fullName, $email){

        $this->login = $login;
        $this->password = $password;
        $this->fullName = $fullName;
        $this->email = $email;
    }

    function save($pd) {
        $qr = ("insert into `{$this->table}` values ('$this->login', '$this->password', 'user','$this->fullName', '$this->email')");
        $pd->exec($qr);
    }

    function isLoginFree($login, $pd)
    {
        $qr = ("select * from `{$this->table}` where login = '$login'");
        $pdos = $pd->query($qr);
        $rows = $pdos->fetchAll();
        return count($rows);
    }
    function getUser($pd, $login, $password) {
        $qr = ("select * from `{$this->table}` where login = '$login' AND pass = '$password'");
        $pdos = $pd->query($qr);
        $rows = $pdos->fetchAll();
        if (count($rows) != 1)
            return false;
        else {
            foreach($rows as $rw){
                $_SESSION["user"] = $rw["login"];
                $_SESSION["type"] = $rw["type"];
                $_SESSION["fullName"] = $rw["fullName"];
            }
        }
        return $rows;
    }
}

class BlogCommentsRecord{
    private $blogID;
    private $text;
    private $author;
    private $date;
    protected $table = "blogcomments";

    public function add($blogID, $text, $author, $date, $pd){
        $qr = ("insert into `{$this->table}` values ('$blogID', '$text', '$author','$date')");
        $pd->exec($qr);
    }

    public function getComments($blogID, $pd){
        $qr = ("select * from `{$this->table}` where blogID =  {$blogID} order by date DESC ");
        $pdos = $pd->query($qr);
        return $pdos->fetchAll();
    }
}

?>

