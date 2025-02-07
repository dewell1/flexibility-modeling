<?php

class InternalErrorExceptionMember extends Exception
{
}
class MissingEntryExceptionMember extends Exception
{
}

// Member DAO (Data Access Object) um auf Mitglieder zuzugreifen
interface MemberListDAO
{
    // Funktion für Dummydaten
    public function getMembers();
    public function deleteMember($id);
    public function updateMember($id, $username, $email, $passwordHash);
    public function addMember($email, $username, $passwordHash, $date);
    public function searchMembersByUsername($username);
    public function getMemberByUsername($username);
    public function getMemberByEmail($email);
}