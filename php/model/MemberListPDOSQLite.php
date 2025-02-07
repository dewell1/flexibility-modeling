<?php
require_once "Member.php";
require_once "MemberListDAO.php";

class MemberListPDOSQLite implements MemberListDAO
{
    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new MemberListPDOSQLite();
        }

        return self::$instance;
    }

    private function getConnection()
    {
        global $abs_path;       

        try {
            $user = 'root';
            $pw = null;
            $dsn = 'sqlite:' . $abs_path . '/db/flex.db';
            return new PDO($dsn, $user, $pw);
        } catch (PDOException $e) {
            throw new InternalErrorExceptionMember();
        }
    }

    public function getMembers()
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM Member ORDER BY username ASC";

            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternalErrorExceptionMember();
            }
            if (!$command->execute()) {
                throw new InternalErrorExceptionMember();
            }
            $result = $command->fetchAll();

            $members = [];
            foreach ($result as $row) {
                $member = new Member($row["id"], $row["username"], $row["email"], $row["passwordHash"],  $row["date"]);
                $members[] = $member;
            }
            return $members;


        } catch (PDOException $exc) {
            throw new InternalErrorExceptionMember();
        }
    }

    public function deleteMember($id)
    {
        try {
            $db = $this->getConnection();
            $db->beginTransaction();
            $sql = "SELECT * FROM Member WHERE id=:id LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternalErrorExceptionMember();
            }
            if (!$command->execute([":id" => $id])) {
                $db->rollBack();
                throw new InternalErrorExceptionMember();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                $db->rollBack();
                throw new MissingEntryExceptionMember();
            }
            $sql = "DELETE FROM Member WHERE id=:id";
            $_SESSION['username'] = null;
            $_SESSION['email'] = null;
            $_SESSION['loggedin'] = false;
            $_SESSION['user_id'] = null;
            $_SESSION['date'] = null;
            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternalErrorExceptionMember();
            }
            if (!$command->execute([":id" => $id])) {
                $db->rollBack();
                throw new InternalErrorExceptionMember();
            }
            $db->commit();
        } catch (PDOException $exc) {
            $db->rollBack();
            throw new InternalErrorExceptionMember();
        }

    }

    public function updateMember($id, $username, $email, $passwordHash)
    {
        try {
            $db = $this->getConnection();
            $db->beginTransaction();
            $sql = "SELECT * FROM Member WHERE id=:id LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternalErrorExceptionMember();
            }
            if (!$command->execute([":id" => $id])) {
                $db->rollBack();
                throw new InternalErrorExceptionMember();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                $db->rollBack();
                throw new MissingEntryExceptionMember();
            }
            $sql = "UPDATE Member Set username = '$username', email = '$email', passwordHash = '$passwordHash' WHERE id=:id";
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternalErrorExceptionMember();
            }
            if (!$command->execute([":id" => $id])) {
                $db->rollBack();
                throw new InternalErrorExceptionMember();
            }
            $db->commit();
        } catch (PDOException $exc) {
            $db->rollBack();
            throw new InternalErrorExceptionMember();
        }
    }

    public function addMember($email, $username, $passwordHash, $date)
    {
        try {
            $db = $this->getConnection();
            $db->beginTransaction(); // Start the transaction

            $sql = "INSERT INTO Member (username, email, passwordHash, date) VALUES (:username, :email, :passwordHash, :date);";
            $command = $db->prepare($sql);

            if (!$command) {
                $db->rollBack(); // Rollback the transaction if preparation fails
                throw new InternalErrorExceptionMember("Preparation of SQL statement failed.");
            }

            $command->bindParam(':username', $username, PDO::PARAM_STR);
            $command->bindParam(':email', $email, PDO::PARAM_STR);
            $command->bindParam(':passwordHash', $passwordHash, PDO::PARAM_STR);
            $command->bindParam(':date', $date, PDO::PARAM_STR);

            if (!$command->execute()) {
                $db->rollBack(); // Rollback the transaction if execution fails
                throw new InternalErrorExceptionMember("Execution of SQL statement failed.");
            }

            $db->commit(); // Commit the transaction if everything is successful

            $_SESSION['user_id'] = intval($db->lastInsertId());
        } catch (PDOException $exc) {
            $db->rollBack(); // Rollback the transaction in case of any PDO exception
            throw new InternalErrorExceptionMember("Database error: " . $exc->getMessage());
        }

    }

    public function lastInsertId()
    {
        try {
            $db = $this->getConnection();
            return intval($db->lastInsertId());
        } catch (PDOException $exc) {
            throw new InternalErrorExceptionMember("Database error: " . $exc->getMessage());
        }
    }

    public function searchMembersByUsername($username)
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM Member WHERE username LIKE :username";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternalErrorExceptionMember();
            }
            if (!$command->execute([":username" => '%' . $username . '%'])) {
                throw new InternalErrorExceptionMember();
            }
            $result = $command->fetchAll();

            $members = [];
            foreach ($result as $row) {
                $member = new Member($row["id"], $row["username"], $row["email"], $row["passwordHash"], $row["image"], $row["date"]);
                $members[] = $member;
            }
            return $members;
        } catch (PDOException $exc) {
            throw new InternalErrorExceptionMember();
        }
    }

    public function getMemberByUsername($username)
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM Member WHERE username = :username LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternalErrorExceptionMember();
            }
            if (!$command->execute([":username" => $username])) {
                throw new InternalErrorExceptionMember();
            }
            $result = $command->fetch(PDO::FETCH_OBJ);

            if ($result) {
                return new Member($result->id, $result->username, $result->email, $result->passwordHash, $result->image, $result->date);
            } else {
                return null;
            }
        } catch (PDOException $exc) {
            throw new InternalErrorExceptionMember();
        }
    }
    public function getMemberByEmail($email)
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM Member WHERE email = :email LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternalErrorExceptionMember();
            }
            if (!$command->execute([":email" => $email])) {
                throw new InternalErrorExceptionMember();
            }
            $result = $command->fetch(PDO::FETCH_OBJ);

            if ($result) {
                return new Member($result->id, $result->username, $result->email, $result->passwordHash, $result->image, $result->date);
            } else {
                return null;
            }
        } catch (PDOException $exc) {
            throw new InternalErrorExceptionMember();
        }
    }

}
