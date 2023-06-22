<?php

namespace app\database\activerecord;

use app\database\connection\Connection;
use app\database\interfaces\ActiveRecordExecuteInterface;
use app\database\interfaces\ActiveRecordInterface;

class Update implements ActiveRecordExecuteInterface
{
    public function __construct(private string $field, private string $value)
    {
    }

    public function execute(ActiveRecordInterface $activeRecordInterface): int
    {
        try {
            $query = $this->createQuery($activeRecordInterface);

            $connection = Connection::connect();

            $attributes = array_merge($activeRecordInterface->getAttributes(), [
                $this->field => $this->value
            ]);

            $prepare = $connection->prepare($query);
            $prepare->execute($attributes);

            return $prepare->rowCount();
        } catch (\Throwable $th) {
           formatException($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface): string
    {
        if (array_key_exists('id', $activeRecordInterface->getAttributes())) {
            throw new \Exception("O campo ID não pode ser passado para o UPDATE, talvez você esteja tentando fazer algo do tipo: \n user->id = 1; e isso não é permitido.");
        }

        $sql = "UPDATE {$activeRecordInterface->getTable()} SET";

        foreach ($activeRecordInterface->getAttributes() as $key => $value) {
            $sql .= " {$key} = :{$key},";
        }

        $sql = rtrim($sql, ',');
        $sql .= " WHERE {$this->field} = :{$this->field}";

        return $sql;
    }
}
