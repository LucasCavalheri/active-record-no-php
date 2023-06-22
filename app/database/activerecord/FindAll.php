<?php

namespace app\database\activerecord;

use app\database\connection\Connection;
use app\database\interfaces\ActiveRecordExecuteInterface;
use app\database\interfaces\ActiveRecordInterface;
use Exception;

class FindAll implements ActiveRecordExecuteInterface
{
    public function __construct(
        private array $where = [],
        private string|int $limit = '',
        private string|int $offset = '',
        private string $fields = '*'
    ) {
    }

    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
        try {
            $query = $this->createQuery($activeRecordInterface);

            $connection = Connection::connect();

            $prepare = $connection->prepare($query);

            return $prepare->execute($this->where) ? $prepare->fetchAll() : [];
        } catch (\Throwable $th) {
            formatException($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        if (count($this->where) > 1) {
            throw new Exception("Você só pode passar um parâmetro para a cláusula WHERE");
        }

        $where = array_keys($this->where);
        $sql = "SELECT {$this->fields} FROM {$activeRecordInterface->getTable()} ";
        $sql .= (!$this->where) ? '' : "WHERE {$where[0]} = :{$where[0]}";
        $sql .= (!$this->limit) ? '' : " LIMIT {$this->limit}";
        $sql .= ($this->offset != '') ? " OFFSET {$this->offset}" : '';

        return $sql;
    }
}
