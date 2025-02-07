<?php
require_once "Flexmodel.php";
require_once "FlexmodelsDAO.php";


class FlexmodelsPDOSQLite implements FlexmodelsDAO
{

    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new FlexmodelsPDOSQLite();
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
            throw new InternalErrorException();
        }
    }
    public function getFlexmodelId($id)
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM Flexmodel WHERE id=:id LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternalErrorException();
            }
            if (!$command->execute([":id" => $id])) {
                throw new InternalErrorException();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                throw new MissingEntryException();
            }
            $entry = $result[0];
            return new Flexmodel(
                $entry["id"],
                $entry["authors"],
                $entry["title"],
                $entry["year"],
            );
        } catch (PDOException $exc) {
            throw new InternalErrorException();
        }
    }

    public function getFlexmodels()
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM Flexmodel";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternalErrorException();
            }
            if (!$command->execute()) {
                throw new InternalErrorException();
            }
            $result = $command->fetchAll();

            $entries = [];
            foreach ($result as $row) {
                $entry = new Flexmodel(
                    $row["id"],
                    $row["authors"],
                    $row["title"],
                    $row["year"],
                    $row["abstract"],
                    $row["link"],
                    $row["doi"],
                    $row["methodology"],
                    $row["usecase"],
                    $row["implementation"],
                    $row["param_flexibility"],
                    $row["param_mediator"],
                    $row["param_assettypes"],
                    $row["param_type"],
                    $row["param_aggregation"],
                    $row["param_time"],
                    $row["param_metric"],
                    $row["param_resolution"],
                    $row["param_constraints"],
                    $row["param_classification"],
                    $row["param_uncertainty"],
                    $row["param_sectorcoupling"],
                    $row["param_multitimescale"],
                    $row["flexblox"],
                );
                $entries[] = $entry;
            }
            return $entries;
        } catch (PDOException $exc) {
            throw new InternalErrorException();
        }
    }
}