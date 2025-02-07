<?php
require_once "MemberListPDOSQLite.php";

/*
 * je nachdem ob die Webanwendung mit der Dummy-Fix- oder der Datenbank-Implementierung laufen soll,
 * ist die Implementierung der Methode getInstance die einzige Stelle im gesamten Code, an der eine
 * Änderung erfolgen muss
 */
class MemberList
{
    public static function getInstance()
    {
        //return MemberListFix::getInstance(); // Dummy-Fix-Implementierung
        return MemberListPDOSQLite::getInstance(); // Datenbank-Implementierung
    }
}