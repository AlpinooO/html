<?php
try{
 $bdd = new PDO('pgsql:host=localhost;port=5432;dbname=servweb','Oscarlechat6');
 echo "connexion bdd OK";

}

catch(ErrorException $e)
{
    echo $e;
}